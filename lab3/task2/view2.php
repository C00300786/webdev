<!--
    name:   jamie williamson
    id:     c00300786
    lab;    3
    task:   2
-->

<?php
    // Include the database connection file (db.inc2.php) for connecting to the database
    include 'db.inc2.php';

    // Set the default timezone to UTC
    date_default_timezone_set("UTC");

    // SQL query to select all columns from the 'persons' table where the 'personid' matches the value from the form submission
    $sql = "SELECT * FROM persons WHERE personid = " . $_POST['personid'];

    // Execute the SQL query and store the result
    $result = mysqli_query($con, $sql);

    // Get the number of affected rows (records found)
    $rowcount = mysqli_affected_rows($con);

    // Check if exactly one record was found (i.e., the person exists in the database)
    if($rowcount == 1) {
        // Display the details of the selected person
        echo '<br>The details of the selected person are <br><br>';
        
        // Fetch the data for the person (as an associative array)
        $row = mysqli_fetch_array($result);

        // Display the person ID, first name, last name, email, and phone number
        echo "The person id is: " . $_POST['personid'] . "<br><br>";
        echo "First Name is: " . $row['firstname'] . "<br>";
        echo "Last Name is: " . $row['lastname'] . "<br>";
        echo "Email is: " . $row["Email"] . "<br>";
        echo "Phone number is: " . $row["Phone"] . "<br>";

        // Convert the Date of Birth (DOB) from the database into a DateTime object
        $date = date_create($row["DOB"]);

        // Format and display the Date of Birth as "day/month/year"
        echo "Date of birth is: " . date_format($date, "d/m/Y");
    } else {
        // If no matching records are found, display a message
        echo "No matching records";
    }

    // Close the database connection
    mysqli_close($con);
?>

<!-- Return to the previous page (view2.html) after displaying the information -->
<form action="view2.html" method="POST">
    <br>
    <!-- Submit button that navigates back to the select page -->
    <input type="submit" value="Return to select page">
</form>
