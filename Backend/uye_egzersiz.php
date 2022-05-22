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

function SalonDegistir()
{
	
	var salon=document.getElementById("salonlist").value;
	document.getElementById("salonid").value= salon;
	document.frmyonetici.submit();
	
}

function UyeDegistir()
{
	
	var uye=document.getElementById("uyelist").value;
	document.getElementById("uyeid").value= uye;
	
	
}


function Kaydet() {
	let gunler="";
	let saatler="";
	let indisler="";
	for (let i = 0; i < 7; i++) {
       if(document.getElementsByClassName('seceg')[i].checked)
	   {
		   if(gunler.length==0)
		   {
			   gunler=i;
		       saatler=document.getElementsByClassName('saatler')[i].value;
			   indisler=i;
		   }
		   else
		   {
		       gunler=gunler+","+i;
			   saatler=saatler+","+document.getElementsByClassName('saatler')[i].value;
			   indisler=indisler+","+i;
			   
		   }
		   
	   }
	   
    }
	var salon=document.getElementById("salonlist").value;
	document.getElementById("salonid").value= salon;
	var uye=document.getElementById("uyelist").value;
	document.getElementById("uyeid").value= uye;
	
	document.getElementById('sgunler').value= gunler;
	document.getElementById('ssaatler').value= saatler;
	document.getElementById('indisler').value= indisler;
	document.frmegunler.submit();
}


