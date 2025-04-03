<!--
    Name: Jamie WIlliamson
    ID: C00300786
-->
<!DOCTYPE html>
<html>
<head>
<?php include "menu.php"; ?>
<link rel="stylesheet" type="text/css" href="layout.css">
</style>

</head>
<body>

<h3>Person Report</h3>
<h4>Sort by: </h4>


<h3> Amend/View a Person</h3>
<h4>Please select a person and then click the amend button if you wish to update</h4>

<?php include 'listbox.php'; ?>
<script>
function populate()
{
    var sel = document.getElementById("listbox");
    var result;
    result = sel.options[sel.selectedIndex].value;
    var personDetails = result.split(',');
    document.getElementById("display").innerHTML = "The details of the selected person are: " + result;
    document.getElementById("amendid").value = personDetails[0];
    document.getElementById("amendfirstname").value = personDetails[1];
    document.getElementById("amendlastname").value = personDetails[2];
    document.getElementById("amendDOB").value = personDetails[3];
    document.getElementById("amendjob").value = personDetails[4];
    document.getElementById("amendphone").value = personDetails[5];
    document.getElementById("amendflag").value = personDetails[6];
}
function toggleLock()
{
    if (document.getElementById("amendViewbutton").value == "Amend Details")
    {
        document.getElementById("amendfirstname").disabled = false;
        document.getElementById("amendlastname").disabled = false;
        document.getElementById("amendDOB").disabled = false;
        document.getElementById("amendjob").disabled = false;
        document.getElementById("amendphone").disabled = false;
        document.getElementById("amendflag").disabled = false;
        document.getElementById("amendViewbutton").value = "View Details";
    }
    else
    {
        document.getElementById("amendfirstname").disabled = true;
        document.getElementById("amendlastname").disabled = true;
        document.getElementById("amendDOB").disabled = true;
        document.getElementById("amendejob").disabled = true;
        document.getElementById("amendphone").disabled = true;
        document.getElementById("amendflag").disabled = true;
        document.getElementById("amendViewbutton").value = "Amend Details";
    }
}

function confirmCheck()
{
    var response;
    response = confirm ('Are you sure you want to save these changes?');
    if(response)
    {
        document.getElementById("amendid").disabled = false;
        document.getElementById("amendfirstname").disabled = false;
        document.getElementById("amendlastname").disabled = false;
        document.getElementById("amendDOB").disabled = false;
        document.getElementById("amendejob").disabled = false;
        document.getElementById("amendphone").disabled = false;
        document.getElementById("amendflag").disabled = false;
        return true;
    }
    else
    {
        populate();
        toggleLock();
        return false;
    }
}
</script>

<p id="display"> </p>
<input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()">

<form name="myForm" action="AmendView.php" onsubmit="return confirmCheck()" method="post">

<label for="amendid">Person Id</label>
<input type="text" name = "amendid" id="amendid" disabled>
<br>
<label for="amendfirstname">First Name</label>
<input type="text" name = "amendfirstname" id="amendfirstname" disabled>
<br>
<label for="amendlastname">Surname</label>
<input type="text" name = "amendlastname" id="amendlastname" disabled>
<br>
<label for="amendDOB">Date of Birth</label>
<input type="date" name="amendDOB" id="amendDOB" title="format is dd-mm-yyyy" disabled>
<br>
<label for="amendjob">Job Title</label>
<input type="text" name = "amendjob" id="amendjob" disabled>
<br>
<label for="amendphone">Phone Number</label>
<input type="text" name = "amendphone" id="amendphone" pattern="[\]*" disabled>
<br>
<label for="amendflag">Deleted Flag</label>
<input type="text" name = "amendflag" id="amendflag" disabled>
<br><br>
<input type="submit" value="Save Changes">
</form>

</body>
</html>