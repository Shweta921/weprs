<?php
session_start();
require_once("../config.php");

if ($id=$_GET['link'])
{
$qry="DELETE FROM `purchase` WHERE `challan`='$id'";
$result=mysql_query($qry);
if(!$result)
{
$_SESSION['Error']=mysql_error();
header("location:view_inward.php?id=0");
}
else
{
$_SESSION['Error']="Record deleted successfully";
header("location:view_inward.php?id=0");
}
}
?>