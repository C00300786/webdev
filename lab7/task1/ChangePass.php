
<?php include 'db.inc.php';
session_start();
echo '<link rel="stylesheet" href="pass.css" type="text/css">';
if (isset($_SESSION['user'])) // checks whether a user has logged in
    {
        if (isset($_POST['oldPass']) && isset($_POST['newPass']) && isset($_POST['confirmPass']))
        {
            $old = $_POST['oldPass'];
            $new = $_POST['newPass'];
            $confirm = $_POST['confirmPass'];

            $user_SESSION['user'];

            $sql = "SELECT * FROM password WHERE loginName '$user' AND passWord = '$_POST[oldPass]'";
                if (! mysqli_query($con, $sql))
                    {
                        echo "Error in the Select query". mysqli_error($con);
                    }
                else
                {
                    if (mysqli_affected_rows($con) == 0)
                    {
                        buildPage($old, $new, $confirm);
                        echo"<div class='errorstyle'>Old password incorrect!</div>";
                    }
                    else
                    {
                        if ($_POST['newPass'] != $_POST['confirmPass']) 
                        {
                            echo"<div class='errorstyle'>New passwords do not match - Please try again. </div>";
                        }
                        else
                        {
                            $sql = "UPDATE password SET password = '$_POST[newPass]' WHERE loginName = '$user'";
                            if(! mysqli_query($con, $sql))
                            {
                                echo "Error in Update query". mysqli_error($con);
                            }
                            else
                            {
                                if (mysqli_affected_rows($con) == 0)
                                {
                                    buildPage($old, $new, $confirm);
                                    echo"<div class='errorstyle'>No changes made!</div>";
                                }
                                else
                                {
                                    echo"<div class='errorstyle'>Congratulations, your password has been updated!</div>
                                    <h3><input type='button' value='Proceed to Main Menu' onclick= 'window.location \"menu.php\"></h3>";
                                    session_destroy();
                                }
                            }
                        }
                    }
                }
        }
        else
        {
            //building page for intital dsplay
            bulidPage("","","");
        }
    }
else 
    {
        echo'<div class="nologin">You must be logged in to view this page</div>';
    }
function buildPage ($o, $n, $c) //parameters are old password, new password and confirm password respectively
    //Parameters passed so that old values will remain in fields for amendment, rather than facing blank fields each time
    {
        echo"
        <body>
        <form action = 'change Pass.php' method = 'post'>
        <h1>My System</h1>
        <h3>Change Password</h3>
        <label for 'oldPass'>Old Password</label>
        <input type='password' name = 'oldPass' id='oldPass' autocomplete= 'off' value = $o ><br><br>
        <label for 'newPass'>New Password </label><input type='password' name='newPass' id='newPass' value= $n><br><br>
        <label for 'confirmPass'>Confirm New Password</label><input type='password' name='confirmPass' id = 'confirmPass' value = $c><br><br> 
        <input type='submit' value='Submit'>
        </form>";
    }
    mysqli_close($con);
    ?>