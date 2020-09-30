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
$Stcode=$_POST['state'];				
$User=$_POST['User'];
$Pass=$_POST['Pass'];
				

			$sql="UPDATE `pstation` SET `PSName`='$FName', `CName`='$CName',`address`='$add', `phone`='$phone', `Username`='$User', `Password`='$Pass', `email`='$email', `Stcode`='$Stcode', `login`='$login' WHERE `Id`='$id'";

			$res=mysql_query($sql) or die (mysql_error());
			if($res)
			{
	 			echo"
<script>
window.alert('Data Updated succesfully');
window.location.href='view_ps.php?id=0';
</script>
";
$_SESSION['Error']="Data Updated succesfully";
			}

	else{
					$_SESSION['Error']="Data adding error";
					header("Location:view_ps.php?id=0");
			
		 }
?>