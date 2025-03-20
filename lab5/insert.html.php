<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "menu.php"; ?>
    <title>Insert Person Information</title>
</head>
<body>
    <!-- Form that submits to insert.php to handle insertion -->
    <form action="insert.php" method="post">
        <!-- First name input field -->
        <p>
            <label for="firstname">First name</label>
            <input type="text" name="firstname" id="firstname" placeholder="First name" autocomplete="off" required/>
        </p>

        <!-- Last name input field -->
        <p>
            <label for="surname">Last name</label>
            <input type="text" name="surname" id="surname" placeholder="Surname" required/>
        </p>

        <!-- Date of Birth input field -->
        <p>
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" id="dob" placeholder="Date of Birth" required/>
        </p>

        <!-- Submit and Reset buttons -->
        <br>
        <input type="submit" value="Submit"/> 
        <input type="reset" value="Clear" />
    </form>
</body>
</html>
