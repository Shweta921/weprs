<?php
session_start();
require_once("../config.php");

if(!isset($_SESSION['UserName']))
{
header("Location:../index.php");
}
else
{
	$name=$login=$_SESSION['UserName'];
}

if($_GET['id']==0)
{$_SESSION['date']="";
$_SESSION['vendor']="";
$_SESSION['challan']="";
	}
if(!isset($_SESSION['date']))
{
	$_SESSION['date']="";

	}
if(!isset($_SESSION['vendor']))
{
	$_SESSION['vendor']="";

	}
if(!isset($_SESSION['count']))
{
	$_SESSION['count']=0;
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

    <title>Assam Police| Add Purchase Inward </title>

    <!-- Bootstrap -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo $_SESSION['base_url']?>/../build/css/custom.min.css" rel="stylesheet">

<!-- bootstrap-daterangepicker -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    
    


 <script type="text/javascript">
	
		function selectShade(id){
		if(id!="-1")
		{
			loadData1(id);	
		}
		else
		{
			$("#shade").html("<option value='-1'> Select Product </option>");
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
				$("#shade").html("<option value='-1'> Select Product </option>");  
					$("#shade").append(result); 
				}
			});
		}  
		
/////////////////1/////////////////////


		
	function selectAdds(id){
	if(id!="-1"){
		loadData(id);
		$("#divPrint").html(""); 
	}
	else{
	}
}

function loadData(loadId){
	var dataString = 'id='+ loadId;
	
	$.ajax({
		type: "POST",
		url: "loadbox.php",
		data: dataString,
		cache: false,
		success: function(result){
		
		$("#divPrint").append(result); 
		}
	});
}  
//////////////////////////////////////	
//////////////////////////////////////	
		  
		  	function confirmclick(type,id) {
    if(type==1)
	{
	var answer = confirm ('Are you sure to delete the record?');
    if (answer) {	
	location.href = 'deletetempinward.php?link='+id;
	}
	}
    else if(type==2)
	{
	var answer = confirm ('Are you sure to clear all?');
    if (answer) {
	location.href = 'truncprod.php';
	}
	}
}				  	  
</script>


  </head>

         <?php 
require_once("../menu.php");

$chdata=mysql_fetch_array(mysql_query("SELECT MAX(challan) FROM purchase"));
$_SESSION['id1']=$Nch=$chdata[0]+1;

?>


<!-- /page content -->

        <!-- /page content -->
 <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Purchase Inward</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"  action="savetempinward.php" >
			
            		<div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-6" for="name">Purchase Inward No. <span class="required">*</span>
                        </label>
                        <div class="col-md-1 col-sm-1 col-xs-6">
                         <input class="form-control"  name="challan" type="text" value="<?php echo $_SESSION['id1'];?>" readonly>
                        </div>
                       
                       
                       
                      
                <label class="control-label col-md-1 col-sm-1 col-xs-6" for="name">Vendor <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                       <?php if($_SESSION['vendor']=="")
				{
					?>
                        <select name="vendor" id="vendor" class="form-control" required>
				<option value="">Select</option>
			<?php 
		$query =mysql_query("SELECT * FROM vendor WHERE status=0");
		while($row=mysql_fetch_array($query))
			{ ?>
			<option value="<?php echo $row['Id'];?>"><?php echo $row['FName'];?></option>
			<?php
			}
			?>
						</select>  
      <?php
}
else
{
	$vid=$_SESSION['vendor'];
	$vdata=mysql_fetch_array(mysql_query("SELECT * FROM vendor WHERE `Id`='$vid'"));
		 echo $vdata['FName'];
	}
	?>               
                       </div>
                       
                       
                       
                       <label class="control-label col-md-1 col-sm-1 col-xs-6" for="name">Date <span class="required">*</span></label>
                        
                       <div class='input-group date col-md-2 col-sm-2 col-xs-6' id='myDatepicker1'> 
                         <?php 
	if($_SESSION['date']=="")
	{
	?>
        <input type='text' class="form-control"  name="pdate" placeholder="YYYY-MM-DD" required />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                       
                                    <?php
	}
	else
	{ echo $_SESSION['date'];
	}
								 ?>
 						 </div>
                   
                        
                    </div>
                      
                      
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="brand" onChange="selectShade(this.options[this.selectedIndex].value)" id="brand" required>
               <option value="">Select Category</option>
                 <option value="Fire_Arms">Fire_Arms</option>
                 <option value="Components">Components</option>
                 <option value="Ammunations">Ammunations</option>
                      </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Product Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       		<select  class="form-control" onChange="selectAdds(this.options[this.selectedIndex].value)" name="PCode" id="shade">
								<option value="-1"> Select Product </option>
    	               	    </select>
                            
                            </div>
                          </div>

        <div id="divPrint">
        </div>

                  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
           




<?php
                            $cds=mysql_num_rows(mysql_query("SELECT * FROM `inwardtemp` WHERE `login`='$login'"));
                            if($cds!=0)
{
?>
 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Purchase Inward Data</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr no.</th>
                          <th>Product Name</th>
                          <th>Rate</th>
                          <th>Qty</th>
                          <th>Amount</th>
                           <th>Action</th>
                        </tr>
                      </thead>
		               <tbody>
             <?php

				$sql="SELECT * FROM `inwardtemp` WHERE `login`='$login' GROUP BY `PCode`";
				$res=mysql_query($sql);
					$GTAmount=$Count2=0;
					$i=1;
					$TAmount=$Count1=0;
				while($data2=mysql_fetch_array($res)){
				$PCode=$data2['PCode'];
$id=$data2['Id'];
$Qty=$data2['quantity'];
$PRate=$data2['PRate'];
$Count1=$Count1+$Qty;
$Count2=$Count2+$Qty;
$Amount=$PRate*$Qty;
$TAmount=$TAmount+$Amount;
$GTAmount=$GTAmount+$Amount;
$Pdata=mysql_fetch_array(mysql_query("SELECT * FROM `product` WHERE `PCode`='$PCode'"));
$PName=$Pdata['PName'];

			
					echo "<tr>
					<td>".$i++."</td>
					<td>".$PName."</td>
					<td>".$PRate."</td>
					<td>".$Qty."</td>
					<td>".$Amount."</td>
					<td><a href='javascript:void(0);' onclick='javascript:confirmclick(1,".$id.")'>
									<img src='../images/b_drop.png' title='Delete'>Delete</a>
					</td>
					
						</tr>";
				}
			echo"<tr style='font-weight:bold;background-color:#000 !important; color:#FFF;' >	
			<td colspan='3'><strong>Grand Total</strong></td>
					<td><strong>$Count2 Nos</strong></td>
					<td><strong>Rs. $GTAmount /-</strong></td>
						</tr>";
			

			?>
                     </tbody>
                    </table>
                  </div>
                  <form action="makeinwardch.php" method="post"  name="form1">
                <input type="hidden" value="<?php echo $_SESSION['id1'];?>" name="challan">
		   	<div class="item form-group">
        <label class="control-label col-md-2 col-sm-2 col-xs-6" for="name">Bill No. <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-6">
          <input class="form-control"  name="bill_no" type="text" required >
                        </div>
                </div>    
	             <button type='submit' class='btn btn-primary' name='submit2'>Make Entry</button>
				</form> 
                </div>
              </div>

<?php
}
?>
</div> </div>
        <!-- footer content -->
             <?php 
require_once("../footer.php");
?>

    <script src="<?php echo $_SESSION['base_url']?>/../vendors/parsleyjs/dist/parsley.min.js"></script>
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
