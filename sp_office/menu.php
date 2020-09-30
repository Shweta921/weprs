
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo $_SESSION['base_url']?>/home.php" class="site_title"><i class="fa fa-paw"></i> <span>Assam_Police</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo $_SESSION['base_url']?>/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $name; ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo $_SESSION['base_url']?>/home.php">Dashboard</a></li>
                     </ul>
                  </li>
                  <li><a><i class="fa fa-suitcase"></i> Setup <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       <!-----------==================Setup=============================-------->
                  <li><a href="<?php echo $_SESSION['base_url']?>/spoffice/add_ps.php?id=0">Add Police Station</a></li>
                  <li><a href="<?php echo $_SESSION['base_url']?>/spoffice/view_ps.php">View Police Station</a></li>
                  
                    </ul>
                  </li>
                
                 
                  <li><a><i class="fa fa-suitcase"></i> Inward <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <!-----------==================purchase =============================-------->
                  <li><a href="<?php echo $_SESSION['base_url']?>/spoffice/purchase_order.php?id=0">Create Request Order</a></li>
                  <li><a href="<?php echo $_SESSION['base_url']?>/spoffice/view_ro.php">View Request Order</a></li>
                  <li><a href="<?php echo $_SESSION['base_url']?>/spoffice/view_purchase.php?id=0">View Inwards </a></li>
                    </ul>
                  </li>

            <li><a><i class="fa fa-suitcase"></i> Warehouse <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
		 
                  <!-----------==================Warehouse=============================-------->
                  <li><a href="<?php echo $_SESSION['base_url']?>/spoffice/stock.php">View Stock</a></li>
  		            </ul>
            </li>
      
            <li><a><i class="fa fa-suitcase"></i> Dispatch <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
   <!-----------==================Dispatch=============================-------->
                  <li><a href="<?php echo $_SESSION['base_url']?>/spoffice/request_order.php">New Request Order</a></li>
                  <li><a href="<?php echo $_SESSION['base_url']?>/spoffice/view_pro.php">View PS RO</a></li>
                  <li><a href="<?php echo $_SESSION['base_url']?>/spoffice/create_dispatch.php">Create Dispatch</a></li>
                  <li><a href="<?php echo $_SESSION['base_url']?>/spoffice/view_dispatch.php">View Dispatch</a></li>
                    </ul>
            </li>
              



               	     </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
            <!--  <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
            -->  <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo $_SESSION['base_url']?>/logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
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
        <div class="right_col" role="main">
 
 
 
       