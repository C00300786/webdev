<!--
    Name: Jamie WIlliamson
    ID: C00300786
-->

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="task3.css" /> <!--links to stylesheet-->
</head>
<body>

<div class="box"> <!--Creates box around form-->
<H1> Amend/View a Student</H1>
<H4> Please select a student and the click the amend button if you wish to update </H4>

<?php include 'listbox.php'; ?> <!--links to php file that grabs the data from database-->
<script>
function populate() //function to fill in input boxes with selected person's data
{
    var sel = document.getElementById("listbox"); //box that contains entry options of what person to view
    var result;
    result = sel.options[sel.selectedIndex].value; //adds options in selected person box allowing you to pick which entry to view
    var studentDetails = result.split(','); //seperates each column with a comma
    document.getElementById("display").innerHTML = "The details of the selected student are: " + result; //prints details of person
    document.getElementById("amendid").value = studentDetails[0]; //saves amend variable as value from database
    document.getElementById("amendname").value = studentDetails[1];
    document.getElementById("amendaddress").value = studentDetails[2];
    document.getElementById("amendphone").value = studentDetails[3];
    document.getElementById("amendgrade").value = studentDetails[4];
    document.getElementById("amendDOB").value = studentDetails[5];
    document.getElementById("amendyear").value = studentDetails[6];
    document.getElementById("amendcode").value = studentDetails[7];
}
function toggleLock() //function to lock and unlock input boxes
{
    if (document.getElementById("amendViewbutton").value == "Amend Details") //if button's text displays amend details
    {
        document.getElementById("amendname").disabled = false; //input box is enabled
        document.getElementById("amendaddress").disabled = false;
        document.getElementById("amendphone").disabled = false;
        document.getElementById("amendgrade").disabled = false;
        document.getElementById("amendDOB").disabled = false;
        document.getElementById("amendyear").disabled = false;
        document.getElementById("amendcode").disabled = false;
        document.getElementById("amendViewbutton").value = "View Details"; //button's text displays view details
    }
    else
    {
        document.getElementById("amendname").disabled = true; //input box is disabled
        document.getElementById("amendaddress").disabled = true;
        document.getElementById("amendphone").disabled = true;
        document.getElementById("amendgrade").disabled = true;
        document.getElementById("amendDOB").disabled = true;
        document.getElementById("amendyear").disabled = true;
        document.getElementById("amendcode").disabled = true;
        document.getElementById("amendViewbutton").value = "Amend Details"; //button's text displays amend details
    }
}
function confirmCheck() //function that asks you if you want to save changes
{
    var response;
    response = confirm('Are you sure you want to save these changes?'); //prompt that confirms if you want to save
    if (response)
    {
        document.getElementById("amendid").disabled = false; //input box is enabled
        document.getElementById("amendname").disabled = false;
        document.getElementById("amendaddress").disabled = false;
        document.getElementById("amendphone").disabled = false;
        document.getElementById("amendgrade").disabled = false;
        document.getElementById("amendDOB").disabled = false;
        document.getElementById("amendyear").disabled = false;
        document.getElementById("amendcode").disabled = false;
    }
    else
    {
        populate();
        toggleLock();
        return false;
    }
}
</script>
<div class="inputbox">
<p id = "display"> </p> <!--Details of person selected-->
<br>
<input type = "button" value = "Amend Details" id = "amendViewbutton" onclick = "toggleLock()"> <!--button to enable input boxes-->

<form name="myForm" action="AmendView.php" onsubmit="return confirmCheck()" method="post"> <!--form which when submitted goes to a function which asks the user if they want to submit and is saved with POST-->
<ul>
<li><label for="amendid">Student Id</label>
<input type="text" name="amendid" id="amendid" style="position: relative; left: 63px" disabled> <!--input box which is disabled by default-->
</li>
<li><label for="amendname">Name</label>
<input type="text" name="amendname" id="amendname" style="position: relative; left: 91px" pattern="[A-Za-z]{1-30}" disabled>
</li>
<li><label for="amendaddress">Address</label>
<input type="text" name="amendaddress" id="amendaddress"  style="position: relative; left: 77px" pattern="*{1-150}" disabled>
</li>
<li><label for="amendphone">Phone number</label>
<input type="text" name="amendphone" id="amendphone" style="position: relative; left: 36px" pattern="[0-9 ]{8-12}" disabled/>
</li>
<li><label for="amendgrade">Grade Average</label>
<input type="text" name="amendgrade" id="amendgrade" style="position: relative; left: 34px" pattern="[0-9]{1-2}\.[0-9]+" disabled/>
</li>
<li><label for="amendDOB">Date of Birth</label>
<input type="date" name="amendDOB" id="amendDOB" title="format is dd-mm-yyyy" style="position: relative; left: 77px" disabled>
<li><label for="amendyear">Year Course Began</label>
<input type="number" name="amendyear" id="amendyear" style="position: relative; left: 5px" pattern="[0-9]{4}" disabled/>
</li>
<li><label for="amendcode">Course Code</label>
<input type="text" name="amendcode" id="amendcode" style="position: relative; left: 46px" pattern="[A-Za-z0-9]{1-8}" disabled/>
</li>
</ul>
<br><br>
<div class="myButton">
<input type="submit" value="Save Changes">
</div>
</form>
</div>
</div>
</body>
</html>
 