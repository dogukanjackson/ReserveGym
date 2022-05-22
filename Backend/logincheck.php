<?php
include("../database_con.php");
$uid=$_POST['uname'];
$pass=$_POST['pass'];
$qry=mysqli_query($connection,"select * from user");
$flag=0;
$role="User";
echo $uid.$pass;
session_start();

while($row=mysqli_fetch_array($qry))
{
	echo "1";
	
	if($uid==$row['username'] && $pass==$row['password'])
	{
		$_SESSION['id']=$row['id'];
		$flag=1;
	
		if($row['role']=="Admin")
			$role="Admin";
		else
			$role="Uye";
			echo $role;
		break;
	}
}


if($flag==1)
{
	
	echo "2";
	
	if($role=="Admin")
	  header("Location:Admin.php");
  else
	  header("Location:Uye.php");
  
}
else
{
	echo "3";
	header("Location:Login.html");
}


mysqli_free_result($qry);
?>