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
	
if($_SESSION['spoffice']=="")
{
$_SESSION['spoffice']=$spoffice=$_POST['spoffice'];

}
else{
$spoffice=$_SESSION['spoffice'];

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


	$check=mysql_num_rows(mysql_query("select * from sppotemp2 WHERE `PCode`='$PCode'"));
if($check!=0)
		{
	echo"<script>
window.alert('Data Already added');
window.location.href='edit_po.php?id=1';
</script>";
	}
		else
		{
			if($qty!=0)
			{
			$sql="INSERT INTO `sppotemp2`(`challan`,`date`,`PCode`,`spoffice`,`quantity`,`login`) VALUES 
										('$challan', '$ADate', '$PCode','$spoffice','$qty','$login')";
			$res=mysql_query($sql);
	echo"
<script>
window.location.href='edit_po.php?id=1';
</script>
";
			
		}
		 }

?>	