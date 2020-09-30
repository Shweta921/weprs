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


		
					$Bill_no=$_SESSION['Bill_no'];
					$bill_no=$_POST["bill_no"];
				
	////////////////////////////////////Subtract From Stock/////////////////////////////////////////////////
				
					$rj=mysql_query("select * from purchase where `Bill_no`='$Bill_no'");
						  while ($row = mysql_fetch_array($rj))
						  { 
						$PCode=$row['PCode'];
					$quantity=$row['quantity'];
					$qryupd=mysql_fetch_array(mysql_query("select * from stock WHERE `PCode`='$PCode'"));
		 			$pkd=$qryupd['quantity'];
		 			$npkd=$pkd-$quantity;
						  }
				
				////////////////////////////////////Subtract From Stock/////////////////////////////////////////////////
				
					$rj=mysql_query("select * from purchase where `Bill_no`='$Bill_no'");
					while ($row = mysql_fetch_array($rj))
						  { 
		 			$sql2="UPDATE `stock` SET `quantity`='$npkd' WHERE `PCode`='$PCode'";
   		 			$res2=mysql_query($sql2);

						}

								
	$trunc=mysql_query("DELETE FROM `purchase` WHERE `Bill_no`='$Bill_no'");
				
						/////inserting value in ssupply/////
					$rj=mysql_query("select * from inwardtemp2 where `Bill_no`='$Bill_no' AND `login`='$login'");
						  while ($row = mysql_fetch_array($rj))
						  { 
					$challan=$row['challan'];
					$date=$row['date'];
					$PCode=$row['PCode'];
					$login=$row['login'];
					$vendor=$row['vendor'];
					$quantity=$row['quantity'];
					$PRate=$row['PRate'];
	$gstdata=mysql_fetch_array(mysql_query("select * from product WHERE `PCode`='$PCode'"));
			$GST=$gstdata['GST'];
						/////Insert name of Production/////
			$sql="INSERT INTO `purchase`
		(`challan`,`date`,`PCode`,`vendor`,`quantity`,`login`,`PRate`,`GST`,`Bill_no`) VALUES 
	('$challan', '$date', '$PCode','$vendor','$quantity','$login','$PRate','$GST','$bill_no')";
			$res=mysql_query($sql) or die(mysql_error());
			
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$qryupd=mysql_fetch_array(mysql_query("select * from stock WHERE `PCode`='$PCode'"));
		 $pkd=$qryupd['quantity'];
		 $npkd=$pkd+$quantity;
		 $sql2="UPDATE `stock` SET `quantity`='$npkd' WHERE `PCode`='$PCode'";
   		 $res2=mysql_query($sql2);

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	if(!$res)
			{
				echo mysql_error();
				echo "Cannot add data.";
			}
			else
			{
				$trunc=mysql_query("DELETE FROM `inwardtemp2` WHERE `login`='$login'");
				$_SESSION['id1']="";
				$_SESSION['vendor']="";
				$_SESSION['Bill_no']="";
				$_SESSION['challan']="";
				$_SESSION['date']="";

echo"<script>
window.location.href='view_inward.php?id=0';
</script>";

			}
				}


			


?>



<?PHP

$_SESSION['date']="";
$_SESSION['count']=0;


	
}

?>