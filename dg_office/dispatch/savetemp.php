<?php
session_start();
require_once("../config.php");
if(!isset($_SESSION['UserName']))
{
header("Location:../index.php");
}
	
$name=$login=$_SESSION['UserName'];
        

if($_SESSION['date']=="")
{
$_SESSION['date']=$ADate=$_POST['pdate'];

}
else{
$ADate=	$_SESSION['date'];

	}
	
if($_SESSION['challan']=="")
{
$_SESSION['challan']=$challan=$_POST['challan'];
}
else{
$challan=$_SESSION['challan'];

	}
$pochaln=$_SESSION['pochln'];
$podate=$_SESSION['podate'];
$spoffice=$_SESSION['spoffice'];
	

$PCode=$_POST['PCode'];
$qty=$_POST['quantity'];

	$Pdata=mysql_fetch_array(mysql_query("select * from product WHERE `PCode`='$PCode'"));
	$pname=$Pdata['PName'];
	$qrysch=mysql_fetch_array(mysql_query("select * from stock WHERE `PCode`='$PCode'"));
	$avbal=$qrysch['quantity'];

if($qty!="" || 0)
{
    
if($avbal >= $qty)
	{	
	$iqty=$qty;
	}
	else{
			$iqty=$avbal;

		}
	
	
	if($iqty!=0)
			{
	$check=mysql_num_rows(mysql_query("select * from `dispatchtemp` WHERE `PCode`='$PCode' AND `login`='$login' AND `po`='$pochaln'"));
if($check!=0)
		{
	echo"<script>
window.alert('Data Already added');
window.location.href='dispatch.php?id=1';
</script>";
	}
		else
		{
		
			$sql="INSERT INTO `dispatchtemp`
(`challan`,`po`,`date`,`date2`,`PCode`,`spoffice`,`quantity`,`login`) VALUES 
('$challan', '$pochaln', '$podate','$ADate','$PCode','$spoffice','$iqty','$login')";
			$res=mysql_query($sql) or die(mysql_error());
			$sq2="UPDATE `dispatchtemp` SET `date2`='$ADate',`spoffice`='$spoffice' WHERE `login`='$login' AND `challan`='$challan'";
			$re2=mysql_query($sq2) or die(mysql_error());
	
if($iqty!=$qty)
	{
	echo"<script>
window.alert('Quantity of Product:- $pname reduced to $iqty');
window.location.href='dispatch.php?id=1';
</script>";

	}
	else{
		
echo"<script>
window.location.href='dispatch.php?id=1';
</script>";
	}
	
			}
		}
	else
		{
		$sq2="UPDATE `dispatchtemp` SET `date2`='$ADate',`spoffice`='$spoffice' WHERE `login`='$login' AND `challan`='$challan'";
			$re2=mysql_query($sq2) or die(mysql_error());
			echo"<script>
window.alert('Quantity Unavailable of SKU:- $SKU2');
window.location.href='dispatch.php?id=1';
</script>";
		}
			
}





?>	