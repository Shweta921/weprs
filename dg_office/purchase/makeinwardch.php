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


$chdata=mysql_fetch_array(mysql_query("SELECT MAX(challan) FROM purchase"));
		$Nch=$chdata[0]+1;
		
					$challan=$_POST["challan"];
					$bill_no=$_POST["bill_no"];
						/////inserting value in ssupply/////
						$rj=mysql_query("select * from inwardtemp where `challan`='$challan' AND `login`='$login'");
						  while ($row = mysql_fetch_array($rj))
						  { 
					$challan=$Nch;
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
	('$Nch', '$date', '$PCode','$vendor','$quantity','$login','$PRate','$GST','$bill_no')";
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
				$trunc=mysql_query("DELETE FROM `inwardtemp` WHERE `login`='$login'");
				$_SESSION['id1']="";
				$_SESSION['vendor']="";
							echo"
<script>
window.alert('Data added succesfully');
window.location.href='view_inward.php?id=0';
</script>
";
			}
			

			
			
			
				}


			


?>



<?PHP

$_SESSION['date']="";
$_SESSION['count']=0;


	
}

?>