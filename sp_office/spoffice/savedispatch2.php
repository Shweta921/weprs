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


					$Nch=$_SESSION['Dno'];
					$po=$_POST["pono"];
					$phone2=$_POST["phone2"];
					$address2=$_POST["address2"];
									
	/////////////////////////////////////////updating stock///////////////////////////////////////////////////////////			
					$rj=mysql_query("select * from psdispatch where `challan`='$Nch'");
						  while ($row = mysql_fetch_array($rj))
						  { 
					$PCode=$row['PCode'];
					$iqty=$row['quantity'];
					$DID=$row['spoffice'];
					$pstation=$row['pstation'];
					$date=date('Y-m-d');
		
	$tempavl=0;
	
	$qrysch2=mysql_query("select * from psdispatch WHERE `PCode`='$PCode' AND  `challan`='$Nch'");
	 while ($tempdata = mysql_fetch_array($qrysch2))
		 {
		$tempavl=$tempavl+$tempdata['quantity'];	  
		 }
		
		$stupd=mysql_fetch_array(mysql_query("select * from spstock WHERE `PCode`='$PCode'"));
		 $pkd=$stupd['quantity'];
		 $npkd=$pkd+$tempavl;
		 $sql2="UPDATE `spstock` SET `quantity`='$npkd' WHERE `PCode`='$PCode'";
   		 $res2=mysql_query($sql2);	
}	
					






	/////////////////////////////////////////updating stock///////////////////////////////////////////////////////////			
					$rj=mysql_query("select * from psdispatchtemp2 where  `challan`='$Nch'");
					while ($row = mysql_fetch_array($rj))
						  { 
					$_SESSION['podate']=$date=$row['date'];
					$date2=$row['date2'];
					$PCode=$row['PCode'];
					$login=$row['login'];
					$spoffice=$row['spoffice'];
					$iqty=$row['quantity'];
					$DID=$row['spoffice'];

		
		$stupd=mysql_fetch_array(mysql_query("select * from spstock WHERE `PCode`='$PCode'"));
		 $pkd=$stupd['quantity'];
		 $npkd=$pkd-$iqty;
		 $sql2="UPDATE `spstock` SET `quantity`='$npkd' WHERE `PCode`='$PCode'";
   		 $res2=mysql_query($sql2);	


}	
					



/////////////////////////////////////////////Delete old psdispatch//////////////////////////////////////////////////////


$trunc=mysql_query("DELETE FROM `psdispatch` WHERE `po`='$po' AND `challan`='$Nch' ");


///////////////////////////////////////////////////////////////////////////////////////////////////
				
						/////inserting value in ssupply/////
						$rj=mysql_query("select * from psdispatchtemp2 where `po`='$po'  AND `challan`='$Nch'");
						  while ($row = mysql_fetch_array($rj))
						  { 
					$_SESSION['podate']=$date=$row['date'];
					$date2=$row['date2'];
					$PCode=$row['PCode'];
					$login=$row['login'];
					$spoffice=$row['spoffice'];
					$pstation=$row['pstation'];
					$iqty=$row['quantity'];
					
		
					
						/////Insert name of Production/////
						
			$sql="INSERT INTO `psdispatch` 
			(`challan`,`po`,`date`,`date2`,`PCode`, `spoffice`,`pstation`,`quantity`,`address2`, `contact2`,`login`) VALUES 
			('$Nch', '$po', '$date', '$date2',  '$PCode', '$spoffice', '$pstation', '$iqty', '$address2', '$phone2', '$login')";
			$res=mysql_query($sql) or die(mysql_error());


///////////////////////////////////////////////////////////////////////////////////////////////////
}

			
			
	$trunc=mysql_query("DELETE FROM `psdispatchtemp2` WHERE `po`='$po' AND `challan`='$Nch' AND `login`='$login'");
			
			
				$_SESSION['dat']=$_SESSION['date']=$_SESSION['spoffice']=$_SESSION['id1']="";
				$_SESSION['Dno']=$_SESSION['pochln']=$_SESSION['podate']=$_SESSION['challan']="";
				
				echo"
<script>
window.location.href='view_dispatch.php';
</script>";
				 
			


?>



<?PHP

$_SESSION['date']="";
$_SESSION['count']=0;


	
}

?>