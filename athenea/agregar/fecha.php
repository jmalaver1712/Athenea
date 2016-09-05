<?php require_once('../admin/locked.php'); ?>
<!DOCTYPE html>
<html>
<?php require_once('../menu/head.php'); ?> 

<body class="skin-blue sidebar-mini">
    <div class="wrapper">
	
      <!-- Main Header -->
		<header class="main-header">
		
		
		<!-- Parte de Arriba -->
		<?php require_once('../menu/nav.php'); ?>
		
		</header>
		
		<!-- COLUMNA DERECHA - MENU -->
		<?php require_once('../menu/header.php'); ?>

    <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	  
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
		  Agregar Capitulo
          </h1>	
        </section>

        <!-- Main content -->
		
		<section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                
                <div class="box-body">
					
					<?php
					$Id_Inves = $_GET['Id_Inves'];
					$Id_Grupo = $_GET['Id_Grupo'];
					//Investigador
					$inv = mysql_query("SELECT * FROM investigadores WHERE Id_Investigador = '$Id_Inves' ",$conexion)or die ("Error 1 ".$mysqli->error);
					$rowI= mysql_fetch_assoc($inv);
					//Grupo
					$grup = mysql_query("SELECT * FROM grupos WHERE Id_Grupo = '$Id_Grupo' ",$conexion)or die ("Error 1 ".$mysqli->error);
					$rowG= mysql_fetch_assoc($grup);
					?>
				<form action="../agregar/fechaphp.php" method="POST" enctype="multipart/form-data">
				<table width="100%" border="0">
					<tr>
					<td colspan="2"><h3><?php echo $rowI['Nombres']; ?></h3></td>
					</tr>
					<tr>
					<td colspan="2">Trayectoria en "<?php echo $rowG['Nombres']; ?>"<br><br></td>
					</tr>
					<tr>
					<td width="20%">Fecha de Ingreso</td>
					<td><input class="form-control" type="date" name="Fecha_Ini" id="Fecha_Ini"></td>
					</tr>
					<tr>
					<td>Fecha Final</td>
					<td><input class="form-control" type="date" name="Fecha_Fin" id="Fecha_Fin">
					Actualidad: <input type="checkbox" id="Fecha_Act">
					</td>
					</tr>
					<tr>
					<td colspan="2"><input class="btn btn-primary" type="button" onclick="Trayectoria()" value="Agregar"></td>
					</tr>
					<tr>
					<td>Trayectoria</td>
					<td>
					<script>
					function quitarF(n){
					var eliminar = document.getElementById("FechaTra"+n);
					var contenedor= document.getElementById("Trayecto");
					contenedor.removeChild(eliminar);
					}
					</script>
					<div id="Trayecto">
					<?php
					$Id_Inves = $_GET['Id_Inves'];
					$Id_Grupo = $_GET['Id_Grupo'];
					//Integrantes
					$query = mysql_query("SELECT * FROM fechas WHERE Id_Investigador = '$Id_Inves' AND Id_Grupo = '$Id_Grupo'",$conexion)or die ("Error 1 ".$mysqli->error);
					$aux=1;
					while($fec = mysql_fetch_assoc($query)){
					print("<div id='FechaTra".$aux."'>
					<input type='text' value='".$fec['Fechas_Ini']."' name='Fecha_Ini_Old".$aux."'>
					<input type='text' value='".$fec['Fechas_Fin']."' name='Fecha_Fin_Old".$aux."'>
					<a href='JavaScript:quitarF(".$aux.");'>Quitar</a>
					</div>");
					$aux++;
					}
					?>
					</div>
					<input type="hidden" value="<?php echo $rowI['Id_Investigador']; ?>" name="Id_Inves">
					<input type="hidden" value="<?php echo $rowG['Id_Grupo']; ?>" name="Id_Grupo">
					</td>
					</tr>
					<tr>
					<td colspan="2"><br><br><input class="btn btn-primary" type="submit" value="Guardar"></td>
					</tr>
				</table>
				</form>
					
					
					
				</div><!-- /.box-body -->
              </div><!-- /.box -->
			  
			  
			  
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
		
		
		
    </div><!-- /.content-wrapper -->

        <!-- Main Footer -->
	<?php
	require_once('../menu/footer.php');
	require_once('../menu/panel.php'); 	
	?>
		   
		   
    <div class='control-sidebar-bg'></div>
	
    </div><!-- ./wrapper -->
	
	<?php require_once('../menu/js_footer.php'); ?>
	
	
  </body>
</html>            	
