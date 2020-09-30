<?php
session_start();
require_once("config.php");
$UserName = $_POST['Username'];
$Password = $_POST['Password'];
$flagPass=0;
$flagUser=0;
if($UserName!="" AND $Password!="")
{
$qry="SELECT * FROM `accounts`";
$result=mysql_query($qry);
while($data=mysql_fetch_row($result))
{
	$sr=$data[0];
	if($data[1]==$UserName)
	{
		$flagUser=1;
		if($data[2]==$Password)
		{
			$flagPass=1;
			$_SESSION['Login']=$data[3]." ".$data[4];
		}
		else
		{
			
		}
	}
	else
	{
		
	}
}
if($flagUser==1 AND $flagPass==1)
{
	$_SESSION['ID']=$sr;
	$_SESSION['StaffMessage']="";
	$_SESSION['StudMessage']="";
	$_SESSION['msgImport']="";
	$_SESSION['UserName']=$UserName;
	$_SESSION['Error']="";
	$_SESSION['base_url']=((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https' : 'http');
	$_SESSION['base_url'] .= "://".$_SERVER['HTTP_HOST'];
	$_SESSION['base_url'] .= "/werps/dg_office";
	header("Location:home.php");
}
else if($flagUser==0)
{
	$_SESSION['value']="Invalid UserName";
	header("Location:ErrorPage.php");
}
else if($flagPass==0)
{
	$_SESSION['value']="Invalid Password";
	header("Location:ErrorPage.php");
}

}
else
{
	header("index.php");
}

?>