<?php
    $hostname = "localhost";//db login cridentioals
    $username = "C00300786";
    $password = "Wordpass@123@";
    $dbname = "MYDBc00300786";

    $con = mysqli_connect($hostname,$username,$password,$dbname);

    if (!$con)
    {
        die("Failed to connect". mysqli_connect_error());
    }
    ?>