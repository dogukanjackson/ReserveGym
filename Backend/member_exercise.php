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
  	include("header1.php");	
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
		  
		   $kullaniciid=$_SESSION['userid'];
        }
		else
		{
			$kullaniciid=$_SESSION['userid'];
			
			
			
		}

		   ?>
  
  <div id="apDiv15">
    <form action="admin_exercise.php" method="post" enctype="multipart/form-data" name="frmyonetici">
      <table width="595" border="1">
        <tr>
          <td width="126" height="43"><div align="right"><strong>User Name</strong></div></td>
         
          <td width="203" colspan="2">
		
          <?php 
			include("../database_con.php");
			
			$result= $connection-> query("select id,fullname from user where id=$kullaniciid ");	
			while($row = $result -> fetch_array(MYSQLI_ASSOC))
			{			
               print $row['fullname'];
               
			}
					
			?>
		  
		  
		  </select>
		  
		  </td>
		  
		  
		 
        </tr>
        <tr>
		<td>Gym Name</td>
		<td>Day</td>
		<td>Active hours</td>
		
		</tr>
      <?php
      
	 
  
      $sql=" SELECT name, days,hours FROM exercises e, gym g where e.gymid=g.id and e.userid=$kullaniciid order by name, days,hours ";
	  
      $records=mysqli_query($connection,$sql);
      if($records)
      {
		  $i=0;
		  
        while($record=mysqli_fetch_assoc($records))
        {
            print "<tr>";
            print "<td>".$record['name']."</td>";
            print "<td>".$record['days']."</td>";
            print "<td><input type='text' name='saatler' class='saatler' readonly='true' id='saatler' value='".$record['hours']."'</td>";          
					
            print "</tr>";
			
			$i=$i +1;
        }
      }
      ?>
      
		
        
        <tr>
          <td height="39" colspan="4"><div align="center">
            
			<input type="hidden" name="hgunler" id="hgunler" value=" <?php print $dizi;  ?>" >
			<input type="hidden" name="sgunler" id="sgunler">
			<input type="hidden" name="ssaatler" id="ssaatler">
			<input type="hidden" name="indisler" id="indisler">
			<input type="hidden" name="salonid" id="salonid">
			<input type="hidden" name="uyeid" id="uyeid">
            
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
