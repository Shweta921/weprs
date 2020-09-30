<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

ob_start(); 
system('ipconfig /all');
$mycom=ob_get_contents(); 
ob_clean(); 
$findme = "Physical";
$pmac = strpos($mycom, $findme); 
$mac=substr($mycom,($pmac+36),17);
echo $mac;

?>
</body>
</html>