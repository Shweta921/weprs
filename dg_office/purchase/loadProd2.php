<?php
session_start();
require_once("../config.php");
	$id=$_POST['id'];
$qry="select * from `product` WHERE `Category`='$id' AND `Status`=0 ORDER BY `PName` ";
$res=mysql_query($qry);
if(!$res){
echo "error".mysql_error();
}

$check=mysql_num_rows($res);
if($check > 0){
	$HTML="";
	while($row=mysql_fetch_array($res)){
		$HTML.="<option value='".$row['PCode']."'>".$row['PName']."</option>";
	}
	echo $HTML;
}
?>                    