<?php session_start();
      include 'menu.php'; 
?>
<br><br>
<?php      
    include 'db.inc.php';
     
    $sql = "UPDATE persons SET deletedflag = true WHERE personid = '$_POST[delid]'";
    if(! mysqli_query($con,$sql))
    {
        echo "Error ".mysqli_error($con);
    }

    $_SESSION["personid"] = $_POST['delid'];
    $_SESSION["firstnsme"] = $_POST['delfirstname'];
    $_SESSION["lastname"] = $_POST['dellastname'];

    mysquli_close($con);
?>
<script>
    window.location = "telete.html.php"
</script>