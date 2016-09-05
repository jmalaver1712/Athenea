<?php require_once('../admin/locked.php'); ?>

<?php
$Id_Red = $_GET['Id'];
$consulta = $conexion->query("SELECT * FROM redes WHERE Id_Red = '$Id_Red'" )or die ("Error 1 ".$mysqli->error);
$row= $consulta->fetch_assoc();
?>

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
		  Red de Investigación
          </h1>	
        </section>

        <!-- Main content -->
		
		<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
				
					<ul class="nav nav-tabs">
					<li class="pull-right"><a onclick="return confirmDelete(this);" <?php echo "href='../eliminar/eliminar.php?Id=".$row['Id_Red']."&Tabla=redes&Campo=Id_Red'"; ?> class="text-muted"><i class="fa fa-close"></i></a></li>
					<li class="pull-right"><a <?php echo "href='../edit/redes.php?Id=".$row['Id_Red']."'" ?> class="text-muted"><i class="fa fa-edit"></i></a></li>
					</ul><br>
				
				<table border="0" width="100%">
				<tr>
				<td width="30%"><label>Nombre de la Red:</label></td>
				<td><?php echo $row['Nombre']; ?></td>
				</tr>
				
				<tr>
				<td><label>Sede:</label></td>
				<td>
				<?php echo $row['Sede']; ?></td>
				</tr>
				
				<tr>
				<td><label>*Representante por UNIMINUTO</label></td>
				<td><?php
				$Id_Inves = $row['Id_Investigador'];
				$query = $conexion->query("SELECT * FROM investigadores WHERE Id_Investigador = '$Id_Inves' ")or die ("Error 1 ".$mysqli->error);
				$inte = $query->fetch_assoc();
				print("<a href='../ver/investigador.php?Id=$Id_Inves'>".$inte['Nombres']."</a><br>");
				?></td>
				</tr>
				
				
				<tr>
				<td><label>Grupos de Investigación Asociados</label></td>
				<td><?php
				$Id_R = "%%".$Id_Red."%%";
				$grups = $conexion->query("SELECT * FROM grupos WHERE Id_Red LIKE '%$Id_R%' ")or die ("Error 1 ".$mysqli->error);
				while($grup = $grups->fetch_assoc()){
				$Id_Grupo = $grup['Id_Grupo'];
				print("<a href='../ver/grupo.php?Id=$Id_Grupo'>".$grup['Nombres']."</a><br>");
				}
				?></td>
				</tr>
				
				
				<tr>
				<td><label>Fecha de Inicio</label></td>
				<td><?php echo $row['Fecha_Inicio']; ?></td>
				</tr>
				
				<tr>
				<td><label>Fecha de Renovación</label></td>
				<td><?php echo $row['Fecha_Renovacion']; ?></td>
				</tr>
				
				<tr>
				<td><label>Pagina Web</label></td>
				<td><?php print("<a target='_blank' href='".$row['Pagina_Web']."'>Mayor Información</a>"); ?></td>
				</tr>
				
				<tr>
				<td><label>Tipo de Red</label></td>
				<td>
				<?php echo $row['Tipo_Red']; ?>
				</td>
				</tr>
				
				<tr>
				<td><label>Tipo de Asociación</label></td>
				<td>
				<?php echo $row['Tipo_Asociacion']; ?>
				</td>
				</tr>
				
				<tr>
				<td><label>Costo de Afiliación</label></td>
				<td><?php echo $row['Costo_Afiliacion']; ?></td>
				</tr>
				
				<tr>
				<td><label>Centro Adscrito</label></td>
				<td><?php echo $row['Centro_Adscrito']; ?></td>
				</tr>
				
				<tr>
				<td><label>Facultad o Unidad:</label></td>
				<td>
				<?php echo $row['Facultad']; ?>
				</td>
				</tr>
				
				<tr>
				<td><label>Programa:</label></td>
				<td><?php echo $row['Programa']; ?></td>
				</tr>
				
				<tr>
				<td><label>Constitución Juridica</label></td>
				<td><?php echo $row['Constitucion']; ?></td>
				</tr>
				
				<tr>
				<td><label>Objetivo:</label></td>
				<td><p style="text-align:justify"><?php echo $row['Objetivo']; ?></p></td>
				</tr>
				
				<tr>
				<td><label>Compromisos</label></td>
				<td><p style="text-align:justify"><?php echo $row['Compromisos']; ?></p></td>
				</tr>
				
				<tr>
				<td><label>Importancia de Pertenecer<br> a la Red</label></td>
				<td><p style="text-align:justify"><?php echo $row['Importancia']; ?></p></td>
				</tr>
				
				<tr>
				<td><label>Logros</label></td>
				<td><p style="text-align:justify"><?php echo $row['Logros']; ?></p></td>
				</tr>
				
				<tr>
				<td><label>Observaciones</label></td>
				<td><p style="text-align:justify"><?php echo $row['Observaciones']; ?></p></td>
				</tr>
				
				<tr>
				<td colspan="2" align="right"><?php echo "<font size='-1'>".$row['Ult_Registro']."</font>"; ?></td>
				</tr>
				
				</table>
				
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