<?php
session_start();
require_once("config.php");
$UserName = $_POST['Username'];
$Password = $_POST['Password'];

$flagPass=0;
$flagUser=0;
$_SESSION['SalesId']="";

$qry=mysql_num_rows(mysql_query("SELECT * FROM `pstation` WHERE `username`='$UserName' AND `password`='$Password'"));

if($qry>0)
{
$data=mysql_fetch_array(mysql_query("SELECT * FROM `pstation` WHERE `username`='$UserName' AND `password`='$Password'"));

	$_SESSION['ID']="";
	$_SESSION['StaffMessage']="";
	$_SESSION['StudMessage']="";
	$_SESSION['msgImport']="";
	$_SESSION['SalesId']=$data['Id'];
	$_SESSION['UserName']=$UserName;
	$_SESSION['Error']="";
	$_SESSION['base_url']=((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https' : 'http');
	$_SESSION['base_url'] .= "://".$_SERVER['HTTP_HOST'];
	$_SESSION['base_url'] .= "/werps/police_station";
	header("Location:home.php");
}
else
{
	$_SESSION['Error']="Invalid UserName or Password";
header("Location:ErrorPage.php");
}


?>