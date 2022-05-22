<?php
session_start();
echo "session:".$_SESSION['id'];
if(!$_SESSION['id'])
{
	header("Location:index.html");
}
?>
<html lang="tr">
<head>
<meta charset="UTF-8">
<title>ReserveGym</title>
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
	width: 801px;
	height: 125px;
	background: #3FF;
	background: radial-gradient(#3FF 20%, #399);
	z-index: 1;
	left: 148px;
	top: 304px;
	font-family: "Comic Sans MS", cursive;
	font-size: 36px;
	border-bottom-left-radius: 50px;
	border-bottom-right-radius: 50px;
	border-top-left-radius: 50px;
	border-top-right-radius: 50px;
	box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
}
#apDiv16 {
	position: absolute;
	width: 141px;
	height: 97px;
	z-index: 3;
	left: 7px;
	background-image: url(aimage/admin_icon.jpg);
	top: 5px;
	border-bottom-left-radius:50px;
	border-top-left-radius:50px;
}

#apDiv17 {
	position: absolute;
	width: 620px;
	height: 70px;
	z-index: 4;
	left: 166px;
	top: 21px;
}
</style>

<script src="Admin_script.js"></script>
 
</head>
<body vlink="#ffffff" onLoad="startTime()">

  
  
   <?php
  	include("header.php");	
	?>
  
  
  <div id="apDiv12">
    <div align="center"><a href="Logout.php">Log out</a></div>
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
      <div align="center">
     <div id="apDiv16"></div>
     <div align="right"></div>
    </div>
      <div id="apDiv17">
        <div align="center">Online Appointment System for Gyms</div>
      </div>
  </div>
</div>

</body>
</html>
