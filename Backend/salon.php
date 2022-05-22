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

#apDiv17 {
	position: absolute;
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

function Kaydet(id,eid) {
	var ix=id;
	var textValue = document.getElementsByClassName('hours')[ix].value;
	console.log(textValue);
	document.getElementById('secid').value= eid;
	document.getElementById('sechour').value= textValue;
	document.frmdays.submit();
}

function KaydetG(i,id) {
	//var ix=i-1;
	var adi = document.getElementsByClassName('adi')[i].value;
	var adres = document.getElementsByClassName('adres')[i].value;
	var kapasite = document.getElementsByClassName('kapasite')[i].value;
	
	
	document.getElementById('sid').value= id;
	document.getElementById('sadi').value= adi;
	document.getElementById('sadres').value= adres;
	document.getElementById('skapasite').value= kapasite;
	document.getElementById('islem1').value= "Güncelle";	
	document.frmsalon.submit();
}

function KaydetY(i) {
	//var ix=i-1;
	var adi = document.getElementsByClassName('adi')[i].value;
	var adres = document.getElementsByClassName('adres')[i].value;
	var kapasite = document.getElementsByClassName('kapasite')[i].value;
	
	
	document.getElementById('sid').value= -1;
	document.getElementById('sadi').value= adi;
	document.getElementById('sadres').value= adres;
	document.getElementById('skapasite').value= kapasite;
	document.getElementById('islem1').value= "Yeni";	
	document.frmsalon.submit();
}


