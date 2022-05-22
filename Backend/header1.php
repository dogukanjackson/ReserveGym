<div id="apDiv1">
  <div id="apDiv2">
    <div id="apDiv3">
      <div align="left">Reservation System For Gyms</div>
    </div>
    <div id="apDiv4"></div>
  </div>
  <div id="apDiv5">
    <table width="1095" height="59" border="0">
      <tr>
        <td width="177"><div id="ap5" style="text-align:justify;"><a href="Admin.php">Home Page</a></div></td>
        <td width="168" onMouseOver="show_course()" onMouseOut="hide_course()"><div align="left"><a href="#">Exercise</a></div></td> 	
        
         
        <td width="161"onMouseOver="show3()" onMouseOut="hide3()"><div style="text-align:justify;"><a href="#">Membership</a></div></td>
      </tr>
    </table>
  </div>
  <div id="apDiv8" onMouseOver="show_course()" onMouseOut="hide_course()">
     <table width="165" height="34" border="0">
      <tr>
        <td height="32"><div align="left"><a href="member_exercise.php">Exercise History</a></div></td>
      </tr>
    </table>
  </div>
  
  
  
  
  
  <div id="apDiv13" onMouseOver="show3()" onMouseOut="hide3()">
  <table width="156" height="71" border="0">
    <tr>
      <td width="131" height="31"><div align="left"><a href="profil.php?islem=user&id=<?php  print $_SESSION['id']; ?>">user information</a></div></td>
    </tr>
    <tr>
      <td width="131" height="34">
	  
	  
      <div align="left"><a href="profil.php?islem=password&id=<?php  print $_SESSION['id']; ?>">change password</a></div></td>
    </tr>
  </table>
</div>
  