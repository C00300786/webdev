<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
            <label for="Fname">enter your first name</label>
            <input id="Fname" name="Fname">
            <br>
            <label for="lname">enter your last name</label>
            <input id="lname" name="lname">
            <br>
            <button type="submit">Enter</button>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $fname = $_POST['Fname'];
            $lname = $_POST['lname'];
            echo"<h2>have a good day $fname $lname </h2>";
        }
    ?>
</body>
</html>