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
function convertToIndianCurrency($number) {
    $no = round($number);
    $decimal = round($number - ($no = floor($number)), 2) * 100;    
    $digits_length = strlen($no);    
    $i = 0;
    $str = array();
    $words = array(
        0 => '',
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine',
        10 => 'Ten',
        11 => 'Eleven',
        12 => 'Twelve',
        13 => 'Thirteen',
        14 => 'Fourteen',
        15 => 'Fifteen',
        16 => 'Sixteen',
        17 => 'Seventeen',
        18 => 'Eighteen',
        19 => 'Nineteen',
        20 => 'Twenty',
        30 => 'Thirty',
        40 => 'Forty',
        50 => 'Fifty',
        60 => 'Sixty',
        70 => 'Seventy',
        80 => 'Eighty',
        90 => 'Ninety');
    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($i < $digits_length) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;            
            $str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
        } else {
            $str [] = null;
        }  
    }
    
    $Rupees = implode(' ', array_reverse($str));
    $paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
    return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
}

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Request Order</title>



</head>
<style>
 a { text-decoration:none;}
  td , th
 {height:20px;}
</style>
<body>
<?php
					$challan=$_GET['challan'];
				
						/////inserting value in ssupply/////
						$rj=mysql_query("select * from spofficero where challan=$challan");
						  while ($row = mysql_fetch_array($rj))
						  { 
					$Vname=$row['spoffice'];
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



<div id="printDiv" >
<div style="border: solid 1px #000;" >
<div style="border-bottom:solid 1px #000000;">
      <table align="center" width="100%" style="font-family:Arial, Helvetica, sans-serif">
      <tr>
          <td align="center" width="20%"><img src="images/logo.png" width="120" height="20" align="absmiddle" /></td>
			<td align="center" >
           <font size="5" color="#f55"><big>ASSAM POLICE DEPARTMENT</big></font><br>
    		
          </td>
          <td align="center" width="20%" style="color:blue;">
          Mob. 09028832835</td>
        </tr>
		</table>
     </div>   
        
		<table align="center" width="100%">
        <tr>
        <td align="center" colspan="2" style="border-bottom:solid 1px #000000; color:blue;"><font size="2">DG OFFICE ADDRESS  DG OFFICE ADDRESS  DG OFFICE ADDRESS  </font></td>
        </tr>
      	<tr style="font-size:13px;">
     				 <td><big>SP Office Name :- </big><z><strong>
					 <?php
					// $row = mysql_fetch_array(mysql_query("select  distinct vendor from `spofficero` where `challan`='$challan'"));
					 $rss=mysql_fetch_array(mysql_query("select * from spoffice where `Id`='$Vname'"));
					 $VName=$rss['FName']; 
					 	
					 echo $VName;
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
 			<td align="center" width="30%">Request Order No :&nbsp; <strong>RO- <?php echo $challan;?> /20-21</strong><br />
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
			 <th  width="auto" align="center" colspan="6">Request Order Sheet</th>
		  </tr>
		  <tr style="background:#f3f8f4; font-size:13px" >
			 <th  width="auto" align="center" rowspan="1">Sr <br />No.</th>
			 <th  width="auto" align="center" rowspan="1">Product Name</th>
			 <th  width="auto" align="center" rowspan="1">Qty</th>
			
		  </tr>

				 <?php
	  $r=mysql_query("select * from `spofficero` where `challan`='$challan'");
				 $cnt=mysql_num_rows($r);
				 $i=1;
				$TAmount=$Tqty=0;
				 while ($row = mysql_fetch_array($r)) 
				 {
					 $pqty=$row['quantity'];
					 $Tqty=$Tqty+$pqty;
		?>
		  <tr style="font-size:13px;">
			 <td width="auto" align="center">
		<?php
					 echo $i++;
				 ?>
			 </td>
				 <?php
$Pdata=mysql_fetch_array(mysql_query("SELECT * FROM `product` WHERE `PCode`='$row[PCode]'"));
$PName=$Pdata['PName'];
?>
			 <td  width="auto" align="">
				 <?php
echo $PName;
?>			 </td>
			 <td width="auto" align="center">
				 <?php
		echo $pqty." Nos.";
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
    		
    	  </tr>
          <?php
				 }
			?>
            		  <tr>
			<td colspan="2">Total </td>
    		<td colspan="1" align="center"><?php echo $Tqty." Nos."; ?></td>
    		
    	  </tr>
            		  <tr>
			<td colspan="6">Amount In Words:- <strong><?php echo convertToIndianCurrency(round($TAmount)); ?> </strong></td>
    		
    	  </tr>

    
 </table>
<div style="width:70%; font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify; float:left; clear:right; margin-left:1%; margin-right:1%;">
	   Subject to Palghar jurisdiction.<br />
       <strong>GSTIN NO. 27AAOFB9688B1ZZ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PAN No.: AAOFB9688B</strong><br />
       </div>
       <div style="width:25%; margin-left:1%; margin-right:1%; font-family:Arial, Helvetica, sans-serif; font-size:11px; float:left; text-align:center;border-left:1px solid black;">
<br />
<br />
<br />
<br />
<br />
<br />

For <strong>SP OFFICE</strong>
      </div>
      <div style="clear:both;"></div>

            </div>



<!--===================================================================================================================-->
<!--===================================================================================================================-->
<!--===================================================================================================================-->
<!--===================================================================================================================-->
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
$_SESSION['bill']="";
}


?>