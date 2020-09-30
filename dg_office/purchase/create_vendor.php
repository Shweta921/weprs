<?php
session_start();
require_once("../config.php");

if(!isset($_SESSION['UserName']))
{
header("Location:../index.php");
}
else
{
	$login=$name=$_SESSION['UserName'];
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

    <title>Assam_Police| Create Vendor </title>

    <!-- Bootstrap -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo $_SESSION['base_url']?>/../build/css/custom.min.css" rel="stylesheet">

		<script type= "text/javascript" src = "<?php echo $_SESSION['base_url']?>/js/countries.js"></script>
<!-- Datatables -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<script>
		function confirmclick(type,id) {
    if(type==1)
	{
	var answer = confirm ('Are you sure to delete the record?');
    if (answer) {	
	location.href = 'deletevendor.php?link='+id;
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
                    <h2>Create Vendor</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"  action="<?php echo $_SERVER['PHP_SELF'];?>" >

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Firm Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
 <input id="FName" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="FName" required type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Contact Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
 <input id="CName" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="CName" required type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
              <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Contact Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="telephone" name="phone" required data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="GSTIN">GSTIN <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="occupation" type="text" name="GSTIN" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="textarea" required name="address" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">State <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
		<select name="state" id="state" class="form-control" required>
<option value="">Select</option>
<?php 
$query =mysql_query("SELECT * FROM state");
while($row=mysql_fetch_array($query))
{ ?>
<option value="<?php echo $row['StCode'];?>"><?php echo $row['StateName'];?></option>
<?php
}
?>
</select>        </div>
                      </div>
                      <!-- <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">User Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="CName" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="user" required type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>-->
                     
                     

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button id="send" type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
           


 
 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Vendor Data</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Firm Name</th>
                          <th>Client Name</th>
                          <th>GSTIN</th>
                          <th>Contact No</th>
                          <th>Email-Id</th>
                          <th>Address</th>
                          <th>Action</th>
                        </tr>
                      </thead>
		               <tbody>
             <?php

				$sql="SELECT * FROM `vendor` WHERE `status`='0'";
			$res=mysql_query($sql);
					$Count1=0;
				while($data=mysql_fetch_array($res)){
			$id=$data['Id'];
$FName=$data['FName'];
$CName=$data['CName'];
$email=$data['email'];
$phone=$data['phone'];
$GSTIN=$data['gstin'];
$add=$data['address'];
			
								echo "<tr>
					
					<td>".$FName."</td>
					<td>".$CName."</td>
					<td>".$GSTIN."</td>
					<td>".$phone."</td>
					<td>".$email."</td>
					<td>".$add."</td>	
					<td><a href='javascript:void(0);' onclick='javascript:confirmclick(1,".$id.")'>
									<img src='../images/b_drop.png' title='Delete'>Delete</a> <a href='edit_vendor.php?id=".$id."'>
									<img src='../images/b_edit.png' title='Edit'>Edit</a>
					</td>
						</tr>";
				}

			

			?>
                     </tbody>
                    </table>
                  </div>
                </div>
              </div>

 
  </div>
 

        <!-- footer content -->
             <?php 
require_once("../footer.php");
?>


 <?php
   
////////////////////////////////////////All Site report //////////////////////////////////////////////////////////
        if(isset($_POST['submit']))
		 {
			$FName=$_POST['FName'];
$CName=$_POST['CName'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$GSTIN=$_POST['GSTIN'];
$add=$_POST['address'];
$Stcode=$_POST['state'];				

$check=mysql_num_rows(mysql_query("select * from vendor WHERE `FName`='$FName' AND `CName`='$CName' AND `gstin`='$GSTIN'"));
if($check==0)
{				$sql="INSERT INTO `vendor`
(`FName`, `CName`,`address`,`Stcode`,`phone`,`gstin`,`email`,`status`,`login`) VALUES 
('$FName','$CName','$add','$Stcode','$phone','$GSTIN','$email','0','$login')";

			$res=mysql_query($sql) or die (mysql_error());
			if($res)
			{
	 			echo"
<script>
window.alert('Data added succesfully');
window.location.href='create_vendor.php?id=0';
</script>
";
$_SESSION['Error']="Data added succesfully";
			}

	else{
					$_SESSION['Error']="Data adding error";
					header("Location:create_vendor.php?id=0");
			
		 }
}
	else{
					$_SESSION['Error']="Data Already Added";
					header("Location:create_vendor.php?id=0");
			
		 }

}
?>



    <script src="<?php echo $_SESSION['base_url']?>/../vendors/parsleyjs/dist/parsley.min.js"></script>
  
 <!-- Custom Theme Scripts -->
    <script src="<?php echo $_SESSION['base_url']?>/../build/js/custom.min.js"></script> 
	
  </body>
</html>
