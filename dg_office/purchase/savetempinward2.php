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

$Bill_no=$_SESSION['Bill_no'];
$PCode=$_POST['PCode'];
$qty=$_POST['quantity'];
$PRate=$_POST['PRate'];

$check=mysql_num_rows(mysql_query("select * from inwardtemp2 WHERE `PCode`='$PCode'"));
if($check!=0)
		{
	echo"<script>
window.alert('Data Already added');
window.location.href='edit_inward.php?id=1';
</script>";
	}
		else
		{
			if($qty!=0)
			{
			$sql="INSERT INTO `inwardtemp2`(`challan`,`date`,`PCode`,`vendor`,`quantity`,`login`,`PRate`, `Bill_no`) VALUES 
										('$challan', '$ADate', '$PCode','$vendor','$qty','$login','$PRate', '$Bill_no')";
			$res=mysql_query($sql);
			$sq2="UPDATE `inwardtemp2` SET `date`='$ADate',`vendor`='$vendor' WHERE `login`='$login' AND `Bill_no`='$Bill_no'";
			$re2=mysql_query($sq2);			
echo "<script>
window.location.href='edit_inward.php?id=1';
</script>";
			}
		}
		 

?>	