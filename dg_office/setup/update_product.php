<?php
session_start();
require_once("../config.php");
if(!isset($_SESSION['UserName']))
{
header("Location:../index.php");
}
       
$login=$_SESSION['UserName'];

$id=$_SESSION['PCode'];
$PName=$_POST['PName'];
$Category=$_POST['Category'];
$PRate=$_POST['PRate'];
$GST=$_POST['GST'];
$HSN=$_POST['HSN'];



$sql="update `product` SET `PName`='$PName', `Category`='$Category', `PRate`='$PRate', `GST`='$GST', `HSN`='$HSN',`login`='$login' WHERE `PCode`='$id'";
			$res=mysql_query($sql) or die (mysql_error());
		
		$sql2="update `stock` SET `PName`='$PName', `Category`='$Category', `login`='$login'  WHERE `PCode`='$id'";
			$res2=mysql_query($sql2) or die (mysql_error());
			
			$_SESSION['PCode']="";
			$_SESSION['Error']="Data updated succesfully";
					header("Location:view_product.php");

?>	