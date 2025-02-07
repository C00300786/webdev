<?php
    include 'db.inc3.php';
    date_default_timezone_set("UTC");
    

    $fname = $_POST['StudentName']."<br>"; 
    $lname = $_POST['StudentAddress'] . "<br>";
    $date=date_create($_POST['dob']);
    $mail =$_POST['CourseCode'] . "<br>";
    $num =$_POST['StudentPhone'] . "<br>";
    
    echo "The details sent down are: <br>";
    echo "First Name is : $fname <br>";
    echo "StudentAddress is : $lname <br>";
    echo "CourseCode is : $mail <br>";
    echo "StudentPhone num is : $num <br>";

    echo "Date of Birth is:" . date_format($date, "d/m/Y") . "<br>";
    
    $sql = "Insert into persons (StudentName, lastname, DOB, CourseCode, StudentPhone)
    VALUES ('$_POST[StudentName]', '$_POST[StudentAddress]', '$_POST[dob]' , '$_POST[CourseCode]', '$_POST[StudentPhone]')";

    if (mysqli_query($con, $sql))
    {
        die ("An Error in the SQL Query: " .mysqli_error($con) );
    }

    echo "<br>A record has been added for" . $_POST['StudentName']." ". $_POST['StudentAddress']. "."; 
    
    mysqli_close($con);
?>
<form action = "insert.html" method="POST" >
<br>
    <input type="submit" value="Return to Insert Page"/>
</form>