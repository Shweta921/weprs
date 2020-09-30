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
		
					$_SESSION['Bill_no']=$Bill_no=$_GET["id"];
						/////inserting value in ssupply/////
		$rj=mysql_query("select * from purchase where `Bill_no`='$Bill_no'")  or die(mysql_error());
						  while ($row = mysql_fetch_array($rj))
						  { 
					$challan=$row['challan'];
					$date=$row['date'];
					$PCode=$row['PCode'];
					$vendor=$row['vendor'];
					$quantity=$row['quantity'];
					$PRate=$row['PRate'];
$check=mysql_num_rows(mysql_query("select * from inwardtemp2 where `challan`='$challan' AND `login`='$login' AND `PCode`='$PCode'"));
		if($check==0)
		{
						/////Insert name of Production/////
			$sql="INSERT INTO `inwardtemp2`(`challan`,`date`,`PCode`,`vendor`,`quantity`,`login`,`PRate`, `Bill_no`) VALUES 
									('$challan', '$date', '$PCode','$vendor','$quantity','$login','$PRate', '$Bill_no')";
			$res=mysql_query($sql) or die(mysql_error());
			
	if(!$res)
			{
				echo mysql_error();
				echo "Cannot add data.";
			}
			else
			{
echo"<script>
window.location.href='edit_inward.php?challan=$challan&&id=0';
</script>";
			}
				}

				    }
	
	echo"<script>
window.location.href='edit_inward.php?challan=$challan&&id=0';
</script>";
			



$_SESSION['date']="";
$_SESSION['count']=0;


	
}

?>