

<?php
session_start();
require_once("../config.php");
if(!isset($_SESSION['UserName']))
{
header("Location:../index.php");
}
$_SESSION['DistId']=$id=$_POST['id'];

	$HTML="<input type='hidden' name='DistId' value='$id' class='form-control'>";
	echo $HTML;
?>
		
      