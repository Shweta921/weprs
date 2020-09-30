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
		
						
					$trunc2=mysql_query("DELETE FROM `spofficero` WHERE `challan`='$_SESSION[id1]'");
					
							/////inserting value in ssupply/////
						$rj=mysql_query("select * from sppotemp2 where `challan`='$Nch' AND `login`='$login'");
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
				$trunc=mysql_query("DELETE FROM `sppotemp2` WHERE `challan`='$_SESSION[id1]' AND `login`='$login'");
				$_SESSION['id1']="";
							echo"
<script>
window.alert('Data Updated succesfully');
window.location.href='view_ro.php?id=0';
</script>
";
			}
				}


			


?>



<?PHP

$_SESSION['date']="";
$_SESSION['count']=0;
$_SESSION['Pono']="";
$_SESSION['podate']="";
$_SESSION['spoffice']="";
$_SESSION['spoffice']="";
$_SESSION['challan']="";	
}

?>