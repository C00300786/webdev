<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
            <label for="Fname">enter your hight in m</label>
            <input id="Fname" name="Fname">
            <br>
            <label for="lname">enter your weight in kg</label>
            <input id="lname" name="lname">
            <br>
            <button type="submit">Enter</button>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $hight = $_POST['Fname'];
            $weight = $_POST['lname'];
            $bmi = $hight / ($weight * $weight);

            echo"<h2>your bmi is $bmi </h2>";
        }
    ?>
</body>
</html>