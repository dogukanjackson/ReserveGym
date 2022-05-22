<?php
session_start();
if(!$_SESSION['id'])
{
	header("Location:index.html");
}
?>
<html lang="tr">
<head>
<meta charset="UTF-8">
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
	height: 427px;
	z-index: 1;
	left: 258px;
	top: 283px;
	border: 2px solid #036;
	box-shadow: 4px 4px 10px rgba(0, 0, 0, 1);
    background: #466368;
  background: #466368;
  background: radial-gradient(#f6f1d3, #648880);
}
#apDiv16 {
	position: absolute;
	width: 597px;
	height: 52px;
	z-index: 7;
	left: 260px;
	top: 229px;
}
#apDiv1 #apDiv16 div font strong h2 {
	color: #000;
}
</style>

<script src="yonetici_script.js"></script>
<script src="Validate/yonetici.js"></script>
 
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
	if (hours == 0) {
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
    <form action="yonetici_reg.php" method="post" enctype="multipart/form-data" name="yonetici">
      <table width="595" border="0">
        <tr>
          <td width="276" height="43"><div align="right"><strong>Username</strong></div></td>
          <td width="22">&nbsp;</td>
          <td width="283"><label for="username"></label>
          <input type="text" name="username" id="username" required></td>
        </tr>
        <tr>
          <td height="39"><div align="right"><strong>Name Surname</strong></div></td>
          <td>&nbsp;</td>
          <td><label for="fullname"></label>
          <input type="text" name="fullname" id="fullname"></td>
        </tr>
        <tr>
          <td height="31"><div align="right"><strong>Password</strong></div></td>
          <td>&nbsp;</td>
          <td><label for="password"></label>
          <input type="password" name="password" id="password"></td>
        </tr>
        <tr>
          <td height="37"><div align="right"><strong>Role</strong></div></td>
          <td>&nbsp;</td>
          <td><input type="radio" name="role" id="r1" value="Admin">
          <label for="radio">Admin 
            <input type="radio" name="role" id="r2" value="User">
          User</label></td>
        </tr>
        <tr>
        	<td height="39"><div align="right"><strong>Phone number</strong></div></td>
            <td>&nbsp;</td>
            <td><label for="phonenumber"></label>
              <input type="text" name="phonenumber" id="phonenumber"></td>
        </tr>
		<tr>
        	<td height="39"><div align="right"><strong>Height</strong></div></td>
            <td>&nbsp;</td>
            <td><label for="height"></label>
              <input type="text" name="height" id="height"></td>
        </tr>
		<tr>
        	<td height="39"><div align="right"><strong>Weight</strong></div></td>
            <td>&nbsp;</td>
            <td><label for="weight"></label>
              <input type="text" name="weight" id="weight"></td>
        </tr>
		<tr>
        	<td height="39"><div align="right"><strong>Age</strong></div></td>
            <td>&nbsp;</td>
            <td><label for="age"></label>
              <input type="text" name="age" id="age"></td>
        </tr>
		
        
        <tr>
          <td height="39" colspan="3"><div align="center">
            <input type="submit" name="button" id="button" value="Save" onClick="return validate()">
            <input type="reset" name="button" id="button" value="Cancel">
          </div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form>
  </div>
  <div id="apDiv16">
  <body>
      <div style = "position:relative; left:175px; top:-25px; background-color:NULL;">
      <strong><h2>Add new User</h2>
      </div>
   </body>
    
  </div>
</div>

</body>
</html>
