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


		
					$challan=$_GET["id"];
		
						/////inserting value in ssupply/////
		$rj=mysql_query("select * from po where `challan`='$challan' AND `login`='$login'")  or die(mysql_error());
						  while ($row = mysql_fetch_array($rj))
						  { 
					$date=$row['date'];
					$PCode=$row['PCode'];
					$vendor=$row['vendor'];
					$quantity=$row['quantity'];
					$PRate=$row['PRate'];
		
		$check=mysql_num_rows(mysql_query("select * from potemp2 where `challan`='$challan' AND `login`='$login' AND `PCode`='$PCode'"));
		if($check==0)
		{
				$sql="INSERT INTO `potemp2`(`challan`,`date`,`PCode`,`vendor`,`quantity`,`PRate`,`login`) VALUES ('$challan', '$date', '$PCode','$vendor','$quantity','$PRate','$login')";
			$res=mysql_query($sql) or die(mysql_error());

	if(!$res)
			{
				echo mysql_error();
				echo "Cannot add data.";
			}
			else
			{
							echo"
<script>
window.location.href='edit_purchase.php?challan=$challan&&id=0';
</script>
";
			}
		}

				}

							echo"
<script>
window.location.href='edit_purchase.php?challan=$challan&&id=0';
</script>";

			


?>



<?PHP

$_SESSION['date']="";
$_SESSION['count']=0;


	
}

?>