<!--
    Name: Jamie WIlliamson
    ID: C00300786
-->
<?php
include 'db.inc.php';

date_default_timezone_set('UTC');
$dbDate = date("Y-m-d", strtotime($_POST['amendDOB'])); //to match date format in database

$sql = "UPDATE Staff SET Firstname = '$_POST[amendfirstname]',
        Surname = '$_POST[amendlastname]',
        DOB = '$dbDate',Phone = '$_POST[amendphone]',JobTitle = '$_POST[amendjob],
        DeletedFlag = $_POST[amendflag]' WHERE StaffId = '$_POST[amendid]' ";

if (!mysqli_query($con, $sql))
{
    echo "Error ".mysqli_error($con);
}
else
{
    if (mysqli_affected_rows($con) != 0)
    {
        echo mysqli_affected_rows($con)." record(s) updated <br>";
        echo "Person Id ".$_POST['amendid'].", ".$_POST['amendfirstname']
        ." ".$_POST['amendlastname']." ".$_POST['amendjob'].
        " ".$_POST['amendphone']." ".$_POST['amendflag']." has been updated";
    }
    else
    {
        echo "No records were changed";
    }
}
mysqli_close($con);
?>
<form action="AmendView.html.php" method="post">
<input type="submit" value="Return to Previous Screen">
</form>