</script>

  </div>
  
   <?php
  	include("../database_con.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$address=$_POST['sadres'];
	$name=$_POST['sadi'];
    $capacity=$_POST['skapasite'];
	$islem=$_POST['islem1'];
	$formname=$_POST['formname'];
	
	
	if(($islem=="Güncelle") && ($formname=="frmsalon"))
	{
		$sid=$_POST['sid'];
		 $qry=mysqli_query($connection,"update gym set name='$name', address='$address',capacity='$capacity' where id=$sid ");
        if($qry)
	    {
		  print "<h2><strong>Gym information updated!</strong></h2>";
	    }
	   	
		
	}
	
	if(($islem=="Yeni") && ($formname=="frmsalon"))
	{
		$days= array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
		$qry=mysqli_query($connection,"insert into gym(name,address,capacity) values('$name','$address',$capacity) ");
        
		  print "<h2><strong>New gym properties added!</strong></h2>";
		  $qry=mysqli_query($connection,"select max(id) maxid from gym");
		  $recgym=mysqli_fetch_assoc($qry);
		  for ($x = 0; $x <= 6; $x++) {

             $qry1=mysqli_query($connection,"insert into days(gymid,days) values($recgym[maxid],'$days[$x]')");
          }
		  
		  
	    
	   	
		
	}
	
	}
	
	
	
	if (strlen($address)<5)
	{
		 $result= $connection-> query("select * from gym ");
	$row = $result -> fetch_array(MYSQLI_ASSOC);
	$adres= $row['address'];
	$capacity= $row['capacity'];
	}
    else{
	
        $qry=mysqli_query($connection,"update gym set address='$address',capacity='$capacity' ");
        if($qry)
	    {
		  print "<h2><strong>Gym information updated...</strong></h2>";
	    }
	    else
	    {
		  print mysql_error();
	    }
	
	}
  ?>
  
  
  <div id="apDiv15">
    <form action="salon.php" method="post" enctype="multipart/form-data" name="frmsalon">
      <table  border="1" cellpadding="5">
        <tr>
		  <td width="50" height="43"><div align="left"><strong>Operation</strong></div></td>
		  <td width="100" height="43"><div align="left"><strong>Name of Gym</strong></div></td>
          <td width="176" height="43"><div align="left"><strong>Address</strong></div></td>
		  <td height="20"><div align="left"><strong>Capacity</strong></div></td>
          
          
        </tr>
		 <?php
  
	
		  $result=mysqli_query($connection,"select * from gym ");
		  $i=0;
	      while($row = mysqli_fetch_assoc($result))
		  {
	
	     ?>
		
		
        <tr>
		  <td width="50" height="43"><strong><input type="button" value="Güncelle/Seç" onClick="KaydetG(<?php echo $i; ?>, <?php echo $row['id']; ?>);"></td>
		  <td><label for="adi"></label><input type="text" name="adi" id="adi" class="adi" size="20" required value="<?php echo $row['name']; ?>"></td>
          <td><label for="adres"></label><textarea  name="adres" id="adres" class="adres" rows="2" cols="25" ><?php echo $row['address']; ?></textarea> </td>
          <td><label for="kapasite"></label><input type="text" name="kapasite" class="kapasite" size="5" id="kapasite" value="<?php echo $row['capacity']; ?>"></td>
        </tr>
       
	   <?php
	    $i=$i+1;
		  }
	   ?>
	    <tr>
		  <td width="50" height="43"><strong><input type="button" value="Save" onClick="KaydetY(<?php echo $i; ?>);"></strong></td>
		  <td><label for="adi"></label><input type="text" name="adi" id="adi" class="adi" size="20" required value=""></td>
          <td><label for="adres"></label><textarea  name="adres" id="adres" class="adres" rows="2" cols="25"></textarea></td>
          <td><label for="kapasite"></label><input type="text" name="kapasite" class="kapasite" size="5" id="kapasite" value=""></td>
        </tr>
		 
      </table>
	  
	  <input type="hidden" id="sadi" name="sadi">
	  <input type="hidden" id="sadres" name="sadres">
	  <input type="hidden" id="skapasite" name="skapasite">
	  <input type="hidden" id="sid" name="sid">
	  <input type="hidden" id="islem1" name="islem1">
	  <input type="hidden" name="formname" id="formname" value="frmsalon" >
    </form>
  </div>
  
  
  
   <div id="apDiv17">
   <form id="frmdays" name="frmdays" method="post" enctype="multipart/form-data" action="salon.php">
    <table width="300" height="39" border="1" cellpadding="1" cellspacing="1" align="center">
	<tr><td colspan="3" align="center">Exercise Hours</td></tr>
      <tr>
        <th width="100">Day</th>
        <th width="120">Hours</th>
       
       
        <th width="80"  bgcolor="#CCCCCC">Update</th>
      </tr>
      <tr>
      <?php
	  if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  //if(($islem=="Yeni"))
	{
      include("../database_con.php");
	  $sid=$_POST['sid'];
      $sql="SELECT * FROM days where gymid=$sid";
	  
	  if($formname=="frmdays")
	{
		 $sechour=$_POST['sechour'];
		 $secid=$_POST['secid'];
		
		$q=mysqli_query($connection,"update days set hours='$sechour' where id='$secid' ");	
		
		//echo "update days set hours='$sechour' where id='$secid' ";
	}
	  
      $records=mysqli_query($connection,$sql);
	  $j=0;
      if($records)
      {
        while($record=mysqli_fetch_assoc($records))
        {
            print "<tr>";
           
            print "<td>".$record['days']."</td>";
            print "<td><input type='text' name='hours' class='hours' id='hours' value='".$record['hours']."'></td>";
          
			$did=$record['id'];
			print "<td align='center'>";
			 print "<input type='submit' onclick=\"Kaydet(".$j.",".$record['id'].");\" value='Kaydet'>";
			print "</td>";		
            print "</tr>";
			$j=$j+1;;
        }
      }
	}
	
	
	
	  }
      ?>
      </tr>
    </table>
	 <input type="hidden" name="secid" id="secid">
	 <input type="hidden" name="sechour" id="sechour" >
	 <input type="hidden" name="salonid" id="salonid" value="<?php echo $sid; ?>" >
	 <input type="hidden" name="sid" id="salonid" value="<?php echo $sid; ?>" >
	 <input type="hidden" name="formname" id="formname" value="frmdays" >
	</form>
  </div>
</div>
  
  
  
  <div id="apDiv16">
  <body>
      <div style = "position:relative; left:175px; top:-25px; background-color:NULL;">
      <strong><h2>Gym Properties</h2>
      </div>
   </body>
</div>

</body>
</html>
