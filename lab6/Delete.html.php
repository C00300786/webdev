<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Delete a Person</h1>
    <h4>Please select a person then click the delete button</h4>

    <?php include 'listbox.php'  ?>
    <script>
    function populate(){
        var sel = document.getElembtById("listbox");
        var result;
        result = sel.options[sel.selectedIndex].value;
        vae personDetails = result.split(',');
        document.getElementById("display").innerHTML = "the details of the selected person are: " + result;
        document.getElementById("delid").value = personDetails[0];
        document.getElementById("delfirstname").value = personDetails[1];
        document.getElementById("dellastname").value = personDetails[2];
        document.getElementById("delDOB").value = personDetails[3];
    }
    function confirmCheck()
    {
        var responce;
        responce = confirm('Are you sure you want to delete this person?');
        if (condition) 
        {
            document.getElementById("display").disabled = false;
            document.getElementById("delid").disabled = false;
            document.getElementById("delfirstname").disabled = false;
            document.getElementById("dellastname").disabled = false;
            document.getElementById("delDOB").disabled = false;
        }
        else
        {
            populate();
            return false;
        }
    }
    </script>
    <p id = "display"></p>
    
<form name="deleteForm" action="delete.php" onsubmit="return confirmCheck ()" method="post">
<label for "delid">Person Id </label>
<input type="text" name="delid" id="delid" disabled>
<label for "delfirstname">First Name </label>
<input type="text" name="delfirstname" id="delfirstname" disabled>
<label for "dellastname">Surname</label>
<input type="text" name="dellastname" id="dellastname" disabled> 
<label for "delDOB">Date of Birth </label>
<input type="date" name= "delDOB" id="delDOB" title = "format is dd-mm-yyyy" disabled> 
<br><br>
<input type="submit" value="Delete the record" >
<?php
    if (ISSET($_SESSION["personid"])) { echo "<h1 class='myMessage'>Record deleted for ". $_SESSION["firstname"] . " ".$_SESSION["lastname"]. "</h1>" ;}
    session_destroy();
?>
</body>
</html>