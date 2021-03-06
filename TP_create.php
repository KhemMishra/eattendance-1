<html>
<!DOCTYPE html>
<title>eAttendance</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS.css">
<style>
.new{
font-size:13px;
}
body {
    font-family: Arial, Helvetica, sans-serif;
    
}

* {
    box-sizing: border-box;
}

/* Add padding to containers */
.container {
    padding: 16px;
    background-color: white;
}
div.box{
width:50%;
margin-left:350px;
}
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
	aligh:center;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Overwrite default styles of hr */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
    background-color:black;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.registerbtn:hover {
    opacity: 1;
}

/* Add a blue text color to links */
a {
    color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
    background-color: #f1f1f1;
    text-align: center;
}
</style>
</head>
<body>

<!-- Navbar -->
<div class="w3-top">
<div class="w3-bar w3-black w3-card">
<a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="LOGIN.php" class="w3-bar-item w3-button w3-padding-large new">HOME</a>
    <a href="TRAINING_PARTNERS.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">TRAINING PARTNER</a>
    <a href="TRAINING_PARTNERS_CENTER.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">TRAINING PARTNER CENTERS</a>
    <a href="BATCHES.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">BATCHES</a>
	<a href="TRAINERS.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">TRAINERS</a>
	<a href="STUDENTS.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">STUDENTS</a>
	<a href="#contact" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">GENERATE ATTENDANCE</a>
	<a href="USER_create.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">CREATE USER</a>
	<a href="#contact" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">LOGOUT</a>
  </div>
</div>

  <div class="container box">
    <p style="margin-top:60px;">Create training partner</p>
    <hr>
	
     <form  method="post">
    <label><b>TPID</b></label>
    <input type=text placeholder="Enter TPID" name="tpid" maxlength=4 minlength=4 size=4 required>

    <label><b>NAME</b></label>
    <input type=text placeholder="Enter Name" name="tp_name" required>

    <label><b>DESCRIPTION</b></label>
    <input type=text placeholder="Add Description" name="description" required>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a></p>
	<input type=submit value="Submit" name="s" class="registerbtn">
	</form>
  </div>
   
<?php
$host="localhost";
$user="root";
$pass="";
$db="attendance";
$conn=mysqli_connect($host,$user,$pass,$db);

if(mysqli_connect_errno())
	echo"could't connect".mysqli_connect_error();
else
	echo"<center>connection established ";

if(isset($_POST['s']))
{
    $tpid="'".$_POST["tpid"]."'";
	$tp_name="'".$_POST["tp_name"]."'";
	$description="'".$_POST["description"]."'";
    $sql="insert into tp(tpid,tp_name,description)values($tpid,$tp_name,$description)";	
	if($conn->query($sql)===true)
		echo"<center>succesfully registered";
	else
		echo"some error occured".$conn->error;
	$conn->close();
	}
?>
</html>
</body>