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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Client Payment Receipt</title>
</head>
<style>
 a { text-decoration:none;}
  td , th
 {height:20px;}
</style>
<body>
<?php
					$challan=$_GET['challan'];
						$prodd=null;

						/////inserting value in ssupply/////
					$rj=mysql_query("select * from purchase where `Bill_no`='$challan'");
						  while ($row = mysql_fetch_array($rj))
						  { 
					$Vname=$row['vendor'];
					$pname=$row['PCode'];
					$quantity=$row['quantity'];
					$chaln=$row['challan'];
					$r2=$row['quantity'];
					$edate=$row["date"];
					$date="";
	$tags=explode('-',$edate);
	foreach($tags as $key) {
	$date=$key."-".$date;
							}
	$date=substr($date,0,-1);

				
			}


?>



<div style="border: solid 1px #000;">
<div style="border-bottom:solid 1px #000000;">
      <table align="center" width="100%" style="font-family:Arial, Helvetica, sans-serif">
      <tr>
   		<td align="center" ><font size="3" style="text-decoration:underline;">Shade Wise Detail</font><br>
          </td>
       </tr>
		</table>
     </div>   
        
		<table align="center" width="100%">
       
      	<tr style="font-size:15px;">
     				<td align="center" width="30%">purchase bill No :&nbsp;<strong><?php echo $challan;?></strong> Date :&nbsp;<strong/><?php

$date="";
	$tags=explode('-',$edate);
	foreach($tags as $key) {
	$date=$key."-".$date;
							}
	$date=substr($date,0,-1);
											 echo $date;?></td>
      	</tr>
      </table>

      <table align="center" width="100%" style="font-family:Arial, Helvetica, sans-serif;border-collapse:collapse;" border="1px">
		 <?php
				 $r=mysql_query("select * from `purchase` where `Bill_no`='$challan' GROUP BY `PCode` ORDER BY PCode");
				 while ($row = mysql_fetch_array($r)) 
				 {
		?>
 <tr style="background:#FF6; font-size:13px" >
<td align="center" colspan="16">
				 <?php
				
	$Pdata=mysql_fetch_array(mysql_query("SELECT * FROM `product` WHERE `PCode`='$row[PCode]'"));
$PName=$Pdata['Brand']." - ".$Pdata['PName'];
			echo $row['PCode']."-".$PName;



?>
</td> 
		</tr>

 <tr style="background:#f3f8f4; font-size:13px" >
<td align="center">Shade</td> 
<td align="center">Qty</td> 
<td align="center">Shade</td> 
<td align="center">Qty</td> 
<td align="center">Shade</td> 
<td align="center">Qty</td> 
<td align="center">Shade</td> 
<td align="center">Qty</td> 
<td align="center">Shade</td> 
<td align="center">Qty</td> 
<td align="center">Shade</td> 
<td align="center">Qty</td> 
<td align="center">Shade</td> 
<td align="center">Qty</td> 
<td align="center">Shade</td> 
<td align="center">Qty</td> 
		</tr>

        <?php
        $inqu=mysql_query("select * from `purchase` where `Bill_no`='$challan' AND `PCode`='$row[PCode]' ORDER BY PCode");
				$i=0;
				 while ($inda = mysql_fetch_array($inqu)) 
				 {
				
					 if($i==16) { ?>
								  <tr style="font-size:13px;">
 
						 <?php } ?>
			 <td  width="auto" align="center">
				 <?php
		echo $inda['Shade'];
			$i++;	 ?>
			 </td>
			 <td  width="auto" align="center">
				 <?php
		echo $inda['quantity'];
			$i++;	 ?>
			 </td>

		<?php
							 if($i==16) { ?>
			</tr>
						 <?php 
						 $i=0; } ?>

          <?php
				 }
			 }
			?>
    
 </table>

     
            </div>
</div> 
</body>
      <script type="text/javaScript">
 	  function printing(){
	  document.getElementById("printDiv").style.width='200mm';
	  document.getElementById("printbutton").style.display='none';
	  window.print();
	  window.close();
	  	 }
    </script>
</html>
<?PHP
$_SESSION['bill']="";
}


?>