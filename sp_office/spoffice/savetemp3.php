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
$pstation=$_SESSION['pstation'];
	
$PCode=$_POST['PCode'];
$qty=$_POST['quantity'];
	

if($qty!="" || 0)
{
    
$check=mysql_num_rows(mysql_query("select * from `psdispatchtemp2` WHERE `PCode`='$PCode'"));
if($check!=0)
		{
	echo"<script>
window.alert('Data Already added');
window.location.href='edit_psdispatch.php?id=1';
</script>";
	}
		else
		{
$tempavl=0;
$temptaken=0;
	$qrysch3=mysql_query("select * from psdispatchtemp2 WHERE `PCode`='$PCode' AND `po`='$pochaln'");
	 while ($tempdata2 = mysql_fetch_array($qrysch3))
		 {
		$temptaken=$temptaken+$tempdata2['quantity'];	  
		 }

	$qrysch2=mysql_query("select * from psdispatch WHERE `PCode`='$PCode' AND `po`='$pochaln'");
	 while ($tempdata = mysql_fetch_array($qrysch2))
		 {
		$tempavl=$tempavl+$tempdata['quantity'];	  
		 }
	$qrysch=mysql_fetch_array(mysql_query("select * from spstock WHERE `PCode`='$PCode'"));
	$avbal=$tempavl-$temptaken+$qrysch['quantity'];
	if($avbal >= $qty)
	{	
	$iqty=$qty;
	}
	else{
			$iqty=$avbal;

		}
	
	
	if($iqty>0)
			{
	
$Pdata=mysql_fetch_array(mysql_query("SELECT * FROM `product` WHERE `PCode`='$PCode'"));
$PName=$Pdata['PName'];
		
			$sql="INSERT INTO `psdispatchtemp2`
(`challan`,`po`,`date`,`date2`,`PCode`,`spoffice`,`quantity`,`login`) VALUES 
('$challan', '$pochaln', '$podate','$ADate','$PCode','$spoffice','$iqty','$login')";
			$res=mysql_query($sql) or die(mysql_error());
			$sq2="UPDATE `psdispatchtemp2` SET `date2`='$ADate',`spoffice`='$spoffice' WHERE `login`='$login' AND `challan`='$challan'";
			$re2=mysql_query($sq2) or die(mysql_error());
	if($iqty!=$qty)
	{
	echo"<script>
window.alert('Quantity of Product:- $PName reduced to $iqty');
window.location.href='edit_psdispatch.php?id=1';
</script>";
	}
	else{
		
	echo"<script>
window.location.href='edit_psdispatch.php?id=1';
</script>";
	}
	
		}
		
		$sq2="UPDATE `psdispatchtemp2` SET `date2`='$ADate',`spoffice`='$spoffice' WHERE `login`='$login' AND `challan`='$challan'";
			$re2=mysql_query($sq2) or die(mysql_error());
			echo"<script>
window.alert('Quantity Unavailable of Product:- $PName');
window.location.href='edit_psdispatch.php?id=1';
</script>";
}


		 
}

?>	