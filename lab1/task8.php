<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Find the Day of the Week</h1>
    <form method="post" action="">
        <label for="day">Day:</label>
        <input type="number" id="day" name="day" min="1" max="31" required>
        <br><br>
        <label for="month">Month:</label>
        <input type="number" id="month" name="month" min="1" max="12" required>
        <br><br>
        <label for="year">Year:</label>
        <input type="number" id="year" name="year" min="1" required>
        <br><br>
        <button type="submit">Find Day</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];

        // Validate date
        if (checkdate($month, $day, $year)) {
            // Get the day of the week
            $date = "$year-$month-$day";
            $dayOfWeek = date('l', strtotime($date));
            echo "<h2>The day of the week for $date is $dayOfWeek.</h2>";
        } else {
            echo "<h2>Invalid date. Please enter a valid date.</h2>";
        }
    }
    ?>

</body>
</html>