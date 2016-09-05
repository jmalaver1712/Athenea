<!DOCTYPE html>
<html>
<?php require_once('../menu/head.php'); ?> 
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="index2.html"><b>Sistema </b>Athenea</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Inicio de Sesión<br>Solo investigadores<br></p>
        <form action="ingreso.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="usuario" placeholder="Número de cédula"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Recordarme
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Ingresar">
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../../athenea/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../athenea/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../../athenea/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
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