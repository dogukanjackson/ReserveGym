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
<link rel="stylesheet" href="Style/profile_css.css"/>
<style type="text/css">
#apDiv14 {
	position: absolute;
	width: 146px;
	height: 32px;
	z-index: 6;
	left: 949px;
	top: 85px;
	font-family: courier, monospace;
	text-align: center;
	color: white;
	font-size: 20px;
}
#apDiv15 {
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 7;
	left: 41px;
	top: 409px;
}
#apDiv16 {
	position: absolute;
	width: 672px;
	height: 182px;
	z-index: 1;
	left: 147px;
	top: 227px;
	background: #FFF;
	background: linear-gradient(#FFF,#999);
	border-radius: 100px;
	border: 1px solid #F00;
}
#apDiv17 {
	position: absolute;
	width: 165px;
	height: 176px;
	z-index: 2;
	left: 16px;
	top: 231px;
	background-image: url(aimage/di.jpg);
	border-radius: 100px;
}
#apDiv20 {
	position: absolute;
	width: 165px;
	height: 156px;
	z-index: 9;
	left: 919px;
	top: 449px;
	background-image: url(aimage/adnan.jpg);
	border-radius: 100px;
}
#apDiv21 {
	position: absolute;
	width: 645px;
	height: 165px;
	z-index: 8;
	left: 445px;
	top: 445px;
	background: #FFF;
	background: linear-gradient(#FFF,#999);
	border-radius: 100px;
	border: 1px solid #F00;
}
#apDiv18 {
	position: absolute;
	width: 461px;
	height: 162px;
	z-index: 2;
	left: 87px;
	top: 12px;
}
#apDiv1 #apDiv16 #apDiv18 table tr td div {
	font-size: 20px;
	font-family: "Comic Sans MS", cursive;
}
#apDiv19 {
	position: absolute;
	width: 448px;
	height: 154px;
	z-index: 1;
	left: 18px;
	top: 6px;
}
#apDiv1 #apDiv21 #apDiv19 table tr td div {
	font-family: "Comic Sans MS", cursive;
	font-size: 20px;
}
</style>
<script src="profile_script.js"></script>
</head>
<body vlink="#ffffff" onLoad="startTime()">
 <?php
  	include("header.php");	
	?>
  
  <div id="apDiv12">
    <div align="center"><a href="Logout.php">Sign out</a></div>
  </div>
  <div id="apDiv14"><script>
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
    <div id="apDiv18">
      <?php
      include("../database_con.php");
	  
	 if ($_SERVER["REQUEST_METHOD"] == "GET") {
     if(isset($_GET['islem']))
	 {		 
		 $islem = $_GET['islem']; 
		   $id = $_GET['id']; 
		   if($islem=="user")
		   {
		   
		   if($id!="")
		   {
		   ?>
		   
		   <form action="profil.php" method="post" enctype="multipart/form-data" name="yonetici">
		    <table width="500" height="39" border="1" cellpadding="1" cellspacing="1">
	  <tr><td colspan="6" align="center">user information</td></tr>
      <tr>
	    <th width="100"></th>
        <th width="300">name surname</th>
        <th width="200">phone number</th>
		<th width="200">age</th>
		<th width="200">weight</th>
		<th width="200">height</th>
       
       
       
      </tr>
      
    
		 
	  <?php
	  
      $sql="SELECT * FROM user where id=$id";
	  //echo $sql;
      $records=mysqli_query($connection,$sql);
      if($records)
      {
        while($record=mysqli_fetch_assoc($records))
        {
            print "<tr>";
            print "<td><input type='submit' name='button' id='button' value='Update'></td>";
            print "<td><input type='text' name='adsoyad' size='12' value='".$record['fullname']."'</td>";
            print "<td><input type='text' name='telefon' size='8'  value='".$record['phonenumber']."'</td>";
			print "<td><input type='text' name='yas' size='2' value='".$record['age']."'</td>";
			print "<td><input type='text' name='kilo' size='2' value='".$record['weight']."'</td>";
			print "<td><input type='text' name='boy' size='2' value='".$record['height']."'</td>";
          
				
            print "</tr>";
        }
      }
	  ?>
	 <input type="hidden" name="islem" id="islem" value="<?php print $islem; ?>">
	 <input type="hidden" name="id" id="id" value="<?php print $id; ?>">
    </table>
		  </form> 		 
<br>
<hr>
   
    
	  <?php
		   }//id
		   
		   } //islem
		   if($islem=="password")
		   {
			   ?>
		   <form action="profil.php" method="post" enctype="multipart/form-data" name="yonetici">
		    <table width="400" height="39" border="1" cellpadding="5" cellspacing="5">
	         <tr><td colspan="6" align="center">change password</td></tr>
              <tr>
	         <td width="100">New Password:</td><td><input type="text" name="sifre" size="12"></td><td><input type="submit" value="Update"></td></tr>
		
		    </table>
		<input type="hidden" name="islem" id="islem" value="<?php print $islem; ?>">
	    <input type="hidden" name="id" id="id" value="<?php print $id; ?>">
		</form>
		
		<?php
			   
		   }
		   
	 }
	  }
	   
	  
	  if ($_SERVER["REQUEST_METHOD"] == "POST") 
	  {
     if(isset($_POST['islem']))
	 {		 
		 $islem = $_POST['islem']; 
		 $id = $_POST['id']; 
		  
		   if($islem=="user")
		   {
      $adsoyad = $_POST['adsoyad']; 
	  $telefon = $_POST['telefon']; 
	  $yas = $_POST['yas']; 
	  $boy = $_POST['boy']; 
	  $kilo = $_POST['kilo']; 
    
      $sql="update user set fullname='$adsoyad',phonenumber='$telefon',age='$yas',weight='$kilo' ,height='$boy' where username='$id'";
	 
      $record=mysqli_query($connection,$sql);
      ?>
   <form action="profil.php" method="post" enctype="multipart/form-data" name="yonetici">
		    <table width="500" height="39" border="1" cellpadding="1" cellspacing="1">
	  <tr><td colspan="6" align="center">user information</td></tr>
      <tr>
	    <th width="100"></th>
        <th width="300">name surname</th>
        <th width="200">phone number</th>
		<th width="200">age</th>
		<th width="200">weight</th>
		<th width="200">height</th>
       
       
       
      </tr>
      
    
		 
	  <?php
	  
      $sql="SELECT * FROM user where username='$id'";
	  //echo $sql;
      $records=mysqli_query($connection,$sql);
      if($records)
      {
        while($record=mysqli_fetch_assoc($records))
        {
            print "<tr>";
            print "<td><input type='submit' name='button' id='button' value='Update'></td>";
            print "<td><input type='text' name='adsoyad' size='12' value='".$record['fullname']."'</td>";
            print "<td><input type='text' name='telefon' size='8'  value='".$record['phonenumber']."'</td>";
			print "<td><input type='text' name='yas' size='2' value='".$record['age']."'</td>";
			print "<td><input type='text' name='kilo' size='2' value='".$record['weight']."'</td>";
			print "<td><input type='text' name='boy' size='2' value='".$record['height']."'</td>";
          
				
            print "</tr>";
        }
      }
	  ?>
	 <input type="hidden" name="islem" id="islem" value="<?php print $islem; ?>">
	 <input type="hidden" name="id" id="id" value="<?php print $id; ?>">
    </table>
		  </form> 
    
	<?php
		   }//uye

	 if($islem=="password")
		   {
      $sifre = $_POST['sifre']; 	  
    
      $sql="update user set password='$sifre' where username='$id'";
	 
      $record=mysqli_query($connection,$sql);
   print "password updated!";

		   }//şifre	  
	 
	 }
	  }
	  ?>
	  
	  
	  
	  
	  
    </div>
  </div>
 
    
  </div>
</div>

</body>
</html>
