<?php
include 'config.php';
$sql_tpc="SELECT * FROM `tpc`";
$query_tpc=mysql_query($sql_tpc) or die(mysql_error());

$sql_tp="SELECT * FROM `tp`";
$query_tp=mysql_query($sql_tp) or die(mysql_error());
?>
<!DOCTYPE html>
<html>
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
	height:20px;
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

/* for select options */
.select{
	width: 100%;
	height:20px;
	aligh:center;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
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
    <a href="TP_create.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">TRAINING PARTNER</a>
    <a href="TP_center_create.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">TRAINING PARTNER CENTERS</a>
    <a href="BATCH_create.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">BATCHES</a>
	<a href="TRAINERS_create.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">TRAINERS</a>
	<a href="STUDENT_create.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">STUDENTS</a>
	<a href="#contact" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">GENERATE ATTENDANCE</a>
	<a href="USER_create.php" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">CREATE USER</a>
	<a href="#contact" class="w3-bar-item w3-button w3-padding-large new w3-hide-small">LOGOUT</a>
  </div>
</div>
<form method="post">
  <div class="container box">
  
    <p style="margin-top:60px;">CREATE USER</p>
    <hr>
	
	<label><b>Choose Category</b></label>
    <input type=text placeholder="Category" name="Category" required>

    <label><b>Training Partner</b></label>
	<select name="TP" class="select">    
    <option value="tp">Select Training Partner</option>
       <?php
        while($th=mysql_fetch_assoc($query_tp)){
       ?>
         <option value="<?=$th['tpid'] ?>"><?=$th['tp_name'] ?></option>
       <?php
       }
        ?>
    </select>

    <label><b>Training Partner Center</b></label>
	<select name="TPCID" class="select">    
    <option value="">Select Training Partner Center</option>
       <?php
        while($th=mysql_fetch_assoc($query_tpc)){
       ?>
         <option value="<?=$th['TPCID'] ?>"><?=$th['TPCName'] ?></option>
       <?php
       }
        ?>
    </select>

	<label><b>First Name</b></label>
    <input type=text placeholder="Enter First Name" name="FN" required>

	<label><b>Last Name</b></label>
    <input type=text placeholder="Enter Last Name" name="LN" required>

    <label><b>Email</b></label>
    <input type=text placeholder="Enter Email" name="Email" required>
	
    <label><b>Password</b></label>
    <input type=password placeholder="Enter Password" name="Password" required>

	<hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <input type=submit value="Submit" name="s" class="registerbtn">
  </div>
   
</form>
<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">Brainworks Technosolutions</a></p>
</footer>

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
    $Category="'".$_POST["Category"]."'";
	$TP="'".$_POST["TP"]."'";
	$TPCID="'".$_POST["TPCID"]."'";
	$FN="'".$_POST["FN"]."'";
	$LN="'".$_POST["LN"]."'";
	$Email="'".$_POST["Email"]."'";
	$Password="'".$_POST["Password"]."'";
    $sql="insert into user(Category,TP,TPCID,FN,LN,Email,Password)values($Category,$TP,$TPCID,$FN,$LN,$Email,$Password)";	
	if($conn->query($sql)===true)
		echo"<center>succesfully registered";
	else
		echo"some error occured".$conn->error;
	$conn->close();
	}
?>
</html>
</body>