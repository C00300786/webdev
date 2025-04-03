
<?php include 'db.inc.php';
session_start();
echo '<link rel="stylesheet" href= "pass.css" type="text/css">';
if (isset($_POST['loginName']) && isset($_POST['passWord']))
{
    $attempts = $_SESSION['attempts'];
    $sql = "SELECT * FROM StaffPassword WHERE loginName = '$_POST[loginName]' AND passWord = '$_POST[passWord]'";

    if (!mysqli_query($con, $sql))
    {
        echo "Error in query". mysqli_error($con);
    }
    else
    {
        if (mysqli_affected_rows($con) == 0)
        {
            $attempts++;

            if ($attempts <=3)
            { 
                $_SESSION['attempts'] = $attempts;
                buildPage($attempts);
                 echo "<div class='errorstyle'>No record found with this login name and password combination - Please try again.</div>";
            }
            else
            {
                 echo "<div class='errorstyle'>Sorry You have used all 3 attempts<br>
                    Shutting down...</div>";
            }
        }
        else
        {
            //Sucessful login
            $_SESSION['user'] = $_POST['loginName']; //sess var to keep track of login name
                                                    // for change pass screne
            
            echo"<h2>  Login Successful!</h2>
                 <h2>  Welcome tot he website</h2>
                 <h3>  Do you want to change or go to the main menu?<h3>
                 
                 <input type = 'button' value = 'Change Password' onclick = 'window.location = \"changePass.php\"'>  

                 <input type = 'button' value = 'Main Menu' onclick = 'window.location = \"menu.php\"'>  ";

        }
    }
}
else
{
    //building page for initial display
    $attempts = 1; // screen will be displayed for first attempt can be counted
    buildPage($attempts); // parameter passed so that heading displays num of attempts
};
function BuildPage($att) 
{
    echo "  <body>
            
            <form action = 'loginScreen.php' method = 'post'>
            <h1> My website</h1>
            <h2> Attempt num: $att </h2>
            <label for='loginName'>Login Name</label>
            <input type = 'text' name = 'loginName' id = 'loginName' autocomplete = 'off' /><br><br>
            <label for='passWord' >Password</label>
            <input type='password' name= 'passWord' id = 'passWord' ><br><br>
            <input type='submit' value = 'Submit'>
            
            </form>";
}
mysqli_close($con);
?>"
            
