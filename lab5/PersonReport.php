<!--
     Name: Jamie WIlliamson
    ID: C00300786
-->
<html>
<head>
</head>
<body>
    <!-- Link the php which connects to the database and to get the menu -->
<?php include "menu.php";
    include 'db.inc.php';
date_default_timezone_set('UTC');
?>
<!-- form for viewing the report -->
<form action = "PersonReport.php" method="post" name="reportForm"> 
<input type="hidden" name="choice">
</form>
<!-- buttons to select which way to sort -->
<h1>Person Report</h1>
<h3>(Click a button to see the Person Report in the desired order)</h3>
<input type='button' id="dateButton" value= 'Date of Birth Order' onclick='dateOrder()' title='Click here to see persons in reverse date of birth order'>
<input type='button' id="nameButton" value= 'Surname Order' onclick='surnameOrder()' title='Click here to see Persons in alphabetical order of surname'>
<input type='button' id="emailButton" value= 'Email Order' onclick='emailOrder()' title='Click here to see Persons in alphabetical order of email'>
<br>
<br>
<script>
// function for sort by date of birth
function dateOrder()
{
    document.reportForm.choice.value = "DOB";
    document.reportForm.submit();
}
// function for sort by Surname
function surnameOrder()
{
    document.reportForm.choice.value = "Surname";
    document.reportForm.submit();
}
// function for sort by email
function emailOrder()
{
    document.reportForm.choice.value = "Email";
    document.reportForm.submit();
}
</script>
<?php
$choice="Surname"; // In case this is the first time through and $_POST[choice] hasn't been set if (ISSET($_POST['choice']))
// set the choice into a variable
if(ISSET($_POST['choice']))
{
    $choice = $_POST['choice'];
}
// sort by Date of birth
if ($choice == "DOB")
{
    ?>
    <script>
        // disable Date of birth and enable other two
        document.getElementById("dateButton") .disabled = true;
        document.getElementById("nameButton") .disabled = false;
        document.getElementById("emailButton") .disabled = false;
    </script>
    
<?php
// order by date of birth
    $sql = "SELECT * FROM persons WHERE DeletedFlag = false ORDER BY DOB DESC";
    produceReport($con, $sql);
}
// sort by email
else if($choice == "Email")
{
    ?>
    <script>
        // disable Email and enable other two
        document.getElementById("dateButton") .disabled = false;
        document.getElementById("nameButton") .disabled = false;
        document.getElementById("emailButton") .disabled = true;
    </script>
    
<?php
// order by email
    $sql = "SELECT * FROM persons WHERE DeletedFlag = false ORDER BY email";
    produceReport($con, $sql);
}
else //if ($choice == "Surname") or the default display before any button is clicked
{
?>
    <script>
        // disable Surname and enable other two
        document.getElementById("nameButton") .disabled = true;
        document.getElementById("dateButton").disabled = false;
        document.getElementById("emailButton") .disabled = false;
    </script>
<?php
// order by surname
    $sql = "SELECT * FROM persons where DeletedFlag = false ORDER BY lastName"; 
    produceReport($con, $sql);
}
// function for displaying the report
function produceReport($con, $sql)
{
    // get the result of the sort
    $result = mysqli_query($con, $sql);
    // echo head of table
    echo "<table>
        <tr>
            <th>Surname</th>
            <th>First Name</th>
            <th>Date of Birth</th>
            <th>Email</th>
            <th>Phone Number</th>
        </tr>";
// while to get all records
    while($row=mysqli_fetch_array($result))
    {
        // Set up the date for display
        $date = date_create($row['DOB']);
        $FDate = date_format($date, "d/m/Y");
        // echo report values for person
        echo    "<td>".$row['lastname']."</td>
                <td>".$row['firstname']."</td>
                <td>".$FDate."</td>
                <td>".$row['Email']."</td>
                <td>".$row['Phone']."</td>
                </tr>";
    }
    // close the table
        echo "</table>";
}
// close the connection
mysqli_close($con);
?>
</body>
</html>