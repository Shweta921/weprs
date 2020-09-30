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

$DID=$_SESSION['spoffice'];
$chdata=mysql_fetch_array(mysql_query("SELECT MAX(challan) FROM pstationpo"));
		$Nch=$chdata[0]+1;
		
$podata=mysql_fetch_array(mysql_query("SELECT MAX(po) FROM pstationpo WHERE `spoffice`='$DID'"));
		$Poch=$podata[0]+1;
					$challan=$_POST["challan"];
						/////inserting value in ssupply/////
						$rj=mysql_query("select * from pspotemp where `challan`='$challan' AND `login`='$login'");
						  while ($row = mysql_fetch_array($rj))
						  { 
					$date=$row['date'];
					$PCode=$row['PCode'];
					$login=$row['login'];
					$spoffice=$row['spoffice'];
					$pstation=$row['pstation'];
					$quantity=$row['quantity'];




				/////Insert name of Production/////
			$sql="INSERT INTO `pstationpo`
			(`challan`,`po`,`date`,`PCode`, `spoffice`,`pstation`, `quantity`, `login`,`Status` ) VALUES 
		   ('$Nch', '$Poch', '$date', '$PCode', '$spoffice', '$pstation', '$quantity', '$login',0)";
			$res=mysql_query($sql);
			
		    }
/////////////////////////////////////////////////////////////////////////////////////////////


				$trunc=mysql_query("DELETE FROM `pspotemp` WHERE `login`='$login' AND `challan`='$challan'");
				$_SESSION['id1']="";
							echo"
<script>
window.alert('Data added succesfully');
window.location.href='view_ro.php';
</script>
";
			
				
						

			


?>



<?PHP

$_SESSION['date']="";
$_SESSION['count']="";
$_SESSION['challan']="";
$_SESSION['spoffice']="";
$_SESSION['date']="";
$_SESSION['pstation']="";
	
}

?>