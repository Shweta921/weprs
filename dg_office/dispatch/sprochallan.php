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
<title>RO Challan</title>
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
						$rj=mysql_query("select * from spofficero where challan=$challan");
						  while ($row = mysql_fetch_array($rj))
						  { 
						  $r3=0;
					$Vname=$row['spoffice'];
					$chaln=$row['challan'];
					$edate=$row["date"];
					$date="";
	$tags=explode('-',$edate);
	foreach($tags as $key) {
	$date=$key."-".$date;
							}
	$date=substr($date,0,-1);
						}


?>



<div id="printDiv" >
<div style="border: solid 1px #000;" >
<div style="border-bottom:solid 1px #000000;">
      <table align="center" width="100%" style="font-family:Arial, Helvetica, sans-serif">
      <tr>
          <td align="center" width="20%"><img src="images/logo.png" width="120" height="20" align="absmiddle" /></td>
			<td align="center" >
           <font size="5" color="#000"><big>ASSAM POLICE DEPARTMENT</big></font><br>
    		
          </td>
          <td align="center" width="20%" style="color:black;">
          Mob. 09029932835</td>
        </tr>
		</table>
     </div>   
        
		<table align="center" width="100%">
        <tr>
        <td align="center" colspan="2" style="border-bottom:solid 1px #000000; color:black;"><font size="2">DG OFFICE ADDRESS DG OFFICE ADDRESS DG OFFICE ADDRESS</font></td>
        </tr>
      	<tr style="font-size:13px;">
     				 <td><big>SP Office :- </big><z><strong>
					 <?php
					 $r=mysql_query("select  distinct spoffice from `spofficero` where `challan`='$challan'");
					 while ($row = mysql_fetch_array($r)){
					
					 $rss=mysql_fetch_array(mysql_query("select * from spoffice where `Id`='$Vname'"));
					 $VName=$rss['FName']; 
					 	
					 echo $VName;
					}
					 $addr=$rss['address']; 
					 $GSTIN=$rss['gstin'];
					 echo " </strong><br /> <a style='font-size:16px;'> Address: </a><strong> ";
					 echo $addr;
					 echo ".";
						?><br /></strong>
					GSTIN no:-
					<strong>
                     <?php
					 echo $GSTIN;
					 ?></strong></z>
					</td>
 			<td align="center" width="30%">PO No :&nbsp; <strong>D/PO- <?php echo $challan;?></strong><br />
											 Date :&nbsp;<strong/><?php

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

		  <tr style="background:#f3f8f4; font-size:13px" >
			 <th  width="auto" align="center" colspan="4">Processed Purchase Order Sheet</th>
		  </tr>
		  <tr style="background:#f3f8f4; font-size:13px" >
			 <th  width="auto" align="center" rowspan="1">Sr <br />No.</th>
			 <th  width="auto" align="center" rowspan="1">Code</th>
			 <th  width="auto" align="center" rowspan="1">Product Name</th>
			 <th  width="auto" align="center" rowspan="1">Qty</th>
			
		  </tr>

				 <?php
	  $r=mysql_query("select * from `spofficero` where `challan`='$challan' GROUP BY `PCode` ORDER BY PCode");
				 $cnt=mysql_num_rows($r);
				 $i=1;
				$ttax=0;
				$ttot=0;
				$tqty=0;
			 $iqty=0;
						 while ($row = mysql_fetch_array($r)) 
				 {
					$pqty=0;
	$irr=mysql_query("select * from `spofficero` where `challan`='$challan' AND `PCode`='$row[PCode]' ");
			$irrow = mysql_fetch_array($irr); 
			$quantity=$irrow['quantity'];
	$qrysch=mysql_fetch_array(mysql_query("select * from stock WHERE `PCode`='$row[PCode]'"));
	$avbal=$qrysch['quantity'];
	if($avbal >= $quantity)
	{	
	$iqty=$quantity;
	}
	else{
			$iqty=$avbal;

		}
			$pqty=$iqty;
				 
		?>
		  <tr style="font-size:13px;">
			 <td width="auto" align="center">
		<?php
					 echo $i++;
				 ?>
			 </td>
             <td  width="auto" align="">
				 <?php
	//$pcode=mysql_fetch_array(mysql_query("select * from `product` where `pname`='$row[pname]'"));	 
//echo $pcode['category'];
echo $row['PCode'];
$Pdata=mysql_fetch_array(mysql_query("SELECT * FROM `product` WHERE `PCode`='$row[PCode]'"));
		$PName=$Pdata['PName'];
?>
			 </td>
			 <td  width="auto" align="">
				 <?php
echo $PName;
?>			 </td>
			 <td width="auto" align="center">
				 <?php
		echo $pqty." Nos.";
		$tqty=$tqty+$pqty;
				 ?>
				
			 </td>
         </tr>
          <?php
				 }
				 $loop=22-$cnt;
         for($i=1;$i<$loop;$i++)
			{
			?>
		  <tr>
			<td colspan="1"></td>
    		<td colspan="1"></td>
    		<td colspan="1"></td>
    		<td colspan="1"></td>
    		
    	  </tr>
          <?php
				 }
			?>
            		  <tr>
			<td colspan="3">Total Quantity</td>
    		<td colspan="1" align="center"><?php echo $tqty." Nos."; ?></td>
    		
    	  </tr>

    
 </table>
<div style="width:70%; font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify; float:left; clear:right; margin-left:1%; margin-right:1%;">
	   Subject to Palghar jurisdiction.<br />
       <strong>GSTIN NO. 27AAOFB9688B1ZZ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PAN No.: AAOFB9688B</strong><br />
       </div>
       <div style="width:25%; margin-left:1%; margin-right:1%; font-family:Arial, Helvetica, sans-serif; font-size:11px; float:left; text-align:center;border-left:1px solid black;">
	   <br /><br /><br /><br /><br /><br />

For <strong>SP Office</strong>
      </div>
      <div style="clear:both;"></div>

            </div>

</div> 
<?php
if($irr)
{
	$upqry=mysql_query("update spofficero SET `Status`='1' where challan=$challan");

}
?>

      <input type="button" id="printbutton" value="&nbsp;Print" class="bgcolor_02 form-control" onClick="return printing();"/>
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
}


?>