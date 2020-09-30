<?php
session_start();
require_once("../config.php");

if ($id=$_GET['link'])
{
$qry="UPDATE `vendor` SET `status`='1' WHERE `Id`='$id'";
$result=mysql_query($qry);
if(!$result)
{
$_SESSION['Error']=mysql_error();
header("location:view_vendor.php?id=0");
}
else
{
$_SESSION['Error']="Record deleted successfully";
header("location:create_vendor.php?id=0");
}
}
?>