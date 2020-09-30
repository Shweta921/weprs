<?php
session_start();
require_once("../config.php");

if(!isset($_SESSION['UserName']))
{
header("Location:../index.php");
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

    <title>Assam Police| Add Product </title>

    <!-- Bootstrap -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo $_SESSION['base_url']?>/../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo $_SESSION['base_url']?>/../build/css/custom.min.css" rel="stylesheet">



  </head>

         <?php 
require_once("../menu.php");
$id=$_SESSION['PCode']=$_GET['id'];
      $prodata=mysql_fetch_array(mysql_query("select * from product WHERE `PCode`='$id'")) or die(mysql_error);
	$Category=$prodata['Category'];
	$PName=$prodata['PName'];
	$GTIN=$prodata['GTIN'];
	$PRate=$prodata['PRate'];
	$GST=$prodata['GST'];
	$HSN=$prodata['HSN'];
						
?>


<!-- /page content -->

        <!-- /page content -->
 <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Product</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"  action="update_product.php" >


      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Category<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="Category" id="Category" required>
                 <option value="<?php echo $Category; ?>"><?php echo $Category; ?></option>
                 <option value="Fire_Arms">Fire_Arms</option>
                 <option value="Components">Components</option>
                 <option value="Ammunations">Ammunations</option>
                    </select>
                        </div>
                      </div>
                      
                      <div class='form-group'>
                        <label for='mid' class='control-label col-md-3 col-sm-3 col-xs-12'>Product Name</label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <input id='mid' required class='form-control col-md-7 col-xs-12'  value='<?php echo $PName; ?>'  type='text' name='PName'>
                        </div>
                      </div>
                  
                   <div class='form-group'>
                        <label for='mid' class='control-label col-md-3 col-sm-3 col-xs-12'>Purchase Rate</label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <input id='mid' required class='form-control col-md-7 col-xs-12' value="<?php echo $PRate; ?>" type='text' name='PRate'>
                        </div>
                      </div>
                      
                      <div class='form-group'>
                        <label for='mid' class='control-label col-md-3 col-sm-3 col-xs-12'>GST Rate</label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <input id='mid' required class='form-control col-md-7 col-xs-12' type='text' name='GST' value="<?php echo $GST; ?>">
                        </div>
                      </div>
                      
                      <div class='form-group'>
                        <label for='mid' class='control-label col-md-3 col-sm-3 col-xs-12'>HSN CODE</label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <input id='mid' required class='form-control col-md-7 col-xs-12' type='text' name='HSN' value="<?php echo $HSN; ?>">
                        </div>
                      </div>

                  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
</div>
</div>
        <!-- footer content -->
             <?php 
require_once("../footer.php");
?>

    <script src="<?php echo $_SESSION['base_url']?>/../vendors/parsleyjs/dist/parsley.min.js"></script>
     <!-- Custom Theme Scripts -->
    <script src="<?php echo $_SESSION['base_url']?>/../build/js/custom.min.js"></script> 
	
  </body>
</html>
