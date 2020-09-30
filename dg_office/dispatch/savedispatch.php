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


$chdata=mysql_fetch_array(mysql_query("SELECT MAX(challan) FROM dispatch"));
		$_SESSION['Nch']=$Nch=$chdata[0]+1;
		
					$_SESSION['po']=$po=$_POST["pono"];
					$phone2=$_POST["phone2"];
					$address2=$_POST["address2"];
									
									/////inserting value in ssupply/////
		$cnt=0;
		$rj1=mysql_query("select * from dispatchtemp where `po`='$po'");
	 while ($row1 = mysql_fetch_array($rj1))
		 { 
					$_SESSION['podate']=$date=$row1['date'];
					$date=$row1['date'];
					$date2=$row1['date2'];
					$PCode=$row1['PCode'];
					$login=$row1['login'];
					$spoffice=$row1['spoffice'];
					$quantity=$row1['quantity'];
					
						/////Insert name of products/////
						$qrysch1=mysql_fetch_array(mysql_query("select * from stock WHERE `PCode`='$PCode'"));
	$avbal=$qrysch1['quantity'];
	if($avbal < $quantity)
	{	
	    	$_SESSION['po']="";
			$_SESSION['Nch']="";
					
	echo"
<script>
window.alert('Stock unavailable of $SKU');
window.location.href='create_dispatch.php';
</script>
";
$cnt++;		
	}
		  }
					
					
					
				 if($cnt==0)
				 {	
						/////inserting value in ssupply/////
						$rj=mysql_query("select * from dispatchtemp where `po`='$po'");
						  while ($row = mysql_fetch_array($rj))
						  { 
					$_SESSION['podate']=$date=$row['date'];
					$date=$row['date'];
					$date2=$row['date2'];
					$PCode=$row['PCode'];
					$login=$row['login'];
					$spoffice=$row['spoffice'];
					$quantity=$row['quantity'];
					
	$qrysch=mysql_fetch_array(mysql_query("select * from stock WHERE `PCode`='$PCode'"));
	$avbal=$qrysch['quantity'];
	if($avbal >= $quantity)
	{	
	$iqty=$quantity;
	}
	else{
			$iqty=$avbal;

		}
	
	
	if($iqty!=0)
			{
						/////Insert name of Production/////
			$sql="INSERT INTO `dispatch` 
			(`challan`,`po`,`date`,`date2`,`PCode`, `spoffice`,`quantity`,`address2`, `contact2`,`login`) VALUES 
			('$Nch', '$po', '$date', '$date2',  '$PCode', '$spoffice', '$quantity', '$address2', '$phone2', '$login')";
			$res=mysql_query($sql) or die(mysql_error());
////////////////////////////////////////////////////////////////////////////////////////////////////			
		$stupd=mysql_fetch_array(mysql_query("select * from stock WHERE `PCode`='$PCode'"));
		 $pkd=$stupd['quantity'];
		 $npkd=$pkd-$quantity;
		 $sql2="UPDATE `stock` SET `quantity`='$npkd' WHERE `PCode`='$PCode'";
   		 $res2=mysql_query($sql2);	

/////////////////////////////////////////////////////////////////////////////////////////////
 $stcntr=mysql_num_rows(mysql_query("select * from spstock WHERE `PCode`='$PCode' AND `spoffice`='$spoffice' "));
	if($stcntr > 0)
	{	$stupd2=mysql_fetch_array(mysql_query("select * from spstock WHERE `PCode`='$PCode' AND `spoffice`='$spoffice'"));
		 $pkd2=$stupd2['quantity'];
		 $npkd2=$pkd2+$quantity;
		 $sql3="UPDATE `spstock` SET `quantity`='$npkd2' WHERE `PCode`='$PCode' AND `spoffice`='$spoffice'";
   		 $res3=mysql_query($sql3);	
	}
	else{		
	$Pdata2=mysql_fetch_array(mysql_query("SELECT * FROM `product` WHERE `PCode`='$PCode'"));
	$Category=$Pdata2['Category'];
			$sql4="INSERT INTO `spstock`(`spoffice`,`Category`, `PCode`, `quantity`, `date`,`login`) VALUES 
							('$spoffice', '$Category', '$PCode', '$quantity', '$date2', '$login')";
			$res4=mysql_query($sql4);
	}
	
///////////////////////////////////////////////////////////////////////////////////////////////////
}

				$trunc=mysql_query("DELETE FROM `dispatchtemp` WHERE `po`='$po' AND `login`='$login'");
					$Supqry=mysql_query("update spofficero SET `Status`='2' where `challan`='$po'");
				$_SESSION['id1']="";
					echo"
<script>
window.open('dispatch_challan.php','_blank');
window.location.href='create_dispatch.php';
</script>";	
}
				
				
				
			
				 }
			


?>



<?PHP

$_SESSION['date']="";
$_SESSION['count']=0;


	
}

?>