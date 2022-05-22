<?php
session_start();
if(!$_SESSION['id'])
{
	header("Location:index.html");
}
?>
<html>
<head>
<title>Delete User</title>
<link rel="stylesheet" href="Style/Admin_style.css"/>
<style type="text/css">
#apDiv14 {
	position: absolute;
	width: 148px;
	height: 32px;
	z-index: 6;
	left: 947px;
	top: 85px;
	font-family: courier, monospace;
	text-align: center;
	color: white;
	font-size: 20px;
}
#apDiv15 {
	position: absolute;
	width: 410px;
	height: 65px;
	z-index: 7;
	left: 282px;
	top: 273px;
	background-color: #009999;
}
</style>

<script src="Admin_script.js"></script>
 
</head>
<body vlink="#ffffff" onLoad="startTime()">
 <?php
  	include("header.php");	
	?>
  <div id="apDiv12">
    <div align="center"><a href="Logout.php">Sign out</a></div>
  </div>
  <div id="apDiv14">
 <script>
 	var meridiem = "PM";
	if (hours > 12) {
    	hours = hours - 12;
    	meridiem = "AM";
	}
	if (hours === 0) {
    	hours = 12;    
	}
	
    function startTime() {
    	var today=new Date();
    	var h=today.getHours();
    	var m=today.getMinutes();
    	var s=today.getSeconds();
   	 	m = checkTime(m);
    	s = checkTime(s);
    	document.getElementById('apDiv14').innerHTML = h+":"+m+":"+s+" "+meridiem;
    	var t = setTimeout(function(){startTime()},500);
	}

function checkTime(i) {
    if (i<10) {i = "0" + i}; 
    return i;
}
</script>

  </div>
  <div id="apDiv15" align="center">
  <?php
  include("../database_con.php");
  $p_id=$_GET['id'];
  $qry=mysqli_query($connection,"delete from user where id='$p_id'");
	  if($qry)
	  {
		  print "<h2><strong>User removed!</strong></h2>";
		  header("Location:yonetici_mod.php");
	  }
	  else
	  {
		  print mysql_error();
	  }
  ?>  
  </div>
</div>

</body>
</html>
