
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <!-- top navigation -->
        <div class="">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
              <a href="<?php echo $_SESSION['base_url']?>/home.php" class=""><i class="fa fa-paw"></i> <span>BKC_INTERNATIONAL</span></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $_SESSION['base_url']?>/images/img.jpg" alt=""><?php echo $name; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="<?php echo $_SESSION['base_url']?>/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="" role="main">
 
 
 
       