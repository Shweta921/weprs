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
$Nch=$chdata[0]+1;

		
					$_SESSION['pochln']=$po=$_GET["challan"];
						/////inserting value in ssupply/////
						$rj=mysql_query("select * from pstationpo where `challan`='$po'");
						  while ($row = mysql_fetch_array($rj))
						  { 
					$date=$_SESSION['podate']=$row['date'];
					$date2=date('Y-m-d');
					$PCode=$row['PCode'];
					$_SESSION['spoffice']=$spoffice=$row['spoffice'];
					$_SESSION['pstation']=$pstation=$row['pstation'];
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
	
$check=mysql_num_rows(mysql_query("select * from psdispatchtemp where `po`='$po' AND `login`='$login' AND `PCode`='$PCode'"));
		if($check==0)
		{									/////Insert name of Production/////
			$sql="INSERT INTO `psdispatchtemp`(`challan`,`po`,`date`,`date2`,`PCode`,`spoffice`,`pstation`,`quantity`,`login`) VALUES 
										('$Nch', '$po', '$date', '$date2',  '$PCode', '$spoffice', '$pstation', '$iqty','$login')";
			$res=mysql_query($sql) or die(mysql_error());
				echo"
<script>
window.location.href='psdispatch.php?id=0';
</script>
";
				}
			}
				
				
}

	echo"
<script>
window.location.href='psdispatch.php?id=0';
</script>
";		


?>



<?PHP

$_SESSION['date']="";
$_SESSION['count']=0;


	
}

?>