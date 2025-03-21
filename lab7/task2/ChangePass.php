<!--
    Name: Jamie WIlliamson
    ID: C00300786
-->
<?php 
// Include database connection
include 'db.inc.php';
session_start();

// Include external CSS file for styling
echo '<link rel="stylesheet" href="pass.css" type="text/css">';

// Check if a user is logged in
if (isset($_SESSION['user'])) {
    
    // Check if the form fields are set (submitted by the user)
    if (isset($_POST['oldPass']) && isset($_POST['newPass']) && isset($_POST['confirmPass'])) {
        
        // Retrieve input values
        $old = $_POST['oldPass'];  // Old password
        $new = $_POST['newPass'];  // New password
        $confirm = $_POST['confirmPass'];  // Confirm new password
        $user = $_SESSION['user'];  // Logged-in user

        // Query to check if the old password matches the stored password for the user
        $sql = "SELECT * FROM password WHERE loginName='$user' AND passWord='$_POST[oldPass]'";
        $result = mysqli_query($con, $sql);

        // Check if the query was executed successfully
        if (!$result) {
            echo "Error in Select query " . mysqli_error($con);
        } else {
            // Check if the provided old password is correct
            if (mysqli_affected_rows($con) == 0) {
                buildPage($old, $new, $confirm);
                echo "<div class='errorstyle'>Old password incorrect!</div>";
            } else {
                // Check if new password matches the confirm password field
                if ($new != $confirm) {
                    buildPage($old, $new, $confirm);
                    echo "<div class='errorstyle'>New passwords do not match - Please try again.</div>";
                } else {
                    // Prevent user from setting the same password as the old one
                    if ($old === $new) {
                        buildPage($old, $new, $confirm);
                        echo "<div class='errorstyle'>New password cannot be the same as the current password!</div>";
                    } else {
                        // Update the password in the database
                        $sql = "UPDATE passwords SET passWord = '$_POST[newPass]' WHERE loginName = '$user'";
                        if (!mysqli_query($con, $sql)) {    
                            echo "Error in Update query " . mysqli_error($con);
                        } else {
                            // Check if the password was successfully updated
                            if (mysqli_affected_rows($con) == 0) {
                                buildPage($old, $new, $confirm); 
                                echo "<div class='errorstyle'>No changes made!</div>";
                            } else {
                                echo "<div class='errorstyle'>Congratulations, your password has been updated!</div>
                                    <h3><input type='button' value='Proceed to Main Menu' onclick='window.location=\"menu.php\"'></h3>";
                                session_destroy(); // Destroy session to require re-login after password change
                            } 
                        }
                    }
                }
            }
        }
    } else {
        // Display the password change form initially (empty fields)
        buildPage("", "", "");
    }
} else {
    // If user is not logged in, display an error message
    echo '<div class="nologin">You must be logged in to view this page</div>';
}


function buildPage($o, $n, $c) {
    echo "<body>
            <form action='changePass.php' method='post'>
            <h1>My System</h1>
            <h3>Change Password</h3>
            <label for='oldPass'>Old Password</label>
            <input type='password' name='oldPass' id='oldPass' autocomplete='off' value='$o'>
            <br><br>
            <label for='newPass'>New Password </label>
            <input type='password' name='newPass' id='newPass' value='$n'>
            <br><br>
            <label for='confirmPass'>Confirm New Password</label>
            <input type='password' name='confirmPass' id='confirmPass' value='$c'>
            <br><br>
            <input type='submit' value='Submit'>
            </form>";
}

// Close the database connection
mysqli_close($con);
?>
