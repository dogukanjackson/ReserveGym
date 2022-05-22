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
	width: 838px;
	height: 425px;
	z-index: 1;
	left: 145px;
	top: 242px;
	background: #466368;
	background: #466368;
	background: radial-gradient(#f6f1d3, #648880);
	border: 3px solid maroon;
}
#apDiv15 table{
    color: black;
    table-layout: auto;
    background: #8FD2D6;
}
#apDiv15 tr td{
    border: 1px solid maroon;
    background: #466368;
	background: radial-gradient(#f6f1d3 40%, #648880);
	font-weight:bold;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}
#apDiv15 tr th{
    border: 2px solid maroon;
    background: #f6f1d3;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}
#apDiv15 tr td a:link{
	color:#006;
	font-weight:bold;
	font-size:16px;
}
#apDiv15 tr td a:visited{
	color:#006;
}


#apDiv17 {
	position: relative;
	width: 598px;
	height: 260px;
	z-index: 1;
	left: 258px;
	top: 683px;
	border: 2px solid #036;
	box-shadow: 4px 4px 10px rgba(0, 0, 0, 1);
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
  <div id="apDiv15">
    <table width="840" height="39" border="1" cellpadding="1" cellspacing="1">
      <tr>
        <th width="140">username</th>
        <th width="143">fullname</th>
        <th width="168">phone number</th>
       
        <th width="164" colspan="2" bgcolor="#CCCCCC">Update</th>
		<th width="164"  bgcolor="#CCCCCC">Profile</th>
      </tr>
      <tr>
      <?php
      include("../database_con.php");
      $sql="SELECT * FROM user where role='user'";
      $record=mysqli_query($connection,$sql);
      if($record)
      {
        while($user=mysqli_fetch_assoc($record))
        {
            print "<tr>";
           
            print "<td>".$user['username']."</td>";
            print "<td>".$user['fullname']."</td>";
            print "<td>".$user['phonenumber']."</td>";
			$did=$user['id'];
			print "<td align='center'>";
			print "<a href='yonetici_mod1.php?id=".$did."'>Update</a>";
			print "</td>";
			print "<td align='center'>";
			print "<a href='yonetici_delete.php?id=".$did."'>Delete</a>";
			print "</td>";
			print "<td align='center'>";
			print "<a href='yonetici_mod.php?islem=izle&id=".$did."'>view</a>";
			print "</td>";
            print "</tr>";
        }
      }
      ?>
      </tr>
    </table>
  </div>
 <div id="apDiv17">
   
   
     <?php
      include("../database_con.php");
	  
	  if ($_SERVER["REQUEST_METHOD"] == "GET") {
     if(isset($_GET['islem']))
	 {		 
		 $islem = $_GET['islem']; 
		   $id = $_GET['id']; 
		   if($id!="")
		   {
		   ?>
		   
		   
		    <table width="500" height="39" border="1" cellpadding="1" cellspacing="1" align="center">
	  <tr><td colspan="5" align="center">User Information</td></tr>
      <tr>
        <th width="300">Fullname</th>
        <th width="200">Phone number</th>
		<th width="200">Age</th>
		<th width="200">Weight</th>
		<th width="200">Height</th>
       
       
       
      </tr>
      <tr>
    
		 
	  <?php
	  
      $sql="SELECT * FROM user where id='$id'";
	  //echo $sql;
      $record=mysqli_query($connection,$sql);
      if($record)
      {
        while($user=mysqli_fetch_assoc($record))
        {
            print "<tr>";
           
            print "<td>".$user['fullname']."</td>";
            print "<td>".$user['phonenumber']."</td>";
			print "<td>".$user['age']."</td>";
			print "<td>".$user['weight']."</td>";
			print "<td>".$user['height']."</td>";
          
				
            print "</tr>";
        }
      }
	  ?>
	
      </tr>
    </table>
		   		 
<br>
<hr>
   
    <table width="500" height="39" border="1" cellpadding="1" cellspacing="1" align="center">
	<tr><td colspan="3" align="center" >Exercise days and hours</td></tr>
      <tr>
        <th width="300">Date</th>
        <th width="200">Hours</th>
        <th width="200">Gym</th>
       
       
      </tr>
      <tr>
    
		  
	  <?php
	  
      $sql="SELECT days,hours,name FROM exercises user, gym s where user.userid='$id' and user.gymid=s.id";
	  //echo $sql;
      $record=mysqli_query($connection,$sql);
      if($record)
      {
        while($user=mysqli_fetch_assoc($record))
        {
            print "<tr>";
           
            print "<td>".$user['days']."</td>";
            print "<td>".$user['hours']."</td>";
            print "<td>".$user['name']."</td>";
				
            print "</tr>";
        }
      }
	  ?>
	
      </tr>
    </table>
	  <?php
		   }
	 }
	  }
	  ?>
  </div>
</div>
</div>

</body>
</html>
