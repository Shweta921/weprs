<?php
session_start();
require_once("../config.php");

if(!isset($_SESSION['UserName']))
{
header("Location:../index.php");
}
else
{
	$login=$name=$_SESSION['UserName'];
}

$id=$_POST['id'];
$FName=$_POST['FName'];
$CName=$_POST['CName'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$add=$_POST['address'];
$user=$_POST['user'];
$password=$_POST['password'];
$Stcode=$_POST['state'];
				

			$sql="UPDATE `spoffice` SET `FName`='$FName', `CName`='$CName',`address`='$add', `phone`='$phone',`email`='$email', `username`='$user', `password`='$password',`Stcode`='$Stcode', `login`='$login' WHERE `Id`='$id'";

			$res=mysql_query($sql) or die (mysql_error());
			if($res)
			{
	 			echo"
<script>
window.alert('Data Updated succesfully');
window.location.href='view_dist.php?id=0';
</script>
";
$_SESSION['Error']="Data added succesfully";
			}

	else{
					$_SESSION['Error']="Data adding error";
					header("Location:view_dist.php?id=0");
			
		 }
?>