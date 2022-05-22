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
        <td width="168" onMouseOver="show_course()" onMouseOut="hide_course()"><div align="left"><a href="#">user administration</a></div></td> 	
        
          <td width="204"onMouseOver="show2()" onMouseOut="hide2()"><div align="left"><a href="#">gym administration</a></div></td>
        <td width="161"onMouseOver="show3()" onMouseOut="hide3()"><div style="text-align:justify;"><a href="#">membership</a></div></td>
      </tr>
    </table>
  </div>
  <div id="apDiv8" onMouseOver="show_course()" onMouseOut="hide_course()">
    <table width="220" height="70" border="0">
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="left"><a href="yonetici.php">New User</a></div></td>
      </tr>
       <tr>
        <td><div align="left"><a href="yonetici_mod.php">Update user</a></div></td>
      </tr>
    </table>
  </div>
  
  <div id="apDiv10" onMouseOver="show1()" onMouseOut="hide1()">
    <table width="165" height="34" border="0">
      <tr>
        <td><div align="left"><a href="report.php">user Report</a></div></td>
      </tr>
    </table>
  </div>
  <div id="apDiv11" onMouseOver="show2()" onMouseOut="hide2()">
    <table width="181" border="0">
      <tr>
        <td height="32"><div align="left"><a href="salon.php">Add gym</a></div></td>
      </tr>
      <tr>
        <td height="32"><div align="left"><a href="admin_exercise.php">exercise history</a></div></td>
      </tr>
      
    </table>
  </div>
  
  
  
  <div id="apDiv13" onMouseOver="show3()" onMouseOut
="hide3()">
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
  