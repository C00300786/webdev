<!--
    Name: Jamie WIlliamson
    ID: C00300786
-->
<?php
// login info for database
$hostname = "localhost";
$username = "Timo";
$password = "labuser3606";

$dbname = "MyDBC00295555";
// connecting to database
$con = mysqli_connect($hostname, $username, $password, $dbname);
// if it doesnt connect run the error message
if (!$con)
{
    die("Failed to connect to MYSQL: " . mysqli_connect_error());
}
?>