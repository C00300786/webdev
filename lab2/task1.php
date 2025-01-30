<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="update" action="">
            <label for="Fname">:enter your first name</label>
            <input id="Fname">
            <br>
            <label for="lname">:enter your last name</label>
            <input id="lname">
            <br>
            <button type="submit">Enter</button>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'UPDATE')
        {
            echo"<h2>have a good day $Fname $lname"
        }
    ?>
</body>
</html>