<?php
session_start();
require_once("../config.php");

if ($id=$_GET['link'])
{
$qry="DELETE FROM `inwardtemp` WHERE `Id`='$id'";
$result=mysql_query($qry);
if(!$result)
{
$_SESSION['Error']=mysql_error();
header("location:inward.php?id=1");
}
else
{
$_SESSION['Error']="Record deleted successfully";
header("location:inward.php?id=1");
}
}
?>