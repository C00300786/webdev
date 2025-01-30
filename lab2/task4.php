<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $hostname = "loacalhost";
        $username = "C00300786";
        $password = "WordPass123";
        $dbname = "MYDBc00300786";

        $con = mysqli_connect($hostname,$username,$password,$dbname);
    
        $sql = "Select * from persons";

        $result = mysqli_query($con,$sql);

        echo "<br> the persons table contains the following records:<br>";

        while($row=mysql_fetch_array($result))
        {
            echo $row['personId'] . " " . $row['firstname'] . " " . $row['lastame'] . "<br>";
        }

        mysqli_close($con);
    ?>
    </form>
</body>
</html>