<!--
    Name: Jamie WIlliamson
    ID: C00300786
-->
<?php
include "db.inc.php"; //database connection
date_default_timezone_set('UTC');

$sql = "SELECT * FROM persons where DeletedFlag = 0";

if (!$result = mysqli_query($con, $sql))
{
    die('Error in querying the database' . mysqli_error($con));
}

echo "<br><select name = 'listbox' id= 'listbox' onclick= 'populate()'>";

while ($row = mysqli_fetch_array($result))
{
    $id = $row['personID'];
    $fname = $row['firstName'];
    $sname = $row['lastName'];
    $dateofBirth = $row['DOB'];
    $dob = date_create( $row['DOB']);
    $dob = date_format($dob, "Y-m-d");
    $allText = "$id, $fname, $sname, $dob";
    echo "<option value = '$allText'>$fname $sname</option>";
}
echo "</select>";
mysqli_close($con);
?>