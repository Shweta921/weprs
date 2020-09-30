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
$_SESSION['spoffice']="";
$_SESSION['pstation']="";
$_SESSION['challan']="";
$_SESSION['id1']="";
	}
if(!isset($_SESSION['date']))
{
	$_SESSION['date']="";

	}
if(!isset($_SESSION['spoffice']))
{
	$_SESSION['spoffice']="";

	}
if(!isset($_SESSION['pstation']))
{
	$_SESSION['pstation']="";

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

    <title>Assam Police| Add Request Order </title>

    <!-- Bootstrap -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo $_SESSION['base_url']?>/../build/css/custom.min.css" rel="stylesheet">

 <!-- Custom Theme Style -->
    <link href="../css/rockox.css" rel="stylesheet">

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
			$("#shade").html("<option value=''> Select Product </option>");
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
				$("#shade").html("<option value=''> Select Product </option>");  
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


function selectDist(id){
	if(id!="-1"){
		loadDist(id);
		$("#dst").html(""); 
	}
	else{
	}
}

function selectDist(loadId){
	var dataString = 'id='+ loadId;
	
	$.ajax({
		type: "POST",
		url: "loadDist.php",
		data: dataString,
		cache: false,
		success: function(result){
		
		$("#dst").append(result); 
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
	location.href = 'deletetemprpo.php?link='+id;
	}
	}
    else if(type==2)
	{
	var answer = confirm ('Are you sure to clear all?');
    if (answer) {
	location.href = 'truncrpo.php';
	}
	}
}

							  	  
</script>

  </head>

         <?php 
require_once("../menu.php");

$Rcnt=mysql_num_rows(mysql_query("SELECT * FROM pspotemp"));
if($Rcnt==0)
{
	$_SESSION['DistId']="";
	}
	
	
if($_SESSION['id1']=="")
{
$chdata=mysql_fetch_array(mysql_query("SELECT MAX(challan) FROM pstationpo"));
$_SESSION['id1']=$Nch=$chdata[0]+1;
}
?>


<!-- /page content -->

        <!-- /page content -->
 <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Police Station PO</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"  action="savetemprpo.php" >
                    
			<input class="form-control"  name="challan" type="hidden" value="<?php echo $_SESSION['id1'];?>" readonly>
                        
                <label class="control-label col-md-1 col-sm-1 col-xs-6" for="name">SP Office <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                       <?php if($_SESSION['spoffice']=="")
				{
					?>
                        <select name="spoffice" id="spoffice" class="form-control" onChange="selectDist(this.options[this.selectedIndex].value)" required>
				<option value="">Select SP Office</option>
			<?php 
		$query =mysql_query("SELECT * FROM spoffice WHERE status=0 ORDER BY `FName`");
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
	$Did=$_SESSION['spoffice'];
	$Ddata=mysql_fetch_array(mysql_query("SELECT * FROM spoffice WHERE `Id`='$Did'"));
		 echo $Ddata['FName'];
	}
	?>               
                       </div>
                       
                <label class="control-label col-md-1 col-sm-1 col-xs-6" for="name">PS<span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                       <?php if($_SESSION['pstation']=="")
				{
					?>
                        <select name="pstation" id="pstation" class="form-control" required>
				<option value="">Select Police Station</option>
			<?php 
		$query =mysql_query("SELECT * FROM pstation WHERE status=0 ORDER BY `PSName`");
		while($row=mysql_fetch_array($query))
			{ ?>
			<option value="<?php echo $row['Id'];?>"><?php echo $row['PSName'].", ".$row['CName']; ?></option>
			<?php
			}
			?>
						</select>  
      <?php
}
else
{
	$Rid=$_SESSION['pstation'];
	$Rdata=mysql_fetch_array(mysql_query("SELECT * FROM pstation WHERE `Id`='$Rid'"));
		 echo $Rdata['PSName'];
	}
	?>               
                       </div>
          
                       
                       <label class="control-label col-md-1 col-sm-1 col-xs-6" for="name">Date <span class="required">*</span></label>
                        
                       <div class='input-group date col-md-2 col-sm-2 col-xs-5' id='myDatepicker1'> 
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
								<option value=""> Select Product </option>
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
                            $cds=mysql_num_rows(mysql_query("SELECT * FROM `pspotemp` WHERE `login`='$login'"));
                            if($cds!=0)
{
?>
 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Police Station PO Data</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr no.</th>
                          <th>Category</th>
                          <th>Product Name</th>
                          <th>Qty</th>
                           <th>Action</th>
                        </tr>
                      </thead>
		               <tbody>
             <?php

				/*$sql="SELECT * FROM `pspotemp` WHERE `login`='$login'";
				$res=mysql_query($sql);
					$GTAmount=$Count2=0;
					$i=1;
				while($data=mysql_fetch_array($res)){
				$PCode=$data['PCode'];

				*/
				$sql2="SELECT * FROM `pspotemp` WHERE `login`='$login'";
				$res2=mysql_query($sql2);
					$TAmount=$Count1=0;
					$i=1;
				while($data2=mysql_fetch_array($res2)){
$id=$data2['Id'];
$Qty=$data2['quantity'];
$Count1=$Count1+$Qty;
$PCode=$data2['PCode'];
$Pdata=mysql_fetch_array(mysql_query("SELECT * FROM `product` WHERE `PCode`='$PCode'"));
$PName=$Pdata['PName'];
$Category=$Pdata['Category'];

			
								echo "<tr>
					
					<td>".$i++."</td>
					<td>".$Category."</td>
					<td>".$PName."</td>
					<td>".$Qty."</td>
					<td><a href='javascript:void(0);' onclick='javascript:confirmclick(1,".$id.")'>
									<img src='../images/b_drop.png' title='Delete'>Delete</a>
					</td>
					
						</tr>";
				}
								echo "<tr>
					
					<td colspan='3'><strong>Total</strong></td>
					<td><strong>$Count1 Nos</strong></td>
						</tr>";

			?>
                     </tbody>
                    </table>
                  </div>
                  <form action="saverpo.php" method="post"  name="form1">
                <input type="hidden" value="<?php echo $_SESSION['id1'];?>" name="challan">
		           <button type='submit' class='btn btn-primary' name='submit2'>Make PO Entry</button>
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
    <script src="<?php echo $_SESSION['base_url']?>/../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<script src="../js/responsiveslides.min.js"></script>
	
	<script>
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
   <script>
  $(function() {

  $(".numbers-row").append('<div class="inc button">+</div><div class="dec button">-</div>');

  $(".button").on("click", function() {

    var $button = $(this);
    var oldValue = $button.parent().find("input").val();

    if ($button.text() == "+") {
  	  var newVal = parseFloat(oldValue) + 1;
  	} else {
	   // Don't allow decrementing below zero
      if (oldValue > 0) {
        var newVal = parseFloat(oldValue) - 1;
	    } else {
        newVal = 0;
      }
	  }

    $button.parent().find("input").val(newVal);

  });

});
</script>
	
  </body>
</html>
