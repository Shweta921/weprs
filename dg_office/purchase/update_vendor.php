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
$GSTIN=$_POST['GSTIN'];
$add=$_POST['address'];
$Stcode=$_POST['state'];
				

			$sql="UPDATE `vendor` SET `FName`='$FName', `CName`='$CName',`address`='$add', `phone`='$phone', `gstin`='$GSTIN', `email`='$email', `Stcode`='$Stcode', `login`='$login' WHERE `Id`='$id'";

			$res=mysql_query($sql) or die (mysql_error());
			if($res)
			{
	 			echo"
<script>
window.alert('Data Updated succesfully');
window.location.href='create_vendor.php?id=0';
</script>
";
$_SESSION['Error']="Data added succesfully";
			}

	else{
					$_SESSION['Error']="Data adding error";
					header("Location:create_vendor.php?id=0");
			
		 }
?>