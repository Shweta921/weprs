<?php
session_start();
require_once("../config.php");

if ($id=$_GET['link'])
{
$qry="UPDATE `product` SET `status`='1' WHERE `PCode`='$id'";
$result=mysql_query($qry);
if(!$result)
{
$err=$_SESSION['Error']=mysql_error();
echo"<script>
window.alert('$err');
window.location.href='view_product.php';
</script>
";
}
else
{
echo"<script>
window.alert('Product Dactivated succesfully');
window.location.href='view_product.php';
</script>
";
}
}
?>