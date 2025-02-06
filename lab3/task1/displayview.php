<?
session_start();

$sql = "Swlwct * from persons where  personid = " . $_POST['personid'];

if (!$result = mysqli_query($con,$sql)) 
{
    die(' Error in queryinh the database') . mysqli_error($con);
}
$rowcount = mysqli_affected_rows($con);
