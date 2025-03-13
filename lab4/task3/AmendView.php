<!--
    Name: Jamie WIlliamson
    ID: C00300786
-->
<?php
include 'db.inc.php'; //links to php which connects to database

date_default_timezone_set('UTC'); //sets default timezone as utc 
$dbDate = date("Y-m-d", strtotime($_POST['amendDOB'])); //grabs dob from form and formats it 

$sql = "UPDATE Students SET StudentName = '$_POST[amendname]',
        StudentAddress = '$_POST[amendaddress]',
        StudentPhone = '$_POST[amendphone]', 
        GradePointAverage = '$_POST[amendgrade]',
        DateOfBirth = '$dbDate',
        YearBeganCourse = '$_POST[amendyear]',
        CourseCode = '$_POST[amendcode]'
        WHERE StudentId = '$_POST[amendid]' "; //sql statement which updates the database from inputs

if (!mysqli_query($con,$sql)) //error check
{
    echo "Error ".mysqli_error($con);
}
else
{
    if (mysqli_affected_rows($con) != 0) //if no errors prints how many records were updated and what entry
    {
        echo mysqli_affected_rows($con)." record(s) updated <br>";
        echo "Student Id ". $_POST['amendid'].", ".$_POST['amendname']." has been updated";
    }
    else
    {
        echo "No records were changed";
    }
}
mysqli_close($con); //closes database
?>

<form action="AmendView.html.php" method="post"> <!--returns to html page-->
<input type="submit" value="Return to Previous Screen">
</form>