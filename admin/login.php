<?php
  session_start();
  $cerrar_sesion = $_GET['cerrar_sesion'];
  if(isset($cerrar_sesion)) {
    session_destroy();
  }
  include_once 'templates/header.php' ; 
?>
<body class="hold-transition login-page">
<div class="login-box">

      <div class="login-logo">
            <a href="../index.php"><b>GDLWebCamp</b> Login</a>
      </div>

      <!-- /.login-logo -->
      <div class="login-box-body">
            <p class="login-box-msg">Iniciar Sesión</p>

            <form id="login" method="post" action="login-admin.php">
                  <div class="form-group has-feedback">
                    <input type="text" name="usuario" class="form-control" placeholder="Login">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12 col-md-6">
                      <input type="hidden" name="tipo" value="login">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
                    </div>
                    <!-- /.col -->
                  </div>
            </form>

      </div>
      <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php
  include_once 'templates/footer-scripts.php'; 
?>