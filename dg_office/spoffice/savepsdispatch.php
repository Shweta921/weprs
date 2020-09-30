<?php
error_reporting(E_ALL^E_DEPRECATED);
session_start();
$sid=session_id();
require_once("../config.php");
if(!isset($_SESSION['UserName']))
{
header("Location:../index.php");
}
else
{
?>
<?php
$login=$_SESSION['UserName'];


$chdata=mysql_fetch_array(mysql_query("SELECT MAX(challan) FROM psdispatch"));
		$_SESSION['Nch']=$Nch=$chdata[0]+1;
		
					$_SESSION['po']=$po=$_POST["pono"];
					$phone2=$_POST["phone2"];
					$address2=$_POST["address2"];
					
									/////inserting value in ssupply/////
		$cnt=0;
		$rj1=mysql_query("select * from psdispatchtemp where `po`='$po'");
	 while ($row1 = mysql_fetch_array($rj1))
		 { 
					$_SESSION['podate']=$date=$row1['date'];
					$date=$row1['date'];
					$date2=$row1['date2'];
					$PCode=$row1['PCode'];
					$login=$row1['login'];
					$spoffice=$row1['spoffice'];
					$pstation=$row1['pstation'];
					$quantity=$row1['quantity'];
					
					$Pdata=mysql_fetch_array(mysql_query("select * from product WHERE `PCode`='$PCode'"));
					$pname=$Pdata['PName'];				
					
						/////Insert name of products/////
						$qrysch1=mysql_fetch_array(mysql_query("select * from spstock WHERE `PCode`='$PCode' AND `spoffice`='$spoffice'"));
	$avbal=$qrysch1['quantity'];
	if($avbal < $quantity)
	{	
	    	$_SESSION['po']="";
			$_SESSION['Nch']="";
					
echo"<script>
window.alert('Quantity Unavailable of Product:- $pname');
window.location.href='psdispatch.php?id=1';
</script>";

$cnt++;		
	}
		  }
					
					
					
				 if($cnt==0)
				 {	
						/////inserting value in ssupply/////
						$rj=mysql_query("select * from psdispatchtemp where `po`='$po'");
						  while ($row = mysql_fetch_array($rj))
						  { 
					$_SESSION['podate']=$date=$row['date'];
					$date=$row['date'];
					$date2=$row['date2'];
					$PCode=$row['PCode'];
					$login=$row['login'];
					$spoffice=$row['spoffice'];
					$pstation=$row['pstation'];
					$quantity=$row['quantity'];
					
	$qrysch=mysql_fetch_array(mysql_query("select * from spstock WHERE `PCode`='$PCode'  AND `spoffice`='$spoffice'"));
	$avbal=$qrysch['quantity'];
	if($avbal >= $quantity)
	{	
	$iqty=$quantity;
	}
	else{
			$iqty=$avbal;

		}
	
	
	if($iqty!=0)
			{
						/////Insert name of Production/////
			$sql="INSERT INTO `psdispatch` 
			(`challan`,`po`,`date`,`date2`,`PCode`, `spoffice`,`pstation`,`quantity`,`address2`, `contact2`,`login`) VALUES 
			('$Nch', '$po', '$date', '$date2',  '$PCode', '$spoffice', '$pstation', '$quantity', '$address2', '$phone2', '$login')";
			$res=mysql_query($sql) or die(mysql_error());
////////////////////////////////////////////////////////////////////////////////////////////////////			
		$stupd=mysql_fetch_array(mysql_query("select * from spstock WHERE `PCode`='$PCode'  AND `spoffice`='$spoffice'"));
		 $pkd=$stupd['quantity'];
		 $npkd=$pkd-$quantity;
		 $sql2="UPDATE `spstock` SET `quantity`='$npkd' WHERE `PCode`='$PCode' AND `spoffice`='$spoffice'";
   		 $res2=mysql_query($sql2);	
	
///////////////////////////////////////////////////////////////////////////////////////////////////
}

				$trunc=mysql_query("DELETE FROM `psdispatchtemp` WHERE `po`='$po' AND `login`='$login'");
					$Supqry=mysql_query("update `pstationpo` SET `Status`='2' where `challan`='$po'");
				$_SESSION['id1']="";
							echo"
<script>
window.open('psdispatch_challan.php','_blank');
window.location.href='create_dispatch.php';
</script>";	
}
				
				
				
			
				 }
			


?>



<?PHP

$_SESSION['date']="";
$_SESSION['count']=0;


	
}

?>