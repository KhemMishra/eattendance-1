<?php
include 'config.php';
$sql_tpc="SELECT * FROM `tpc`";
$query_tpc=mysql_query($sql_tpc) or die(mysql_error());

$sql_tp="SELECT * FROM `tp`";
$query_tp=mysql_query($sql_tp) or die(mysql_error());

$sql_batches="SELECT * FROM `batches`";
$query_batches=mysql_query($sql_batches) or die(mysql_error());

$sql_trainers="SELECT * FROM `trainers`";
$query_trainers=mysql_query($sql_trainers) or die(mysql_error());

?>
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
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin-top:100px;
			margin-left:290px;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: black;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
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
input[type=text], input[type=password],input[type=select] {
    width: 100%;
	height:20px;
	aligh:center;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}
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
}
input[type=text]:focus, input[type=password]:focus, input[type=select]:focus {
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

<form method="post">
  <div class="container box">
  
    <hr>

<label><b>Training Partner</b></label>
	<select name="TPID" class="select">    
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
	
	<label><b>BATCH</b></label>
	<select name="BID" class="select">    
    <option value="">Select Batch</option>
       <?php
        while($th=mysql_fetch_assoc($query_batches)){
       ?>
         <option value="<?=$th['BID'] ?>"><?=$th['BID'] ?></option>
       <?php
       }
        ?>
    </select>
	
	<label><b>Date</b></label><br>
    <input type=date name="DATE" required>

	<input type=submit value="GENERATE" name="s" class="registerbtn">
  </div> 
</form>

<?php
include 'Attendance.php';
//include 'Time.php';
$host="localhost";
$user="root";
$pass="";
$db="attendance";
$conn=mysqli_connect($host,$user,$pass,$db);
$Status=array();

if(mysqli_connect_errno())
	echo"could't connect".mysqli_connect_error();
else
	echo"<center>connection established ";

if(isset($_POST['s']))
{
    $TPID="'".$_POST["TPID"]."'";
	$TPCID="'".$_POST["TPCID"]."'";
    $BID="'".$_POST["BID"]."'";
	$CID="'".$_POST["CID"]."'";
	$DATE="'".$_POST["DATE"]."'";
	
	$sql_1="insert into attendance_record(CID,TPID,TPCID,BID) Select student.CID,batches.TPID,batches.TPCID,batches.BID FROM student,batches where student.BID=$BID&&batches.BID=$BID";
	$sql_2="update attendance_record set DATE=$DATE WHERE DATE IS NULL";
	
	//to get the number of students 
	$size = @mysql_query("SELECT COUNT(CID) AS `total` FROM student where BID=$BID");
	$query = mysql_fetch_array($size);
	echo $query['total'];
	$query_trainers=mysql_query($sql_1) or die(mysql_error());
	$query_trainers=mysql_query($sql_2) or die(mysql_error());
	
	$Atten= new Attendance();
    $STATUS=$Atten->Main1($query['total'],4,1);
	$index=0;
	//for inserting the present and absent
	$q=mysql_query("select CID from attendance_record where BID=$BID and DATE=$DATE");
	while(list($CID)=@mysql_fetch_row($q)){
		mysql_query("update attendance_record set STATUS='".$STATUS[$index++]."' where CID='$CID' and BID=$BID and DATE=$DATE");
	}
     $result=mysql_query("select ETIME from batches where BID=$BID");
	 $etime = mysql_fetch_row($result);
	 echo $etime;
	if($conn->query($sql)===true)
		echo"<center>succesfully registered";
	else
		echo"some error occured".$conn->error;
	$conn->close();
	}
?>
</body>
</html>