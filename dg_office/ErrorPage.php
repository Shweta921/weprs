<?php
session_start();
if(!isset($_SESSION['msg']))
{
$_SESSION['msg']="";
}
else
{
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Login Page | BKC INTERNATIONAL</title>

  <!-- Bootstrap CSS -->
  <link href="../login/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="../login/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="../login/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="../login/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="../login/css/style.css" rel="stylesheet">
  <link href="../login/css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" method="post" action="login.php">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        
		<section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" style='text-align:center; color:#000 !important;' class="animate form">
                            <h2><?php echo $_SESSION['value'];?>
                            <br>
                            <a href="index.php" style='color:#FFF !important;  font-weight:bold  !important;' >Click here</a> 
							<br>
                            to login again...
                            <br>
                            </h2>
                        </div>
						
                    </div>
                </div>  
            </section>
			
      </div>
    </form>
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
      
	        </div>
    </div>
  </div>


</body>

</html>
