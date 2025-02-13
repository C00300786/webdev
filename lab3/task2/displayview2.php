<!--
    name:   jamie williamson
    id:     c00300786
    lab:    3
    task:   2
-->

<?php
// Start the session to access session variables
session_start();

// Include the database connection
include 'db.inc2.php';

// SQL query to select a person based on the 'personid' submitted via POST
$sql = "Select * from persons where personid = ".$_POST['personid'];

// Execute the SQL query, checking if it executes successfully
if (!$result = mysqli_query($con,$sql)) 
{
    // If the query fails, output an error message
    die('Error in the database or query: ' . mysqli_error($con));
}

// Get the number of rows affected by the query
$rowcount = mysqli_affected_rows($con);

// Store the 'personid' submitted in the session to use it across pages
$_SESSION['personid'] = $_POST['personid'];

// If exactly one record is found for the given 'personid'
if ($rowcount == 1)
{
    // Fetch the resulting row as an associative array
    $row = mysqli_fetch_array($result);

    // Store the details of the person in session variables
    $_SESSION['personid'] = $row['personid'];
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['lastname'] = $row['lastname'];
    $_SESSION['dob'] = $row['DOB'];
    $_SESSION['email'] = $row['Email'];
    $_SESSION['phone'] = $row['Phone'];
}
else if ($rowcount == 0)
{
    // If no matching record was found, unset all session variables related to the person
    unset ($_SESSION['firstname']);
    unset ($_SESSION['lastname']);
    unset ($_SESSION['dob']);
    unset ($_SESSION['email']);
    unset ($_SESSION['phone']); 
}

// Close the database connection
mysqli_close($con);

// Redirect the user to a new page (view.html2.php) to display the person’s details
header("Location: view.html2.php");
?>
