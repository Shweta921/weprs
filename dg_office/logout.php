<?php
session_start();
require_once("config.php");

if(!isset($_SESSION['UserName']))
{
header("Location:index.php");
}
session_unset();
$_SESSION['msg']="Logged out successfully";
header("Location:index.php");
?>