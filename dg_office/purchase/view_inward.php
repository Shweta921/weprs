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

    <title>ASSAM POLICE| View Purchase Inward </title>

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
    <!-- bootstrap-datetimepicker -->

<script>
		function confirmclick(type,id) {
    if(type==1)
	{
	location.href = 'deletepo.php?link='+id;
	}										}
</script>


  </head>

         <?php 
require_once("../menu.php");
?>


<!-- /page content -->

        <!-- /page content -->
  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View Purchase Inward</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

  		<form id="studReport"  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
      
                   <div class="form-group row">
        	         <label for="from" class="col-md-2 col-sm-2 control-label" style="text-align: left"><h5><strong>Bill_no:</strong></h5></label>
            <div class='col-md-3 col-sm-3 col-xs-12' >
                        <select name="Bill_no"  class="form-control col-md-2 col-sm-2" required="required">
                 <option value="">Bill_no</option>
                 <option value="All">All</option>
                  <?php
								$resull=mysql_query("select * from purchase GROUP BY `Bill_no`");
								while($rowDept=mysql_fetch_array($resull)){
									?>
									<option value="<?php echo $rowDept['Bill_no']?>"><?php echo $rowDept['Bill_no']?></option>
									<?php
								}
								?>
                 </select>
                 </div>
      </div>      
            
                   <div class="form-group row">
                 <!--================div for From=========-->                     
                     <label for="from" class="col-md-2 col-sm-2 control-label" style="text-align: left"><h5><strong>From:</strong></h5></label>
                  
                        <div class='input-group date col-md-3 col-sm-2 col-xs-12' id='myDatepicker1'>
                            <input type='text' class="form-control"  name="from" placeholder="YYYY-MM-DD"  />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
</div>                  
                   <div class="form-group row">
                
                 <!--================div for To=========-->
                     <label for="to" class="col-md-2 col-sm-2 control-label" style="text-align: left"><h5><strong>To:</strong></h5></label>
                    <div class='input-group date col-md-3 col-sm-2 col-xs-12' id='myDatepicker2'>
                            <input type='text' class="form-control"  name="to" placeholder="YYYY-MM-DD"  />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                 </div>  
                
                
                <!--================div for Search button=========-->                        
                <div class=" form-group row  col-md-12">
                    <div class="col-md-12 col-sm-12">
                    <button id="buttonSearch" type="submit" class="btn btn-primary" name="submit">Search</button>
                   </div>
                </div>
                <div class="clear"></div>		         
         </form>


  </div>
                </div>
              </div>
           
 
 

 
 
 
 
 
  <?php
       	
