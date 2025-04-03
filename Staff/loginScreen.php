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

// Check if login credentials are submitted
if (isset($_POST['LoginName']) && isset($_POST['PassWord'])) {
    
    // Retrieve the number of login attempts from session (default is 1)
    $attempts = $_SESSION['attempts'] ?? 1;

    // Query to check if the login credentials exist in the database
    $sql = "SELECT * FROM StaffPassword WHERE LoginName = '$_POST[LoginName]' AND Password = '$_POST[PassWord]'";
    $result = mysqli_query($con, $sql);

    // Check if the query execution was successful
    if (!$result) {
        echo "Error in query: " . mysqli_error($con);
    } else {
        // Check if no matching records were found (incorrect login credentials)
        if (mysqli_num_rows($result) == 0) {
            $attempts++; // Increment login attempt count
            $_SESSION['attempts'] = $attempts; // Store updated attempts in session

            // Allow up to 2 attempts before locking the user out
            if ($attempts <= 3) {
                buildPage($attempts);
                echo "<div class='errorstyle'>No record found with this login name and password combination - Please try again.</div>";
            } else {
                echo "<div class='errorstyle'>Sorry, you have used all 3 attempts.<br>Shutting down...</div>";
            }
        } else {
            // **Successful login**
            $user = mysqli_fetch_assoc($result); // Fetch user data from database
            $_SESSION['user'] = $user['LoginName']; // Store username in session

            // Provide options to change password or go to the main menu
            echo "<h3>Do you want to change your password or go to the main menu?</h3>
                  <input type='button' value='Change Password' onclick='window.location=\"changePass.php\"'>  
                  <input type='button' value='Main Menu' onclick='window.location=\"menu.php\"'>";  
        }
    }
} else {
    // Display login form for initial access
    $attempts = 1;
    buildPage($attempts);
}

/**
 * Function to generate the login form
 * @param int $att - The current login attempt number
 */
function buildPage($att) {
    echo "<body>
            <form action='loginScreen.php' method='post'>
            <h1>My Website</h1>
            <h2>Attempt Number: $att</h2>
            <label for='LoginName'>Login Name</label>
            <input type='text' name='LoginName' id='LoginName' autocomplete='off' /><br><br>
            <label for='password'>Password</label>
            <input type='password' name='PassWord' id='password'><br><br>
            <input type='submit' value='Submit'>
            </form>
          </body>";
}

// Close database connection
mysqli_close($con);
?>