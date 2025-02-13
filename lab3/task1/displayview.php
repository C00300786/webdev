<?php
session_start();  // Start the session to access session variables

// Include the database connection file
include 'db.inc.php';

// SQL query to select the person based on the provided personid from the form
$sql = "Select * from persons where personid = ".$_POST['personid'];

// Execute the query and check for errors
if (!$result = mysqli_query($con,$sql)) 
{
    die(' Error in the database or query' . mysqli_error($con));  // If there's an error, stop execution and show the error
}

// Get the number of affected rows
$rowcount = mysqli_affected_rows($con);

// Store the submitted personid in the session to keep track of the person being viewed
$_SESSION['personid'] = $_POST['personid'];

// Check if exactly one record was returned (meaning the person exists)
if ($rowcount == 1)
{
    // Fetch the record from the query result
    $row = mysqli_fetch_array($result);

    // Store the person's details in session variables for use in other pages
    $_SESSION['personid']=$row['personid'];
    $_SESSION['firstname']=$row['firstname'];
    $_SESSION['lastname']=$row['lastname'];
    $_SESSION['dob']=$row['DOB'];
}
else if($rowcount == 0)
{
    // If no record is found, unset session variables as no data is available
    unset ($_SESSION['firstname']);
    unset ($_SESSION['lastname']);
    unset ($_SESSION['dob']);
}

// Close the database connection to free resources
mysqli_close($con);

// Redirect to the view page where the data will be displayed
header("Location: view.html.php");
?>
