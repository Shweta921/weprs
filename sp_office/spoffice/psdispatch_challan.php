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
	$login=$_SESSION['UserName'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dispatch Challan</title>
</head>
<style>
 a { text-decoration:none;}
  td , th
 {height:20px;}
</style>
<body>
<?php

					$po=$_SESSION['po'];
					$challan=$_SESSION['Nch'];
					
						
					$Supqry=mysql_query("update pstationpo SET `Status`='2' where `challan`='$po'");

					

		 $r=mysql_fetch_array(mysql_query("select * from psdispatch where `challan`='$challan'"));
						 $DID=$r['spoffice'];
						 $RID=$r['pstation'];
						 $edate=$r['date'];
						 $Poch=$r['po'];
						$chaln=$r['challan'];
					
					$date="";
	$tags=explode('-',$edate);
	foreach($tags as $key) {
	$date=$key."-".$date;
							}
	$date=substr($date,0,-1);

						 
					 $rss=mysql_fetch_array(mysql_query("select * from spoffice where `Id`='$DID'"));
					 $FName=$rss['FName'];
					 $addr=$rss['address']; 
					 $cellno=$rss['phone'];
			


?>



<div id="printDiv" >
<div style="border: solid 1px #000;" >
<div style="border-bottom:solid 1px #000000;">
      <table align="center" width="100%" style="font-family:Arial, Helvetica, sans-serif">
     <tr>
          <td align="center" width="20%"><img src="<?php echo $_SESSION['base_url']?>/images/LOGO.png"  class="img-responsive" width="150"  align="absmiddle" /></td>
			<td align="center" ><font size="3" style="text-decoration:underline;">Request Order Challan</font><br>
           <font size="5" color="#f55" style="text-transform:uppercase;"><big><?php echo $FName; ?></big></font><br>
    		  </td>
          <td align="center" width="20%" style="color:blue;">
          <font size="2">Mob. <?php echo $cellno; ?></font></td>
        </tr>
		</table>
     </div>   
<div style="">
      <table align="center" width="100%" style="border-collapse:collapse;" border="1px">
        <tr>
        <td align="center" colspan="3" style="color:blue; border-color:#000;"><font size="3"><?php echo $addr; ?></font></td>
        </tr>

      	<tr style="font-size:15px;">
     				 <td   width="37%" >Police Station Details (Adhere to):
					 <?php
		 $r=mysql_fetch_array(mysql_query("select * from psdispatch where `challan`='$challan'"));
						 $DID=$r['pstation'];
						 $RID=$r['pstation'];
						 $date=$r['date2'];
						 $podate=$r['date'];
						 $Poch=$r['po'];
						 $addr2=$r['address2'];
						 $con2=$r['contact2'];
						 
					 $rss=mysql_fetch_array(mysql_query("select * from pstation where `Id`='$RID'"));
					 $FName=$rss['PSName'];
					 $addr=$rss['address']; 
					 $cellno=$rss['phone'];
					 echo $FName;
					 echo "<br />  ";
					 echo $addr;
					 echo ".<br /> Contact no. ";
					 echo $cellno;
					 echo ".";
					 
					?><br />
					 </td>
     				 <td  width="37%">Police Station Details  (Delivered to):
					 <?php
					 echo $FName;
					 echo "<br />";
					 echo $addr2;
					 echo ".<br /> Contact no. ";
					 echo $con2;
					 echo ".";
								?><br />
					 </td>
        			 <td align="center" width="25%">
                     Challan No :&nbsp; <strong>DC-<?php echo $challan;?></strong><br />
					 Date :&nbsp;<strong><?php echo $date;?></strong><br />
                     </td>
      	</tr>
      </table>
      
    
    <table align="center" width="100%" style="font-family:Arial, Helvetica, sans-serif;border-collapse:collapse;" border="1px">

		  <tr style="background:#f3f8f4; font-size:13px" >
			 <th  width="auto" align="center" rowspan="1">Sr <br />No.</th>
			 <th  width="auto" align="center" rowspan="1">Code</th>
			 <th  width="auto" align="center" rowspan="1">Product Name</th>
			 <th  width="auto" align="center" rowspan="1">Qty</th>
			
		  </tr>

				 <?php
	  $r=mysql_query("select * from `psdispatch` where `challan`='$challan' ");
				 $cnt=mysql_num_rows($r);
				 $i=1;
				$ttax=0;
				$ttot=0;
				$tqty=0;
				 while ($row = mysql_fetch_array($r)) 
				 {
					 $pqty=0;
	$irr=mysql_query("select * from `psdispatch` where `challan`='$challan' AND `PCode`='$row[PCode]' ");
				 while ($irrow = mysql_fetch_array($irr)) 
				 {
				$pqty=$pqty+$irrow['quantity'];
				 }
		?>
		  <tr style="font-size:13px;">
			 <td width="auto" align="center">
		<?php
					 echo $i++;
				 ?>
			 </td>
             <td  width="auto" align="">
				 <?php
echo $row['PCode'];


$Pdata=mysql_fetch_array(mysql_query("SELECT * FROM `product` WHERE `PCode`='$row[PCode]'"));
		$PName=$Pdata['Category']." - ".$Pdata['PName'];
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
       <strong></strong><br />
       </div>
       <div style="width:25%; margin-left:1%; margin-right:1%; font-family:Arial, Helvetica, sans-serif; font-size:11px; float:left; text-align:center;border-left:1px solid black;">
	   <br /><br /><br /><br /><br /><br />

For <strong>SP OFFICE</strong>
      </div>
      <div style="clear:both;"></div>

            </div>
            </div>

</div> 
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
$_SESSION['date']=$_SESSION['pochln']=$_SESSION['challan']=$_SESSION['count']="";
$_SESSION['po']=$_SESSION['podate']=$_SESSION['pstation']=$_SESSION['id1']=$_SESSION['Nch']="";
}


?>