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
$PRate=$_POST['PRate'];
$qty=$_POST['quantity'];

	$check=mysql_num_rows(mysql_query("select * from `potemp2` WHERE `PCode`='$PCode'"));
if($check!=0)
		{
	echo"<script>
window.alert('Data Already added');
window.location.href='edit_purchase.php?id=1';
</script>";
	}
		else
		{
			if($qty!=0)
			{
			$sql="INSERT INTO `potemp2`(`challan`,`date`,`PCode`,`PRate`,`vendor`,`quantity`,`login`) VALUES ('$challan', '$ADate', '$PCode','$PRate','$vendor','$qty','$login')";
			$res=mysql_query($sql);
			$sq2="UPDATE `potemp2` SET `date`='$ADate',`vendor`='$vendor' WHERE `login`='$login' AND `challan`='$challan'";
			$re2=mysql_query($sq2);
			
	echo"
<script>
window.location.href='edit_purchase.php?id=1';
</script>
";
			}
		}
		 

?>	