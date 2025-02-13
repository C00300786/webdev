<?php
// Start a new session or resume the existing session
session_start();
?>

<html>

<body>
    <!-- Form that will submit the data to 'displayview.php' using POST method -->
    <form action="displayview.php" method="Post">
        <p>
            <label for="personid"> Enter the personid you want to find</label>
            
            <!-- Input field for 'personid'. It will pre-fill with the session value if set -->
            <input type="text" name="personid" id="personid" placeholder="person id" autocomplete="off" required 
                   value="<?php if (isset($_SESSION['personid'])) echo $_SESSION['personid']; ?>" />
        </p>

        <!-- Disabled input fields to display the corresponding values stored in the session -->
        <p>
            <label for="firstname"> First name </label>
            <input type="text" name="firstname" id="firstname" placeholder="first name" disabled
                   value="<?php if (isset($_SESSION['firstname'])) echo $_SESSION['firstname']; ?>" />
        </p>

        <p>
            <label for="surname"> Last Name </label>
            <input type="text" name="surname" id="surname" placeholder="Surname" disabled
                   value="<?php if (isset($_SESSION['lastname'])) echo $_SESSION['lastname']; ?>" />
        </p>

        <p>
            <label for="dob"> Date Of Birth </label>
            <input type="text" name="dob" id="dob" placeholder="Date of Birth" disabled
                   value="<?php if (isset($_SESSION['dob'])) echo $_SESSION['dob']; ?>" />
        </p>

        <br> <br>
        
        <!-- Submit button to submit the form -->
        <input type="submit" value="Submit" />
        <p>    

    </form>

    <?php 
    // If 'firstname' is not set but 'personid' is set, it indicates no record was found for the entered ID
    if (!isset($_SESSION['firstname']) && isset($_SESSION['personid'])) 
    {
        // Display a message indicating no matching records were found
        echo '<p style="color: red; text-align: center; font-size: 20px;">
              No record found for a person with id..' . $_SESSION['personid'] . '</p>';

        // Unset the session value for 'personid' to avoid showing it again in future requests
        unset($_SESSION['personid']);
    }
    ?>
    
</body>
</html>
