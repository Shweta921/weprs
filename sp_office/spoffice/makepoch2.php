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
					$challan=$_POST["challan"];
						/////inserting value in ssupply/////
				$trunc=mysql_query("DELETE FROM `po` WHERE `challan`='$challan'");
			
			
		$rj=mysql_query("select * from potemp2 where `challan`='$challan' AND `login`='$login'");
						  while ($row = mysql_fetch_array($rj))
						  { 
					$challan=$challan;
					$date=$row['date'];
					$PCode=$row['PCode'];
					$login=$row['login'];
					$vendor=$row['vendor'];
					$quantity=$row['quantity'];
					$PRate=$row['PRate'];
						/////Insert name of Production/////
			$sql="INSERT INTO `po`(`challan`,`date`,`PCode`,`vendor`,`quantity`,`PRate`,`login`) VALUES ('$challan', '$date', '$PCode','$vendor','$quantity','$PRate','$login')";
			$res=mysql_query($sql);
			

	if(!$res)
			{
				echo mysql_error();
				echo "Cannot add data.";
			}
			else
			{
				$trunc=mysql_query("DELETE FROM `potemp2` WHERE `challan`='$challan' AND `login`='$login'");
				$_SESSION['id1']="";
							echo"
<script>
window.alert('Data Updated Succesfully');
window.location.href='view_po.php?id=0';
</script>
";
			}
				}


			


?>



<?PHP

$_SESSION['vendor']="";
$_SESSION['date']="";
$_SESSION['count']=0;


	
}

?>