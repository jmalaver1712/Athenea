
<script language="JavaScript" src="../plugins/auto/jquery-ui-1.8.13.custom.min.js"></script>
<?php 
require_once('../plugins/auto/auto.php'); 
?>
<link type="text/css" href="../plugins/auto/styleauto.css" rel="stylesheet" />



<!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">Athenea</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">Athenea</span>
  </a>


<nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
		  
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
				
			
              <!-- USUARIO -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $Acc_Nombre; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                    <?php echo $Acc_Nombre; ?>
                      <small><?php echo $Acc_Rect; ?></small>
                    </p>
                  </li>
                 
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="../index.php" class="btn btn-default btn-flat">Cerrar Sesion</a>
                    </div>
                  </li>
				  
                </ul>
              </li>
              
			  <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-plus-square"></i></a>
              </li>
			  
			  
            </ul>
          </div>
        </nav>