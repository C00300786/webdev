<!--
    Name: Jamie WIlliamson
    ID: C00300786
-->
<?php
include "db.inc.php"; //database connection
date_default_timezone_set('UTC');

$sql = "SELECT * FROM Staff where DeletedFlag = 0";

if (!$result = mysqli_query($con, $sql))
{
    die('Error in querying the database' . mysqli_error($con));
}

echo "<br><select name = 'listbox' id= 'listbox' onclick= 'populate()'>";

while ($row = mysqli_fetch_array($result))
{
    $id = $row['Staffid'];
    $fname = $row['FirstName'];
    $sname = $row['SurName'];
    $dateofBirth = $row['DOB'];
    $dob = date_create( $row['DOB']);
    $dob = date_format($dob, "Y-m-d");
    $Job = $row['JobTitle'];
    $phone = $row['PhoneNum'];
    $flag = $row['DeletedFlag'];
    $allText = "$id, $fname, $sname, $dob, $email, $phone, $flag";
    echo "<option value = '$allText'>$fname $sname</option>";
}
echo "</select>";
mysqli_close($con);
?>