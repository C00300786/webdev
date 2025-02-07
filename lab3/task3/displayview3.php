<?php
session_start();
include 'db.inc3.php';

$sql = "Select * from Students where Studentid = ".$_POST['Studentid'];

if (!$result = mysqli_query($con,$sql)) 
{
    die(' Error in the database or query' . mysqli_error($con));
}
$rowcount = mysqli_affected_rows($con);

$_SESSION['Studentid'] = $_POST['Studentid'];
if ($rowcount == 1)
{
    $row = mysqli_fetch_array($result);

    $_SESSION['Studentid']=$row['Studentid'];
    $_SESSION['StudentName']=$row['StudentName'];
    $_SESSION['StudentAddress']=$row['StudentAddress'];
    $_SESSION['dob']=$row['DateOfBirth'];
	$_SESSION['CourseCode']=$row['CourseCode'];
	$_SESSION['StudentPhone']=$row['StudentPhone'];
	
	
}else if($rowcount == 0)
{
    unset ($_SESSION['StudentName']);
    unset ($_SESSION['StudentAddress']);
    unset ($_SESSION['dob']);
    unset ($_SESSION['CourseCode']);
    unset ($_SESSION['StudentPhone']); 
}
mysqli_close($con);

header("Location: view.html3.php");
?>
