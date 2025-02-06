<?php
session_start();

$sql = "Select * from persons where  personid = " . $_POST['personid'];

if (!$result = mysqli_query($con,$sql)) 
{
    die(' Error in the database or query') . mysqli_error($con);
}
$rowcount = mysqli_affected_rows($con);

$_SESSION('personid')=$_POST('personid');
if ($rowcount == 1)
{
    $row = mysqli_fetch_array($result);

    $_SESSION['personid']=$_row['personid'];
    $_SESSION['firstname']=$_row('firstname');
    $_SESSION['lastname']=$_row('lastname');
    $_SESSION['dob']=$_row('DOB');
    $_SESSION['email']=$_row('Email');
    $_SESSION['phone']=$_row('Phone');
}else if($rowcount == 0)

{
    unset ($_SESSION['personid']);
    unset ($_SESSION['firstname']);
    unset ($_SESSION['lastname']);
    unset ($_SESSION['dob']);
    unset ($_SESSION['email']);
    unset ($_SESSION['phone']); 
}
mysqli_close($con);

header('view.html2.php');
?>
