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

    <title>Assam Police| View Police Station  </title>

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

<script>
		function confirmclick(type,id) {
    if(type==1)
	{
	var answer = confirm ('Are you sure to delete the record?');
    if (answer) {	
	location.href = 'deleteps.php?link='+id;
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
 
 
 
 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Police Station Data</h2>
               
                <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Police Station Name</th>
                          <th>Contact Name</th>
                          <th>Contact No</th>
                          <th>Email-Id</th>
                          <th>Address</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Action</th>
                        </tr>
                      </thead>
		               <tbody>
             <?php

				$sql="SELECT * FROM `pstation` WHERE `status`='0' AND `SPId`='$SalesId'";
			$res=mysql_query($sql);
					$Count1=0;
				while($data=mysql_fetch_array($res)){
			$id=$data['Id'];
$SPId=$data['SPId'];
$FName=$data['PSName'];
$CName=$data['CName'];
$email=$data['email'];
$phone=$data['phone'];
$add=$data['address'];
$user=$data['Username'];
$password=$data['Password'];
			
			$SPdata=mysql_fetch_array(mysql_query("SELECT * FROM `spoffice` WHERE `Id`='$SPId'"));
			
								echo "<tr>
					
					<td>".$FName."</td>
					<td>".$CName."</td>
					<td>".$phone."</td>
					<td>".$email."</td>
					<td>".$add."</td>	
					<td>".$user."</td>	
					<td>".$password."</td>	
					<td><a href='javascript:void(0);' onclick='javascript:confirmclick(1,".$id.")'>
									<img src='../images/b_drop.png' title='Delete'>Delete</a> <a href='edit_ps.php?id=".$id."'>
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
    </body>
</html>