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

		
					$_SESSION['Dno']=$Dno=$_GET["id"];
						/////inserting value in ssupply/////
						$rj=mysql_query("select * from dispatch where `challan`='$Dno'");
						  while ($row = mysql_fetch_array($rj))
						  { 
					$date=$_SESSION['podate']=$row['date'];
					$date2=$_SESSION['dat']=$row['date2'];
					$challan=$row['challan'];
					$po=$_SESSION['pochln']=$row['po'];
					$PCode=$row['PCode'];
					$_SESSION['spoffice']=$spoffice=$row['spoffice'];
					$quantity=$row['quantity'];
	
	
$check=mysql_num_rows(mysql_query("select * from dispatchtemp2 where `challan`='$Dno' AND `login`='$login' AND `PCode`='$PCode'"));
		if($check==0)
		{									/////Insert name of Production/////
			$sql="INSERT INTO `dispatchtemp2`(`challan`,`po`,`date`,`date2`,`PCode`,`spoffice`,`quantity`,`login`) VALUES 
									('$challan', '$po', '$date', '$date2',  '$PCode','$spoffice', '$quantity', '$login')";
			$res=mysql_query($sql) or die(mysql_error());
echo "<script>
window.location.href='edit_dispatch.php?id=0';
</script>";
				}
				
}

echo "<script>
window.location.href='edit_dispatch.php?id=0';
</script>";		


}

?>