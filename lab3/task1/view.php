<?php
// Include the database connection file
include 'db.inc.php';

// Set the default timezone to UTC
date_default_timezone_set("UTC");

// SQL query to select a person based on the 'personid' submitted via POST
$sql = "SELECT * FROM persons WHERE personid = " . $_POST['personid'];

// Execute the SQL query
$result = mysqli_query($con, $sql);

// Get the number of rows affected by the query
$rowcount = mysqli_affected_rows($con);

// If exactly one record is found for the given 'personid'
if ($rowcount == 1)
{
    // Output a message indicating the selected person's details
    echo '<br>The details of the selected person are <br><br>';
    
    // Fetch the resulting row as an associative array
    $row = mysqli_fetch_array($result);

    // Display the person's ID, first name, last name, and date of birth
    echo "The person id is: " . $_POST['personid'] . "<br><br>";
    echo "First Name: " . $row['firstname'] . "<br>";
    echo "Last Name: " . $row['lastname'] . "<br>";

    // Convert the date of birth to a readable format
    $date = date_create($row["DOB"]);
    echo "Date of birth is: " . date_format($date, "d/m/Y");
} 
// Fixed the misplaced semicolon after else
else
{
    // If no record is found, display a message
    echo "No matching records found";
}

// Close the database connection
mysqli_close($con);
?>

<!-- A form that redirects the user back to the selection page -->
<form action="view.html" method="POST">
    <br>
    <!-- Submit button to return to the select page -->
    <input type="submit" value="Return to select page">
</form>