////////////////////////////////////////All Site report //////////////////////////////////////////////////////////
        
		if(isset($_POST['submit']))
		 {
		 $p=0;
		 	$Bill_no=$_POST['Bill_no'];
			if($Bill_no=="All")
			{
			$edate1=$_POST['from'];
			$edate2=$_POST['to'];
		
		 ?>
 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Purchase Data</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
            <th>Product name</th>
            <th>Rate</th>
            <th>Qty</th>
            <th>Amount</th>
                   		</tr>
                      </thead>
		               <tbody>
             <?php

			$GTAmount=$tCount1=0;
			

$fsql="SELECT * FROM `purchase` WHERE  `date` BETWEEN '$edate1' AND '$edate2' GROUP BY `Bill_no` ORDER BY `Bill_no`";
			$fres=mysql_query($fsql);
		
				while($fdata=mysql_fetch_array($fres)){
				$fchlln=$fdata['Bill_no'];
				$cdate=$fdata['date'];
					$Vname=$fdata['vendor'];
 $rss=mysql_fetch_array(mysql_query("select * from vendor where `Id`='$Vname'"));
					 $vname=$rss['FName']; 
				

					echo "<tr style='font-weight:bold; background-color:#CCC;'>
	<td colspan='4'> 
	<a style='color:red'>Bill No:- $fchlln </a>";
?>	
	
<a style='color:black;' class='pull-right  col-xs-1' href='javascript:void(0);' onclick='javascript:confirmclick(1,<?php echo $fchlln; ?>")'>
	<img src='../images/b_drop.png' title='Delete'>Delete</a>
	
  <?php  
echo "<a style='color:black;' class='pull-right  col-xs-1' href='loadinwarddata.php?id=".$fchlln."'>
	<img src='../images/b_edit.png' title='Edit'> Edit </a>
	
	<a style='color:black;' class='pull-right col-xs-1' target='_blank' href='purchasechallan.php?challan=$fchlln'> View </a>
	</td>
							</tr>";

					echo "<tr style='font-weight:bold; text-align:center;'>
	<td colspan='4'> <a >Date:- $cdate, Vendor:- $vname </a></td></tr>";

$sql="SELECT * FROM `purchase` WHERE  `date` BETWEEN '$edate1' AND '$edate2' AND `Bill_no`='$fchlln' GROUP BY `PCode`";
			$res=mysql_query($sql);
			$Ttax=$NTvalue=$Tvalue=$TAmount=$CCount1=0;
			while($data=mysql_fetch_array($res)){
			
			$PCode=$data['PCode'];
			$sql2="SELECT * FROM `purchase` WHERE  `date` BETWEEN '$edate1' AND '$edate2' AND `PCode`='$PCode' AND `Bill_no`='$fchlln' ";
			$res2=mysql_query($sql2);
			$Amount=$PCount1=0;
			while($data2=mysql_fetch_array($res2)){
		
		$PRate=$data2['PRate'];
		$qty=$data2['quantity'];
		$SKU=$data2['SKU'];
		$Pdata=mysql_fetch_array(mysql_query("SELECT * FROM `product` WHERE `SKU`='$SKU'"));
		$PName=$Pdata['PName'];
		$GST=$Pdata['GST'];
		$PCount1=$PCount1+$qty;
		$CCount1=$CCount1+$qty;
		$tCount1=$tCount1+$qty;
		
			}
		$Amount=$PRate*$PCount1;
		$TAmount=$TAmount+$Amount;
		if($GST!=0){
			$Tvalue=$Tvalue+$Amount;
			$tax=$Amount*($GST/100);
			$Ttax=$Ttax+$tax;
			}
			else{
	$NTvalue=$NTvalue+$Amount;

				}
		
			echo "<tr style='font-weight:bold;' >
					<td colspan=''>$PName</td>
					<td>$PRate</td>
					<td>".round($PCount1,2)." Nos.</td>
					<td> Rs. ".round($Amount,2)." /-</td>
						</tr>";
				
				}
			$Tbill=$NTvalue+$Tvalue+$Ttax;
			$Fbill=round($Tbill);
			$roundoff=$Fbill-$Tbill;
			$GTAmount=$GTAmount+$Fbill;
			
			if($NTvalue!=0)
			{
			echo "<tr style='font-weight:bold;background-color:#FFF !important; color:#000;' >
					<td colspan='2'>Non-Taxable Value</td>
					<td></td>
					<td> Rs. ".$NTvalue." </td>
					</tr>";
			}
			 echo "<tr style='font-weight:bold;background-color:#FFF !important; color:#000;' >
					<td colspan='2'>Taxable Value</td>
					<td></td>
					<td> Rs. ".$Tvalue." </td>
					</tr>
					<tr style='font-weight:bold;background-color:#FFF !important; color:#000;' >
					<td colspan='2'>GST Amount</td>
					<td></td>
					<td> Rs. ".$Ttax." </td>
					</tr>";
					
		if($roundoff!=0)
			{
			echo   "<tr style='font-weight:bold;background-color:#FFF !important; color:#000;' >
					<td colspan='2'>Round Off</td>
					<td></td>
					<td> $roundoff </td>
					</tr>";
			}
			echo " <tr style='font-weight:bold;background-color:#ccc !important; color:#000;' >
					<td colspan='2'>Bill Total</td>
					<td>".round($CCount1,2)." Nos.</td>
					<td> Rs. $Fbill /-</td>
					</tr>";

				
			}
			echo "<tr style='font-weight:bold;background-color:#000 !important; color:#FFF;' >
					<td colspan='2'>Grand Total</td>
					<td>".round($tCount1,2)." Nos.</td>
					<td> Rs. ".round($GTAmount,2)." /-</td>
					</tr>";
			?>
		 </tbody>
                    </table>
                  </div>
                </div>
              </div>	

<?php
	}
	
	
	else{
		?>
		
	 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Purchase Data</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
             <th>Product name</th>
            <th>Rate</th>
            <th>Qty</th>
            <th>Amount</th>
                   		</tr>
                      </thead>
		               <tbody>
             <?php

$gtCount1=0;
			
$extda=mysql_fetch_array(mysql_query("SELECT * FROM `purchase` WHERE `Bill_no`='$Bill_no'"));
				
				$fchlln=$extda['Bill_no'];
				$cdate=$extda['date'];
				

				$Vname=$extda['vendor'];
 $rss=mysql_fetch_array(mysql_query("select * from vendor where `Id`='$Vname'"));
					 $vname=$rss['FName']; 
					 
	
					echo "<tr style='font-weight:bold; background-color:#CCC;'>
	<td colspan='4'> 
	<a style='color:red'>Bill No:- $fchlln </a>";
?>	
	
<a style='color:black;' class='pull-right  col-xs-1' href='javascript:void(0);' onclick='javascript:confirmclick(1,<?php echo $fchlln; ?>")'>
	<img src='../images/b_drop.png' title='Delete'>Delete</a>
	
  <?php  
echo "<a style='color:black;' class='pull-right  col-xs-1' href='loadinwarddata.php?id=".$fchlln."'>
	<img src='../images/b_edit.png' title='Edit'> Edit </a>
	
	<a style='color:black;' class='pull-right col-xs-1' target='_blank' href='purchasechallan.php?challan=$fchlln'> View </a>
	</td>
							</tr>";

					echo "<tr style='font-weight:bold; text-align:center;'>
	<td colspan='4'> <a >Date:- $cdate, Vendor:- $vname </a></td></tr>";

$sql="SELECT * FROM `purchase` WHERE `Bill_no`='$fchlln' GROUP BY `PCode`";
			$res=mysql_query($sql);
			$TAmount=$CCount1=0;
			while($data=mysql_fetch_array($res)){
			
			$PCode=$data['PCode'];
		$PRate=$data['PRate'];
		$qty=$data['quantity'];
		$Pdata=mysql_fetch_array(mysql_query("SELECT * FROM `product` WHERE `PCode`='$PCode'"));
		$PName=$Pdata['PName'];
		$Amount=$PRate*$qty;
		$TAmount=$TAmount+$Amount;
		$CCount1=$CCount1+$qty;
			echo "<tr style='font-weight:bold;' >
					<td colspan=''>$PName</td>
					<td>$PRate</td>
					<td>".round($qty,2)." Nos.</td>
					<td> Rs. ".round($Amount,2)." /-</td>
						</tr>";
				
				}
			echo "<tr style='font-weight:bold;background-color:#ccc !important; color:#000;' >
					<td colspan='2'>Bill Total</td>
					<td>".round($CCount1,2)." Nos.</td>
					<td> Rs. ".round($TAmount,2)." /-</td>
					</tr>";

				
				
			
			?>
		 </tbody>
                    </table>
                  </div>
                </div>
              </div>	

<?php	
		
		
 }
	
  }
	
			?> 
</div>
  </div>
 </div>
        <!-- footer content -->
             <?php 
require_once("../footer.php");
?>
 <!-- Custom Theme Scripts -->
    <script src="<?php echo $_SESSION['base_url']?>/../build/js/custom.min.js"></script>
     
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