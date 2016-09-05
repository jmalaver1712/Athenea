<!DOCTYPE html>
<html>
<?php require_once('../menu/head.php'); ?> 
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="index2.html"><b>Sistema </b>Athenea</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Recuperar Contraseña</p>
        <form action="recuperar.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="usuario" placeholder="Usuario"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="mail" class="form-control" name="correo" placeholder="Correo electrónico"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <a href="../admin/index.php" class="btn btn-primary btn-block ban-flat">Atrás</a>
            </div><!-- /.col -->
<div class="col-xs-4">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Recuperar">
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>