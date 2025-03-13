<!--
    Name: Jamie WIlliamson
    ID: C00300786
-->
<?php
include "db.inc.php"; //database connection
date_default_timezone_set('UTC');

$sql = "SELECT * FROM Students";

if (!$result = mysqli_query($con, $sql)) //error check
{
    die ('Error in querying the database' . mysqli_error($con));
}

echo "<br><select name = 'listbox' id = 'listbox' onclick = 'populate()'>"; //creates select button that allows you to choose which person to view the records of

while ($row = mysqli_fetch_array($result)) //grabs records from database
{
    $id = $row['StudentId'];
    $name = $row['StudentName'];
    $address = $row['StudentAddress'];
    $number = $row['StudentPhone'];
    $grade = $row['GradePointAverage'];
    $dateofBirth = $row['DateOfBirth'];
    $dob = date_create($row['DateOfBirth']);
    $dob = date_format($dob,"Y-m-d");
    $year = $row['YearBeganCourse'];
    $code = $row['CourseCode'];
    $allText = "$id,$name,$address,$number,$grade,$dob,$year,$code";
    echo "<option value = '$allText'>$name</option>"; //prints records
}
echo "</select>";
mysqli_close($con);

?>