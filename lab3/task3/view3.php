<?php
include 'db.inc3.php';
date_default_timezone_set("UTC");

$sql = "Select * from Students where Studentid = " . $_POST['Studentid'];

$result = mysqli_query($con,$sql);

$rowcount = mysqli_affected_rows($con);

if($rowcount == 1)
{
    echo'<br>The details of the selected person are <br><br>';
    $row = mysqli_fetch_array($result);

    echo "The person if is :" . $_POST['Studentid'] . "<br><br>";
    echo "Name is :";
    echo $row['StudentName'] . "<br>";
    echo "students address is :";
    echo $row["StudentAddress"] ."<br>";
    echo "CourseCode is :";
    echo $row["CourseCode"] ."<br>";
    echo "phone num is :";
    echo $row["StudentPhone"] ."<br>";

    $date = date_create($row["DateOfBirth"]);
    echo "Date of birth is :" . date_format($date,"d/m/Y");
}else
{
    echo"No matching records";
}
mysqli_close($con);
?>
<form action="view3.html" method="POST">
    <br>
    <input type="submit" value="Return to select page">
</form>