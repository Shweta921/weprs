<?php
session_start();
require_once("../config.php");
if(!isset($_SESSION['UserName']))
{
header("Location:../index.php");
}
       
$login=$_SESSION['UserName'];
$Category=$_POST['Category'];
$PName=$_POST['PName'];
$PRate=$_POST['PRate'];
$GST=$_POST['GST'];
$HSN=$_POST['HSN'];

$Unit='Nos';
$GTIN=$PCode=substr(uniqid(),6);;

$check=mysql_num_rows(mysql_query("select * from product WHERE `Category`='$Category' AND `PName`='$PName'"));
if($check==0)
{
	$sql="INSERT INTO `product`
	(`Category`, `PName`, `GTIN`, `PCode`, `Unit`, `HSN`, `PRate`, `GST`, `status`, `login`) VALUES 
('$Category', '$PName', '$GTIN', '$PCode', '$Unit', '$HSN', '$PRate', '$GST', '0', '$login')";
	
				$sql2="INSERT INTO `stock`
	(`Category`, `PName`, `GTIN`, `PCode`, `Unit`, `HSN`, `PRate`, `GST`, `quantity`, `login`) VALUES 
('$Category', '$PName', '$GTIN', '$PCode', '$Unit', '$HSN', '$PRate', '$GST', '0', '$login')";


			$res=mysql_query($sql);
			$res2=mysql_query($sql2);
			if($res && $res2)
			{
	 			echo"
<script>
window.alert('Data added succesfully');
window.location.href='add_product.php?id=0';
</script>";
$_SESSION['Error']="Data added succesfully";
			}

	else{
		
	echo"<script>
window.alert('Data adding error');
window.location.href='add_product.php?id=0';
</script>";		
		 }
}
	else{
					$_SESSION['Error']="Data Already Added";
					header("Location:add_product.php?id=0");
			
		 }



?>	