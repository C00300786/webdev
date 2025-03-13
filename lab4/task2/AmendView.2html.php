<!--
    Name: Jamie WIlliamson
    ID: C00300786
-->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="layout.css">
</style> </head> <body>
<h1> Amend/View a Person</h1>
<h4>Please select a person and then click the amend button if you wish to update</h4>
<?php include 'listbox2.php'; ?>
<script>
function populate ()
{
var sel = document.getElementById("listbox");
var result;
result = sel.options[sel.selectedIndex].value;
var personDetails = result.split(',');
document.getElementById("amendid").value = personDetails[0];
document.getElementById("display").innerHTML = "The details of the selected person are:
document.getElementById("amendfirstname").value = personDetails [1];
document.getElementById("amendlastname").value = personDetails [2];
document.getElementById("amendDOB").value = personDetails [3];
document.getElementById("amendemailaddress").value = personDetails [4];
document.getElementById("amendphonenumber").value = personDetails [5];
}
function toggleLock()
{
if (document.getElementById("amendViewbutton").value == "Amend Details")
{
document.getElementById("amendfirstname").disabled = false; 
document.getElementById("amendlastname").disabled = false; 
document.getElementById("amendDOB").disabled = false;
document.getElementById("amendemailaddress").disabled = false;
document.getElementById("amendphonenumber").disabled = false;
document.getElementById("amendViewbutton").value = "View Details";
}
else
{
document.getElementById("amendfirstname").disabled = true; 
document.getElementById("amendlastname").disabled = true; 
document.getElementById("amendDOB").disabled = true;
document.getElementById("amendemailaddress").disabled = true;
document.getElementById("amendphonenumber").disabled = true;
document.getElementById("amendViewbutton").value = "Amend Details";
}
}
function confirmCheck()
{
var response;
response = confirm ('Are you sure you want to save these changes?'); 
if (response)
    {
        document.getElementById("amendid").disabled = false;
        document.getElementById("amendfirstname").disabled = false; 
        document.getElementById("amendlastname").disabled = false;
        document.getElementById("amendDOB") .disabled = false;
        document.getElementById("amendemailaddress") .disabled = false;
        document.getElementById("amendphonenumber") .disabled = false;
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
<label for "amendid">Person Id </label>
<input type="text" name = "amendid" id="amendid" disabled>
<label for "amendfirstname">First Name </label>
<input type="text" name = "amendfirstname" id= "amendfirstname" disabled> 
<label for "amendlastname">Surname</label>
<input type="text" name = "amendlastname" id= "amendlastname" disabled>
<label for "amendDOB">Date of Birth </label>
<input type="date" name="amendDOB" id="amendDOB" title = "format is dd-mm-yyyy" disabled>
label for "amendemailaddress">Email Address </label>
<input type="email" name="amendemailaddress" id="amendemailaddress" disabled> 
label for "amendphonenumber">Phone Number </label>
<input type="text" name="amendphonenumber" id="amendphonenumber" disabled> 
<br><br>
<input type="submit" value="Save Changes" > 
</form>
</body>
</html>