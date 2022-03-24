


  <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>WC</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>GDL</b>WebCamp</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?php $usuario = $_SESSION['usuario']; ?>
                  <span class="hidden-xs"><?php echo $usuario; ?></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                        <p>
                          Juan Pablo De la torre Valdez
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                          <a href="#" class="btn btn-default btn-flat">Cambiar Clave</a>
                        </div>
                        <div class="pull-right">
                          <a href="login.php?cerrar_sesion=true" class="btn btn-default btn-flat">Cerrar Sesión</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
      </div>
    </nav>
  </header>