<?php
    // Include the database connection file
    include 'db.inc.php';
    
    
    // Set the default timezone to UTC
    date_default_timezone_set("UTC");

    // Output the form details received from the POST request
    echo "The details sent down are: <br>";
    echo "First Name is: " . $_POST['firstname'] . "<br>";  // Output first name
    echo "Surname is: " . $_POST['surname'] . "<br>";  // Output surname

    // Create a DateTime object from the date of birth
    $date = date_create($_POST['dob']);
    
    // Output the formatted Date of Birth
    echo "Date of Birth is: " . date_format($date, "d/m/Y") . "<br>";
    
    // SQL query to insert the provided details into the database
    $sql = "INSERT INTO Staff (FirstName, LastName, DOB, JobTitle, PhoneNum)
            VALUES ('$_POST[firstname]', '$_POST[surname]', '$_POST[dob]','$_POST[job]','$_POST[phone]' )";

    // Execute the query and check for errors
    if (!mysqli_query($con, $sql)) {
        // If the query fails, output the error message
        die("An error occurred in the SQL Query: " . mysqli_error($con));
    }

    // If the query succeeds, confirm the record has been added
    echo "<br>A record has been added for " . $_POST['firstname'] . " " . $_POST['surname'] . "."; 
    
    // Close the database connection
    mysqli_close($con);
?>

<!-- Form to return to the insert page -->
<form action="insert.html.php" method="POST">
    <br>
    <input type="submit" value="Return to Insert Page"/>
</form>
