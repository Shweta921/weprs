<?php
session_start();
require_once("../config.php");

if ($id=$_GET['link'])
{
$qry="DELETE FROM `inwardtemp2` WHERE `Id`='$id'";
$result=mysql_query($qry);
if(!$result)
{
$_SESSION['Error']=mysql_error();
header("location:edit_inward.php?id=1");
}
else
{
$_SESSION['Error']="Record deleted successfully";
header("location:edit_inward.php?id=1");
}
}
?>