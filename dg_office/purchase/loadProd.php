<?php
session_start();
require_once("../config.php");
$id=$_POST['id'];
$qry="select * from `product` WHERE `Brand`='$id' GROUP BY `PCode` ORDER BY `PCode` ";
$res=mysql_query($qry);
if(!$res){
echo "error".mysql_error();
}

$check=mysql_num_rows($res);
if($check > 0){
	$HTML="<option value='New'> New Product </option>";
	while($row=mysql_fetch_array($res)){
		$HTML.="<option value='".$row['PCode']."'>".$row['PCode']." - ".$row['PName']."</option>";
	}
	echo $HTML;
}


?>                    