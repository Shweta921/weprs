<script>
 $('.inputs').keydown(function (e) {
     if (e.which === 13) {
		  e.preventDefault(); 
         var index = $('.inputs').index(this) + 1;
         $('.inputs').eq(index).focus();
     }
 });  

 $('.inputs').keydown(function (e) {
     if (e.which === 40) {
		  e.preventDefault(); 
         var index = $('.inputs').index(this) + 1;
         $('.inputs').eq(index).focus();
     }
 });  

 $('.inputs').keydown(function (e) {
     if (e.which === 38) {
		  e.preventDefault(); 
         var index = $('.inputs').index(this) - 1;
         $('.inputs').eq(index).focus();
     }
 });  
		  
</script>

<?php
session_start();
require_once("../config.php");
if(!isset($_SESSION['UserName']))
{
header("Location:../index.php");
}
$id=$_POST['id'];
if($id!='')
{

	$prodata=mysql_fetch_array(mysql_query("select * from product WHERE `PCode`='$id'  GROUP BY `PCode`")) or die(mysql_error);
	$Pcode=$prodata['PCode'];
	
	$HTML="<div class='form-group'>
                        <label for='mid' class='control-label col-md-3 col-sm-3 col-xs-12'>Quantity</label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
     <input id='mid' required class='form-control col-md-7 col-xs-12' type='text' name='quantity'  value=''>
                        </div>
           </div>
                     
					 
                      ";
	echo $HTML;	
	
	}
	
	
	

?>