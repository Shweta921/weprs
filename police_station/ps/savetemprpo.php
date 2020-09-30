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

	
if($_SESSION['pstation']=="")
{
$_SESSION['pstation']=$pstation=$_POST['pstation'];

}
else{
$pstation=$_SESSION['pstation'];

	}


if($_SESSION['challan']=="")
{
$_SESSION['challan']=$challan=$_POST['challan'];
}
else{
$challan=$_SESSION['challan'];

	}


$cnt=0;


$PCode=$_POST['PCode'];
$qty=$_POST['quantity'];




$POdata=mysql_fetch_array(mysql_query("SELECT MAX(po) FROM pstationpo WHERE `spoffice`='$spoffice'"));
$Dpo=$POdata[0]+1;
echo $Dpo;
/////////////////////////////////////////		

	$check=mysql_num_rows(mysql_query("select * from pspotemp WHERE `PCode`='$PCode' AND `pstation`='$pstation'"));
	if($check==0)
		{	
			$sql="INSERT INTO `pspotemp`
			(`challan`,`po`,`date`,`PCode`,`spoffice`,`pstation`, `quantity`,`login` ) VALUES 
		('$challan', '$Dpo', '$ADate', '$PCode','$spoffice', '$pstation', '$qty','$login')";
			$res=mysql_query($sql);

	echo"
<script>
window.location.href='purchase_order.php?id=1';
</script>";

		}

else{
	
	echo"<script>
window.alert('Data Already added');
window.location.href='purchase_order.php?id=1';
</script>";

	}



?>	
