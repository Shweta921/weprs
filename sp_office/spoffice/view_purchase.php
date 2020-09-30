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

    <title>ASSAM POLICE | View Inward </title>

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
	location.href = 'deleteprod2.php?link='+id;
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
  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View  Inward </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

  		<form id="studReport"  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
      
                   <div class="form-group row">
        	         <label for="from" class="col-md-2 col-sm-2 control-label" style="text-align: left"><h5><strong>DC	 No:</strong></h5></label>
            <div class='col-md-3 col-sm-3 col-xs-12' >
                        <select name="challan"  class="form-control col-md-2 col-sm-2" required="required">
                 <option value="">DC_no</option>
                 <option value="All">All</option>
                  <?php
								$resull=mysql_query("select * from dispatch WHERE `spoffice`='$SalesId' GROUP BY `challan`");
								while($rowDept=mysql_fetch_array($resull)){
								    	$Vid=$rowDept['spoffice'];
             $rss2=mysql_fetch_array(mysql_query("select * from spoffice where `Id`='$Vid'"));
			                		 $vname=$rss2['FName']; 
									?>
									<option value="<?php echo $rowDept['challan']?>"><?php echo $rowDept['challan']."-".$vname ?></option>
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
		 	$challan=$_POST['challan'];
			if($challan=="All")
			{
			$edate1=$_POST['from'];
			$edate2=$_POST['to'];
		
		 ?>
 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Dispatch Data</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
            <th>Category</th>
            <th>Product name</th>
            <th>Qty</th>
                   		</tr>
                      </thead>
		               <tbody>
             <?php

			$tCount1=0;
			

$fsql="SELECT * FROM `dispatch` WHERE  `date2` BETWEEN '$edate1' AND '$edate2' GROUP BY `challan` ORDER BY `challan`";
			$fres=mysql_query($fsql);
		
				while($fdata=mysql_fetch_array($fres)){
				$fchlln=$fdata['challan'];
				$cdate=$fdata['date2'];
				$status=$fdata['Status'];
					$Vname=$fdata['spoffice'];
 $rss=mysql_fetch_array(mysql_query("select * from spoffice where `Id`='$Vname'"));
					 $vname=$rss['FName']; 
				

				echo "<tr style='font-weight:bold; background-color:#CCC;'>
	<td colspan='3'> 
	<a style='color:red'>Dispatch Challan No:- DC-$fchlln </a>";
	if($status==0)
	{
		
	}
	else{
echo "<a style='color:green;' class='col-xs-3'>This Dispatch has been Billed</a>";
		
		}
echo "<a style='color:black;' class='pull-right col-xs-1 btn btn-success' target='_blank' href='dispatch_challan2.php?challan=$fchlln'> View </a>
	</td>
							</tr>";

					echo "<tr style='font-weight:bold; text-align:center;'>
	<td colspan='2'> <a >Date:- $cdate, spoffice:- $vname </a></td></tr>";



		$sql="SELECT * FROM `dispatch` WHERE `challan`='$fchlln'";
			$res=mysql_query($sql);
			$CCount1=0;
			while($data=mysql_fetch_array($res)){
			
		$PCode=$data['PCode'];
		$qty=$data['quantity'];
		$Pdata=mysql_fetch_array(mysql_query("SELECT * FROM `product` WHERE `PCode`='$PCode'"));
		$PName=$Pdata['PName'];
		$Category=$Pdata['Category'];
		$CCount1=$CCount1+$qty;
		$tCount1=$tCount1+$qty;
		
		
			echo "<tr style='font-weight:bold;' >
					<td colspan=''>$Category</td>
					<td colspan=''>$PName</td>
					<td>".round($qty,2)." Nos.</td>
					</tr>";
				
				}
			echo "<tr style='font-weight:bold;background-color:#ccc !important; color:#000;' >
					<td colspan='2'>Challan Total</td>
					<td>".round($CCount1,2)." Nos.</td>
					</tr>";

				

			}
			echo "<tr style='font-weight:bold;background-color:#000 !important; color:#FFF;' >
					<td colspan='2'>Grand Total</td>
					<td>".round($tCount1,2)." Nos.</td>
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
                    <h2>Dispatch Data</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
            <th>Category</th>
            <th>Product name</th>
            <th>Qty</th>
                   		</tr>
                      </thead>
		               <tbody>
             <?php

			$gtCount1=0;
			
$extda=mysql_fetch_array(mysql_query("SELECT * FROM `dispatch` WHERE `challan`='$challan'"));
				
				$fchlln=$extda['challan'];
				$cdate=$extda['date'];
				$status=$extda['Status'];
				$Vname=$extda['spoffice'];
 $rss=mysql_fetch_array(mysql_query("select * from spoffice where `Id`='$Vname'"));
					 $vname=$rss['FName']; 
					 
	
				echo "<tr style='font-weight:bold; background-color:#CCC;'>
	<td colspan='3'> 
	<a style='color:red'>Dispatch Challan No:- DC-$fchlln </a>";
	if($status==0)
	{
	}
	else{
echo "<a style='color:green;' class='col-xs-3'>This order has been processed</a>";
		
		}
echo "<a style='color:black;' class='pull-right col-xs-1 btn btn-success' target='_blank' href='dispatch_challan2.php?challan=$fchlln'> View </a>
	</td>
							</tr>";


					echo "<tr style='font-weight:bold; text-align:center;'>
	<td colspan='2'> <a >Date:- $cdate, spoffice:- $vname </a></td></tr>";
		
		
$sql="SELECT * FROM `dispatch` WHERE `challan`='$challan'";
			$res=mysql_query($sql);
			while($data=mysql_fetch_array($res)){
			
			$PCode=$data['PCode'];
			$sql2="SELECT * FROM `dispatch` WHERE `PCode`='$PCode' AND `challan`='$fchlln'";
			$res2=mysql_query($sql2);
			$tCount1=0;
			while($data2=mysql_fetch_array($res2)){
		
		$qty=$data2['quantity'];
		$Pdata=mysql_fetch_array(mysql_query("SELECT * FROM `product` WHERE `PCode`='$PCode'"));
		$PName=$Pdata['PName'];
		$Category=$Pdata['Category'];
	    $tCount1=$tCount1+$qty;
		$gtCount1=$gtCount1+$qty;
		
		
			}
			echo "<tr style='font-weight:bold;' >
					<td colspan=''>$Category</td>
					<td colspan=''>$PName</td>
					<td>".round($tCount1,2)." Nos.</td>
					</tr>";
				
				}
			echo "<tr style='font-weight:bold;background-color:#ccc !important; color:#000;' >
					<td colspan='2'>Grand Total</td>
					<td>".round($gtCount1,2)." Nos.</td>
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