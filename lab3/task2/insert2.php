<?php
    include 'db.inc2.php';
    date_default_timezone_set("UTC");
    echo "The details sent down are: <br>";
    echo "First Name is : $fname <br>";
    echo "Surname is : $lname <br>";
    echo "email is : $mail <br>";
    echo "Phone num is : $num <br>";

    $fname = $_POST['firstname']."<br>"; 
    $lname = $_POST['surname'] . "<br>";
    $date=date_create($_POST['dob']);
    $mail =$_POST['email'] . "<br>";
    $num =$_POST['phone'] . "<br>";

    echo "Date of Birth is:" . date_format($date, "d/m/Y") . "<br>";
    
    $sql = "Insert into persons (firstname, lastname, DOB, email, phone)
    VALUES ('$_POST[firstname]', '$_POST[surname]', '$_POST[dob]' , '$_POST[email]', '$_POST[phone]')";

    if (mysqli_query($con, $sql))
    {
        die ("An Error in the SQL Query: " .mysqli_error($con) );
    }

    echo "<br>A record has been added for" . $_POST['firstname']." ". $_POST['surname']. "."; 
    
    mysqli_close($con);
?>
<form action = "insert.html" method="POST" >
<br>
    <input type="submit" value="Return to Insert Page"/>
</form>