<!--
    name:   jamie williamson
    id:     c00300786
    lab:    3
    task:   2
-->

<?php
    // Include the database connection file
    include 'db.inc2.php';
    
    // Set the timezone to UTC to avoid time-related issues
    date_default_timezone_set("UTC");

    // Retrieve form data from the POST request
    $fname = $_POST['firstname']."<br>";  // First Name
    $lname = $_POST['surname'] . "<br>";  // Last Name
    $date = date_create($_POST['dob']);   // Date of Birth (formatted)
    $mail = $_POST['email'] . "<br>";     // Email
    $num = $_POST['phone'] . "<br>";      // Phone Number
    
    // Display the details submitted by the user
    echo "The details sent down are: <br>";
    echo "First Name is : $fname <br>";
    echo "Surname is : $lname <br>";
    echo "Email is : $mail <br>";
    echo "Phone number is : $num <br>";
    echo "Date of Birth is: " . date_format($date, "d/m/Y") . "<br>";
    
    // SQL query to insert data into the database
    $sql = "INSERT INTO persons (firstname, lastname, DOB, email, phone)
    VALUES ('$_POST[firstname]', '$_POST[surname]', '$_POST[dob]', '$_POST[email]', '$_POST[phone]')";

    // Check if the query was successful, otherwise show an error
    if (mysqli_query($con, $sql)) {
        die("An error in the SQL Query: " . mysqli_error($con)); // Error if insertion fails
    }

    // Confirmation message upon successful insertion
    echo "<br>A record has been added for " . $_POST['firstname'] . " " . $_POST['surname'] . "."; 
    
    // Close the database connection
    mysqli_close($con);
?>

<!-- Form to return to the insert page -->
<form action="insert2.html" method="POST">
    <br>
    <!-- Button to return to the insert page -->
    <input type="submit" value="Return to Insert Page"/>
</form>
