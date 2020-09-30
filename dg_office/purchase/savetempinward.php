<?php
session_start();
require_once("../config.php");
if(!isset($_SESSION['UserName']))
{
header("Location:../index.php");
}
	
$name=$login=$_SESSION['UserName'];
        
$challan=$_POST['challan'];

if($_SESSION['date']=="")
{
$_SESSION['date']=$ADate=$_POST['pdate'];

}
else{
$ADate=	$_SESSION['date'];

	}
	
if($_SESSION['vendor']=="")
{
$_SESSION['vendor']=$vendor=$_POST['vendor'];

}
else{
$vendor=$_SESSION['vendor'];

	}
if($_SESSION['challan']=="")
{
$_SESSION['challan']=$challan=$_POST['challan'];
}
else{
$challan=$_SESSION['challan'];

	}

	

$PCode=$_POST['PCode'];
$qty=$_POST['quantity'];
$PRate=$_POST['PRate'];


	$check=mysql_num_rows(mysql_query("select * from inwardtemp WHERE `PCode`='$PCode'"));
if($check!=0)
		{
	echo"<script>
window.alert('Data Already added');
window.location.href='inward.php?id=1';
</script>";
	}
		else
		{
			if($qty!=0)
			{
			$sql="INSERT INTO `inwardtemp`(`challan`,`date`,`PCode`,`vendor`,`quantity`,`login`,`PRate`) VALUES ('$challan', '$ADate', '$PCode','$vendor','$qty','$login','$PRate')";
			$res=mysql_query($sql);
	echo"
<script>
window.location.href='inward.php?id=1';
</script>
";
			}
		}
		 

?>	