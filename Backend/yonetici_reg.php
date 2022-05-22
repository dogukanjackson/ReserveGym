<?php
session_start();
if(!$_SESSION['id'])
{
	header("Location:index.html");
}
?>
<html>
<head>
<title>ReserveGym</title>
<link rel="stylesheet" href="Style/yonetici_css.css"/>
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
	width: 598px;
	height: 70px;
	z-index: 1;
	left: 258px;
	top: 283px;
	border: 2px solid #036;
}
#apDiv16 {
	position: absolute;
	width: 597px;
	height: 52px;
	z-index: 7;
	left: 260px;
	top: 229px;
}
#apDiv17 {
	position: absolute;
	width: 595px;
	height: 235px;
	z-index: 7;
	left: 258px;
	top: 355px;
	border:2px solid #036;
    background: #466368;
  background: #466368;
  background: radial-gradient(#f6f1d3, #648880);
}
</style>

<script src="yonetici_script.js"></script>
 
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
  <div id="apDiv15">
  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  	include("../database_con.php");

  	$qry="INSERT INTO user(username,password,role,fullname,phonenumber,height,weight,age) VALUES('$_POST[username]','$_POST[password]','$_POST[role]','$_POST[fullname]','$_POST[phonenumber]','$_POST[height]','$_POST[weight]','$_POST[age]')";
  	$result=mysqli_query($connection,$qry);
  	if($result)
  	{
    	print "<strong><h2 align='center'>New user added!</h2></strong>";
  	}
  	else
  	{
    	print mysql_error();
  	}
	}
  ?>
  </div>
  
    
  </div>
</div>
<div id="apDiv13" onMouseOver="show3()" onMouseOut="hide3()">
  <table width="156" height="71" border="0">
    <tr>
      <td width="131" height="31"><div align="left"><a href="profile.php">View Profile</a></div></td>
    </tr>
    <tr>
      <td width="131" height="34">
      <div align="left"><a href="Ch_pass.php">Change Password</a></div></td>
    </tr>
  </table>
</div>
</body>
</html>