</script>

  </div>
  
 <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
		   $hgunler = $_POST['hgunler']; 
		   $sgunler = $_POST['sgunler']; 
		   //$seckul = $_POST['seckul']; 
		   $saatler = $_POST['ssaatler']; 
		   $indisler = $_POST['indisler']; 
		   $salonid=$_POST['salonid'];
		  
		   $kullaniciid=$_POST['uyeid'];
        }
		   ?>
  
  <div id="apDiv15">
    <form action="uye_egzersiz.php" method="post" enctype="multipart/form-data" name="frmyonetici">
      <table width="595" border="1">
        <tr>
          <td width="126" height="43"><div align="right"><strong>choose user</strong></div></td>
         
          <td width="203"><label for="kullaniciadi"></label>
		  <select id="uyelist" name="uyelist" onchange="UyeDegistir()">
          <?php 
			include("../database_con.php");
			$did=$_GET['id'];
						
			$result= $connection-> query("select id,fullname from user where role='User' order by fullname ");
			
			print "<option value='-1'>Choose</option>";
			while($row = $result -> fetch_array(MYSQLI_ASSOC))
			{			
                if($kullaniciid==$row['id'])
					print "<option selected=\"selected\" value='".$row['id']."'>".$row['fullname']."  </option>";
                else					
				print "<option value='".$row['id']."'>".$row['fullname']."</option>";
			}
					
			?>
		  
		  
		  </select>
		  
		  </td>
		  
		  
		  <td width="186" height="43"><strong>Choose Gym</strong>
         
          <label for="kullaniciadi"></label>
		  <select id="salonlist" name="salonlist" onchange="SalonDegistir()">
          <?php 
			include("../database_con.php");
			$did=$_GET['id'];
			
			
			$result= $connection-> query("select id,name from gym order by name ");
			
			print "<option value='-1'>Choose</option>";
			while($row = $result -> fetch_array(MYSQLI_ASSOC))
			{				
				  if($salonid==$row['id'])
					print "<option selected=\"selected\" value='".$row['id']."'>".$row['name']."  </option>";
                else					
				print "<option value='".$row['id']."'>".$row['name']."</option>";
			}
					
			?>
		  
		  
		  </select>
		  
		  </td>
        </tr>
        <tr>
		<td>Day</td>
		<td>Active hours</td>
		<td>Exercise planned</td>
		</tr>
      <?php
      
	  if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  
		 
		  $dhgunler = explode(',', $hgunler);
		  $dsgunler = explode(',', $sgunler);
		  $dsaatler = explode(',', $saatler);
		  $dindisler = explode(',', $indisler);
		  
		  
		  $i=0;
		  $now = new DateTime();
		  
		  if(strlen($sgunler)>0)
		  {
		  foreach ($dsgunler as $value) {
             if($kullaniciid>0)
			 {
			  $result= $connection-> query("insert into exercises(days,userid,hours,gymid) VALUES('$dhgunler[$value]','$kullaniciid',now(),$salonid) ");
			 
			 }
			  $i=$i+1;
          }
		  }
		  
		  
		  
		 
		//echo "SELECT count(*) sayi FROM exercises where TO_SECONDS(now())-TO_SECONDS(hours)<3600 and gymid=$salonid";
		$record=mysqli_query($connection,"SELECT count(*) sayi FROM exercises where TO_SECONDS(now())-TO_SECONDS(hours)<3600 and gymid=$salonid");
	    while($row = mysqli_fetch_assoc($record))
	    {$salonkisisay= $row['sayi'];}
		
		
	    $record=mysqli_query($connection,"SELECT name,capacity FROM gym where id=$salonid");
	    while($row = mysqli_fetch_assoc($record))
		{
		  $salonkapasite= $row['capacity'];
		  $salonadi= $row['name'];
		}
		
		print "<p>Sport Center: ".$salonadi." Capacity:".$salonkapasite." Number of people in the gym at selected time is:".$salonkisisay."</p>";
	   
		
		
		
		  
		  
	  }
	  else
	  {
		  $dsaatler = explode(',', "a,b");
		  $dindisler = explode(',', "a,b");
		  
	  }
	  
	  
	   $dizi = array('','','','','','','');
	  $bu_haftanin_ilk_gunu = date("d-m-Y",strtotime('monday this week'));
	  $dizi= $bu_haftanin_ilk_gunu;
	  
	  $time_original = strtotime($bu_haftanin_ilk_gunu);
	  for ($i = 1; $i <= 6; $i+=1) {
		  $time_add      = $time_original + (3600*24)*$i; //add seconds of one day
          $new_date      = date("d-m-Y", $time_add);
		
         $dizi= $dizi.",".$new_date;
      }
	  
	  
	  if ( !isset($_POST['salonid'])) 
	  $salonid=-1;
  
      $sql="SELECT * FROM days where gymid=".$salonid;
	  
      $records=mysqli_query($connection,$sql);
      if($records)
      {
		  $i=0;
		  
        while($record=mysqli_fetch_assoc($records))
        {
            print "<tr>";
           
            print "<td>".$record['days']."</td>";
            print "<td><input type='text' name='saatler' class='saatler' readonly='true' id='saatler' value='".$record['hours']."'</td>";
          
			$did=$record['id'];
			print "<td align='center'>";
			
			if (in_array($i, $dindisler)) 			
			 print "<input type='checkbox' class='seceg' checked>";
		    else
			 print "<input type='checkbox' class='seceg'>";
		 
			print "</td>";		
            print "</tr>";
			
			$i=$i +1;
        }
      }
      ?>
      
		
        
        <tr>
          <td height="39" colspan="4"><div align="center">
            <input type="submit" name="button" id="button" value="Save" onClick="Kaydet()" >
			<input type="hidden" name="hgunler" id="hgunler" value=" <?php print $dizi;  ?>" >
			<input type="hidden" name="sgunler" id="sgunler">
			<input type="hidden" name="ssaatler" id="ssaatler">
			<input type="hidden" name="indisler" id="indisler">
			<input type="hidden" name="salonid" id="salonid">
			<input type="hidden" name="uyeid" id="uyeid">
            <input type="reset" name="button" id="button" value="Cancel">
          </div></td>
          
        </tr>
      </table>
    </form>
  </div>
  <div id="apDiv16">
  <body>
      <div style = "position:relative; left:175px; top:2px; background-color:NULL;">
         <strong>DEFINE EXERCISE</strong>
      </div>
   </body>
  </div>
</div>

</body>
</html>
