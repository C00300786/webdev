<!--
    name:   jamie williamson
    id:     c00300786
    lab;    3
    task:   3
-->
<?php
    // Include the database connection file (db.inc3.php) for connecting to the database
    include 'db.inc3.php';

    // Set the timezone to UTC
    date_default_timezone_set("UTC");

    // Retrieve the form data using POST method and store it in variables
    // Adding <br> tag to each value for line breaks when displaying
    $name = $_POST['StudentName']."<br>"; 
    $add = $_POST['StudentAddress'] . "<br>";
    $date = date_create($_POST['dob']); // Convert the dob to a DateTime object
    $code = $_POST['CourseCode'] . "<br>";
    $num = $_POST['StudentPhone'] . "<br>";
    
    // Display the received details in a human-readable format
    echo "The details sent down are: <br>";
    echo "First Name is : $name <br>";  // Display student name
    echo "StudentAddress is : $add <br>"; // Display student address
    echo "CourseCode is : $code <br>";  // Display course code
    echo "StudentPhone num is : $num <br>";  // Display student phone number

    // Format the date of birth and display it
    echo "Date of Birth is:" . date_format($date, "d/m/Y") . "<br>";

    // SQL query to insert the form data into the 'Students' table in the database
    // The values from the POST request are inserted into respective columns
    $sql = "INSERT INTO Students (StudentName, StudentAddress, DateOfBirth, StudentPhone, CourseCode)
            VALUES ('$_POST[StudentName]', '$_POST[StudentAddress]', '$_POST[dob]', '$_POST[StudentPhone]', '$_POST
