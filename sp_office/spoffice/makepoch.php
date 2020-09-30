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


$chdata=mysql_fetch_array(mysql_query("SELECT MAX(challan) FROM `spofficero`"));
		$Nch=$chdata[0]+1;
		
					$challan=$_POST["challan"];
						/////inserting value in ssupply/////
						$rj=mysql_query("select * from `sppotemp` where `challan`='$challan' AND `login`='$login'");
						  while ($row = mysql_fetch_array($rj))
						  { 
					$challan=$Nch;
					$date=$row['date'];
					$PCode=$row['PCode'];
					$login=$row['login'];
					$spoffice=$row['spoffice'];
					$quantity=$row['quantity'];
						/////Insert name of Production/////
$sql="INSERT INTO `spofficero`(`challan`,`date`,`PCode`,`spoffice`,`quantity`,`login`) VALUES 
					('$Nch', '$date', '$PCode','$spoffice','$quantity','$login')";
			$res=mysql_query($sql) or die(mysql_error());
			

	if(!$res)
			{
				echo mysql_error();
				echo "Cannot add data.";
			}
			else
			{
				$trunc=mysql_query("DELETE FROM `sppotemp` WHERE `login`='$login'");
				$_SESSION['id1']="";
							echo"
<script>
window.alert('Data added succesfully');
window.location.href='view_ro.php?id=0';
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