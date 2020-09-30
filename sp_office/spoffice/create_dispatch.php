<?php
session_start();
require_once("../config.php");

if(!isset($_SESSION['UserName']))
{
header("Location:index.php");
}
else
{
	$name=$_SESSION['UserName'];
	$SalesId=$_SESSION['SalesId'];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ASSAM POLICE| Dispatch PS RO</title>

    <!-- Bootstrap -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo $_SESSION['base_url']?>/../build/css/custom.min.css" rel="stylesheet">

 <!-- Datatables -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<script>
		function confirmclick(type,id) {
    if(type==1)
	{
	var answer = confirm ('Are you sure to delete the record?');
    if (answer) {	
	location.href = 'jfjf.php?link='+id;
				}
	}
    
										}
</script>


  </head>

         <?php 
require_once("../menu.php");
?>


<!-- /page content -->

        <!-- /page content -->
 

 
 
 
 
 
  <?php
       	
////////////////////////////////////////All Site report //////////////////////////////////////////////////////////
        
		
		 ?>
 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Create spoffice Dispatch</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
            <th>Product name</th>
            <th>Qty</th>
                   		</tr>
                      </thead>
		               <tbody>
             <?php

			$tCount1=0;
			

$fsql="SELECT * FROM `pstationpo` WHERE  `Status`=1 AND `spoffice`='$SalesId' GROUP BY `challan` ORDER BY `challan`";
			$fres=mysql_query($fsql);
		
				while($fdata=mysql_fetch_array($fres)){
				$fchlln=$fdata['challan'];
				$cdate=$fdata['date'];
				$status=$fdata['Status'];
					$Vname=$fdata['spoffice'];
 $rss=mysql_fetch_array(mysql_query("select * from spoffice where `Id`='$Vname'"));
					 $vname=$rss['FName']; 
					$RID=$fdata['pstation'];
 $rssR=mysql_fetch_array(mysql_query("select * from pstation where `Id`='$RID'"));
					 $Rname=$rssR['PSName']; 
				
$crd=date('Y-m-d');
					echo "<tr style='font-weight:bold; background-color:#CCC;'>
	<td colspan='2'> 
	<a style='color:red'>Purchase Order No:- PO-$fchlln </a>";
	
echo "<a style='color:white; font-weight:bold;' class='btn btn-success pull-right col-xs-2' target='_blank'  href='load_dispatch.php?challan=$fchlln'> Dispatch </a>
<a style='color:white; font-weight:bold;' class='btn btn-success pull-right col-xs-2' target='_blank' href='prochallan.php?challan=$fchlln'> Re-print PO </a>
	</td>
							</tr>";

					echo "<tr style='font-weight:bold; text-align:center;'>
	<td colspan='2'> <a >Date:- $cdate, SP Office:- $vname / Police Station:- $Rname </a></td></tr>";

$sql="SELECT * FROM `pstationpo` WHERE `Status`=1 AND `challan`='$fchlln' GROUP BY `PCode`";
			$res=mysql_query($sql);
			$CCount1=0;
			while($data=mysql_fetch_array($res)){
			
			$PCode=$data['PCode'];
			$sql2="SELECT * FROM `pstationpo` WHERE  `Status`=1 AND `PCode`='$PCode' AND `challan`='$fchlln' ";
			$res2=mysql_query($sql2);
			$PCount1=0;
			while($data2=mysql_fetch_array($res2)){
		
		$qty=$data2['quantity'];
		$Pdata=mysql_fetch_array(mysql_query("SELECT * FROM `product` WHERE `PCode`='$PCode'"));
		$PName=$Pdata['PName'];
		$PCount1=$PCount1+$qty;
		$CCount1=$CCount1+$qty;
		$tCount1=$tCount1+$qty;
		
		
			}
			echo "<tr style='font-weight:bold;' >
					<td colspan=''>$PName</td>
					<td>".round($PCount1,2)." Nos.</td>
					</tr>";
				
				}
			echo "<tr style='font-weight:bold;background-color:#ccc !important; color:#000;' >
					<td colspan=''>Challan Total</td>
					<td>".round($CCount1,2)." Nos.</td>
					</tr>";

				
			}
			echo "<tr style='font-weight:bold;background-color:#000 !important; color:#FFF;' >
					<td colspan=''>Grand Total</td>
					<td>".round($tCount1,2)." Nos.</td>
					</tr>";
			?>
		 </tbody>
                    </table>
                  </div>
                </div>
              </div>	

 </div>
 </div>
        <!-- footer content -->
             <?php 
require_once("../footer.php");
?>
     
  <!-- Datatables -->
    <script  src="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script  src="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script  src="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script  src="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script  src="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script  src="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script  src="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script  src="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script  src="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script  src="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script  src="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script  src="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script  src="<?php echo $_SESSION['base_url']?>/../vendors/jszip/dist/jszip.min.js"></script>
    <script  src="<?php echo $_SESSION['base_url']?>/../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script  src="<?php echo $_SESSION['base_url']?>/../vendors/pdfmake/build/vfs_fonts.js"></script>
 
 <!-- Custom Theme Scripts -->
    <script src="<?php echo $_SESSION['base_url']?>/../build/js/custom.min.js"></script>
    	 <!-- bootstrap-daterangepicker -->
    <script src="<?php echo $_SESSION['base_url']?>/../vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo $_SESSION['base_url']?>/../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="<?php echo $_SESSION['base_url']?>/../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script><script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker1').datetimepicker({
        format: 'YYYY-MM-DD'
    });
	$('#myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    
    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>
    </body>
</html>