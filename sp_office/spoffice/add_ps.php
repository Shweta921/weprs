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

    <title>ASSAM POLICE | Create Police Station </title>

    <!-- Bootstrap -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo $_SESSION['base_url']?>/../build/css/custom.min.css" rel="stylesheet">

		<script type= "text/javascript" src = "<?php echo $_SESSION['base_url']?>/js/countries.js"></script>

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
                    <h2>Create Police Station</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"  action="<?php echo $_SERVER['PHP_SELF'];?>" >
            
		<input name="spoffice" id="spoffice" class="form-control" type="hidden" value="<?php echo $SalesId; ?>" required>
  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Police Station Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="FName" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="PSName" required type="text">
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
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">User Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="CName" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="User" required type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="Pass" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>
     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
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
$SPId=$_POST['spoffice'];
$PSName=$_POST['PSName'];
$CName=$_POST['CName'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$add=$_POST['address'];
$Stcode=$_POST['state'];				
$User=$_POST['User'];
$Pass=$_POST['Pass'];

$check=mysql_num_rows(mysql_query("select * from pstation WHERE `PSName`='$PSName' AND `CName`='$CName'"));
if($check==0)
{				$sql="INSERT INTO `pstation`
(`PSName`, `CName`,`address`,`Stcode`,`phone`,`email`,`SPId`,`Username`,`Password`,`status`,`login`) VALUES 
('$PSName','$CName','$add','$Stcode','$phone','$email','$SPId','$User','$Pass','0','$login')";

			$res=mysql_query($sql) or die (mysql_error());
			if($res)
			{
	 			echo"
<script>
window.alert('Data added succesfully');
window.location.href='add_ps.php?id=0';
</script>
";
$_SESSION['Error']="Data added succesfully";
			}

	else{
					$_SESSION['Error']="Data adding error";
					header("Location:add_ps.php?id=0");
			
		 }
}
	else{
					$_SESSION['Error']="Data Already Added";
					header("Location:add_ps.php?id=0");
			
		 }

}
?>



    <script src="<?php echo $_SESSION['base_url']?>/../vendors/parsleyjs/dist/parsley.min.js"></script>
  
 <!-- Custom Theme Scripts -->
    <script src="<?php echo $_SESSION['base_url']?>/../build/js/custom.min.js"></script> 
	
  </body>
</html>
