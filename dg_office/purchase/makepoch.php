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


$chdata=mysql_fetch_array(mysql_query("SELECT MAX(challan) FROM `po`"));
		$Nch=$chdata[0]+1;
		
					$challan=$_POST["challan"];
						/////inserting value in ssupply/////
						$rj=mysql_query("select * from potemp where `challan`='$challan' AND `login`='$login'");
						  while ($row = mysql_fetch_array($rj))
						  { 
					$challan=$Nch;
					$date=$row['date'];
					$PCode=$row['PCode'];
					$login=$row['login'];
					$vendor=$row['vendor'];
					$quantity=$row['quantity'];
					$PRate=$row['PRate'];
						/////Insert name of Production/////
			$sql="INSERT INTO `po`(`challan`,`date`,`PCode`,`vendor`,`quantity`,`PRate`,`login`) VALUES ('$Nch', '$date', '$PCode','$vendor','$quantity','$PRate','$login')";
			$res=mysql_query($sql) or die(mysql_error());
			

	if(!$res)
			{
				echo mysql_error();
				echo "Cannot add data.";
			}
			else
			{
				$trunc=mysql_query("DELETE FROM `potemp` WHERE `login`='$login'");
				$_SESSION['id1']="";
							echo"
<script>
window.alert('Data added succesfully');
window.location.href='view_po.php?id=0';
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