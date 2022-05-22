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
	height: 407px;
	z-index: 1;
	left: 258px;
	top: 283px;
	border: 2px solid #036;
    background: #466368;
  background: #466368;
  background: radial-gradient(#f6f1d3, #648880);
}
#apDiv16 {
	position: absolute;
	width: 597px;
	height: 66px;
	z-index: 7;
	left: 292px;
	top: 302px;
	border: 2px solid #036;
	background: #466368;
	background: radial-gradient(#f6f1d3, #648880);
}
#apDiv17 {
	position: absolute;
	width: 566px;
	height: 44px;
	z-index: 8;
	left: 310px;
	top: 355px;
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
 	var meridiem = "AM";
	if (hours > 12) {
    	hours = hours - 12;
    	meridiem = "PM";
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
  <div id="apDiv16">
  <div align="center">
  <?php
  include("../database_con.php");
  $username=$_POST['username'];
  $password=$_POST['password'];
  $did=$_POST['did'];
  $fullname=$_POST['fullname'];
  $phonenumber=$_POST['phonenumber'];
  $height=$_POST['height'];
  $weight=$_POST['weight'];
  $age=$_POST['age'];
  
  
  $qry=mysqli_query($connection,"update user set username='$username',password='$password',fullname='$fullname',phonenumber='$phonenumber',height='$height',weight='$weight',age='$age' where id='$did'");
  if($qry)
	  {
		  print "<h2><strong>Kullanıcı bilgileri başarı ile güncellendi...</strong></h2>";
	  }
	  else
	  {
		  print mysql_error();
	  }
  ?> 
  </div> 
  </div>
</div>

</body>
</html>
