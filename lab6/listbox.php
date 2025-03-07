<!--Jamie williamson
//C00300786
//30/01/2025
//SQL sheet 2
//task 4
-->
<?php session_start(); 
include 'db.inc.php'; //database connection
date_default_timezone_set('UTC');

$sql = "Select personid, firstname, lastname, DOB FROM persons where DeletedFlag = 0";

if (!$result = mysqli_query($con,$sql))
{
    die( 'Error in querying the database' . mysqli_error($con));
}
echo "<br><select name = 'listbox' id = 'listbox' onclick = 'populate()'>";

while ($row = mysqli_fetch_array($result))
{
    $id = $row['personid'];
    $fname = $row['firstname'];
    $sname = $row['lastname'];
    $dateofBirth = $row['DOB'];
    $dob = date_create($row['DOB']);
    $dob = date_format($dob, "Y-m-d");
    $allText = "$id,$fname,$sname,$dob";
    echo "<option value = '$allText'>$fname $sname</option>";
}
echo "</select>";
mysqli_close($con);
//Go back to the calling form - with the value that we need to display in session variables, if a record was found

?>
 