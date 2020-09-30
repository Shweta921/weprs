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

    <title>BKC INTERNATIONAL | View Stock </title>

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
		function selectProduct(id){
		if(id!="-1")
		{
			loadData1(id);	
		}
		else
		{
			$("#product").html("<option value=''> Select Product </option>");
		}
	    }

		function loadData1(loadId){
			var dataString = 'id='+ loadId;
			//$("#"+loadType+"_loader").show();
			
			$.ajax({
				type: "POST",
				url: "loadProd2.php",
				data: dataString,
				cache: false,
				success: function(result){
				$("#product").html("<option value=''> Select Product </option>");  
					$("#product").append(result); 
				}
			});
		}  
		
/////////////////1/////////////////////

	function selectShade(id){
		if(id!="-1")
		{
			loadData2(id);	
		}
		else
		{
			$("#shade").html("<option value=''> Select Shade </option>");
		}
	    }

		function loadData2(loadId){
			var dataString = 'id='+ loadId;
			//$("#"+loadType+"_loader").show();
			
			$.ajax({
				type: "POST",
				url: "loadShades.php",
				data: dataString,
				cache: false,
				success: function(result){
				$("#shade").html("<option value=''> Select Shade </option>");  
					$("#shade").append(result); 
				}
			});
		}  
		
	



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
                    <h2>View  Stock </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

  		<form id="studReport"  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
      
                            <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-6" for="first-name">Category <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                          <select class="form-control" name="Category" onChange="selectProduct(this.options[this.selectedIndex].value)" id="brand" required>
                 <option value="">Select Category</option>
                 <option value="Fire_Arms">Fire_Arms</option>
                 <option value="Components">Components</option>
                 <option value="Ammunations">Ammunations</option>
                    </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-6" for="last-name">Product Name <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                       		<select  class="form-control" onChange="selectAdds(this.options[this.selectedIndex].value)" name="PCode" id="product" required>
								<option value=""> Select Product </option>
    	               	    </select>
                            
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
		 	$Category=$_POST['Category'];
			$PCode=$_POST['PCode'];
		 ?>
<div id="printDiv2">  

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
         	<tr bgcolor='' style='font-weight:bold'>
            <td align='center' colspan="5">Total Stock on Date <?php echo date('d-m-Y'); ?> </td>
            </tr>
                      <thead>
                        <tr>
            <th align='center'>Category</th>
            <th align='center'>Product name</th>
            <th align='center'>Qty</th>
                   		</tr>
                      </thead>
		               <tbody>
           
          
         <?php
	$totalq=0;
	$sql="SELECT * FROM `stock` WHERE `PCode`='$PCode'";

		$res=mysql_query($sql);
				while($data=mysql_fetch_array($res)){
		$quantity=$data['quantity'];
		$Pdata=mysql_fetch_array(mysql_query("SELECT * FROM `product` WHERE `PCode`='$PCode'"));
		$PName=$Pdata['PName'];
		$Category=$Pdata['Category'];
		
				
				echo "<tr>
					<td>$Category</td>
					<td>$PName</td>
					<td>".$quantity."</td>
					</tr>";
					$totalq=$totalq+$quantity;

			}

		echo "<tr style='font-weight:bold;background-color:#000 !important; color:#FFF;' >
					<td colspan='2'>Product Total</td>

					<td>".$totalq." Nos</td>
					</tr>";
			?>
            
            </center>
	 </tbody>
                    </table>
    </div>
  					 
<?php						 
						 }
					 
			?>
	
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

<script type="text/javaScript">
	  function printing(){
	  document.getElementById("printDiv2").style.width='200mm';
	  document.getElementById("hideDiv1").style.display = "none";
	  document.getElementById("hideDiv2").style.display = "none";
	  document.getElementById("hideDiv3").style.display = "none";
	  document.getElementById("printbutton").style.display = "none";
	  window.print();
	  window.close();
	 }
  </script>	

    </body>
</html>