<?
session_start();

$sql = "Select * from persons where  personid = " . $_POST['personid'];

if (!$result = mysqli_query($con,$sql)) 
{
    die(' Error in the database or query') . mysqli_error($con);
}
$rowcount = mysqli_affected_rows($con);
