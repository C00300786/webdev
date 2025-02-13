<!--
    name:   jamie williamson
    id:     c00300786
    lab:    3
    task:   2
-->
<?php
    // Start the session to access session variables
    session_start();
?>

<html>
<body>
    <!-- Form for displaying and submitting the person details -->
    <form action="displayview2.php" method="Post">
        
        <!-- Input for person ID with prefilled value from session if available -->
        <p>
            <label for="personid">Enter the personid you want to find</label>
            <!-- The value is prefilled if a session variable for personid exists -->
            <input type="text" name="personid" id="personid" placeholder="person id" autocomplete="off" required 
                value="<?php if (isset($_SESSION['personid'])) echo $_SESSION['personid']; ?>" />
        </p>

        <!-- Input for first name with prefilled session value (disabled so user can't change it) -->
        <p>
            <label for="firstname">First name</label>
            <input type="text" name="firstname" id="firstname" placeholder="first name" disabled 
                value="<?php if (isset($_SESSION['firstname'])) echo $_SESSION['firstname']; ?>" />
        </p>
        
        <!-- Input for last name with prefilled session value (disabled) -->
        <p>
            <label for="surname">Last Name</label>
            <input type="text" name="surname" id="surname" placeholder="Surname" disabled
                value="<?php if (isset($_SESSION['lastname'])) echo $_SESSION['lastname']; ?>" />
        </p>
        
        <!-- Input for date of birth with prefilled session value (disabled) -->
        <p>
            <label for="dob">Date Of Birth</label>
            <input type="text" name="dob" id="dob" placeholder="Date of Birth" disabled 
                value="<?php if (isset($_SESSION['dob'])) echo $_SESSION['dob']; ?>" />
        </p>

        <!-- Input for email with prefilled session value (disabled) -->
        <p>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Email" disabled 
                value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email']; ?>" />
        </p>

        <!-- Input for phone with prefilled session value (disabled) -->
        <p>
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" placeholder="Phone" disabled 
                value="<?php if (isset($_SESSION['phone'])) echo $_SESSION['phone']; ?>" />
        </p>

        <!-- Submit button to submit the form -->
        <br><br>
        <input type="submit" value="Submit"/>

    </form>

    <?php
        // Check if no session data for person was found, but personid is set
        if (!isset($_SESSION['firstname']) && isset($_SESSION['personid'])) {
            // Display an error message if no matching record was found
            echo '<p style="color: red; text-align: center; font-size:20">
                  No record found for a person with id: ' . $_SESSION['personid'] . '</p>';
            
            // Unset the session variable to clear the personid after the error message
            unset($_SESSION['personid']);
        }
    ?>
</body>
</html>
