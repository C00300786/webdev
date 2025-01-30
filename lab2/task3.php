<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
            <label for="Fname">enter your name</label>
            <input id="Fname" name="name" type="text">
            <br>
            <label for="lname">enter your date of birth</label>
            <input id="dob" name="dob" type="date">
            <br>
            <button type="submit">Enter</button>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $name = $_POST['name'];
            
            $dobDats = date('d/m/y', strtotime('$_POST[dob]'));
            echo"<h2> $name your dob was $dobDats </h2><br>";
            $dobDay = date('l/d/m/y', strtotime('$_POST[dob]'));
            echo"<h2> $name your dob was $dobDay </h2><br>";
            $dobyr = date('Y', strtotime('$_POST[dob]'));
            echo"<h2> $name your dob was $dobyr </h2><br>";


            
        }
    ?>
</body>
</html>