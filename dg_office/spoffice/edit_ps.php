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

    <title>BKC INTERNATIONAL | Edit Counter </title>

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

	$id=$_GET['id'];
$res=mysql_query("SELECT * FROM `retail` WHERE `Id`='$id'");
				$data=mysql_fetch_array($res);
$id=$data['Id'];
$DID=$data['DId'];
$AId=$data['AId'];
$StCode=$data['Stcode'];
$FName=$data['FName'];
$CName=$data['CName'];
$email=$data['email'];
$phone=$data['phone'];
$GSTIN=$data['gstin'];
$add=$data['address'];
			
	$Ddata=mysql_fetch_array(mysql_query("select * from distributer WHERE `Id`=$DID"));
$Dname=$Ddata['FName'];
	$Adata=mysql_fetch_array(mysql_query("select * from area WHERE `Id`=$AId"));
$Aname=$Adata['AName'];
	$Sdata=mysql_fetch_array(mysql_query("select * from state WHERE `StCode`=$StCode"));
$State=$Sdata['StateName'];
							
?>


<!-- /page content -->

        <!-- /page content -->
 <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Retail Counter</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"  action="update_counter.php" >
     <input type="hidden" name="id" value="<?php echo $id;?>">
                 <div class="item form-group">
        	              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Distributer: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
		<select name="Distributer" id="Distributer" class="form-control" required>
     <option value="<?php echo $DID; ?>"><?php echo $Dname; ?></option>
                  <?php
								$resull=mysql_query("select * from distributer WHERE `Status`=0");
								while($rowDept=mysql_fetch_array($resull)){
									?>
									<option value="<?php echo $rowDept['Id']?>"><?php echo $rowDept['FName']?></option>
									<?php
								}
								?>
                 </select>
                 </div>
      </div>    
             <div class="item form-group">
        	              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Area: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
		<select name="Area" id="Area" class="form-control" required>
     <option value="<?php echo $AId; ?>"><?php echo $Aname; ?></option>
                  <?php
								$resullA=mysql_query("select * from area");
								while($rowDeptA=mysql_fetch_array($resullA)){
									?>
									<option value="<?php echo $rowDeptA['Id']?>"><?php echo $rowDeptA['AName']?></option>
									<?php
								}
								?>
                 </select>
                 </div>
      </div>    

                  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Firm Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="FName" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" value="<?php echo $FName;?>" data-validate-words="2" name="FName" required type="text" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Contact Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="CName" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" value="<?php echo $CName;?>" name="CName" required type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" value="<?php echo $email;?>" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
		               <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Contact Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="telephone" name="phone" required value="<?php echo $phone;?>" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="GSTIN">GSTIN <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="occupation" type="text" name="GSTIN" value="<?php echo $GSTIN;?>" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="textarea" required name="address" value="" class="form-control col-md-7 col-xs-12"><?php echo $add;?></textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">State <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
		<select name="state" id="state" class="form-control" required>
     <option value="<?php echo $StCode; ?>"><?php echo $State; ?></option>
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





    <script src="<?php echo $_SESSION['base_url']?>/../vendors/parsleyjs/dist/parsley.min.js"></script>
  
 <!-- Custom Theme Scripts -->
    <script src="<?php echo $_SESSION['base_url']?>/../build/js/custom.min.js"></script> 
	
  </body>
</html>
