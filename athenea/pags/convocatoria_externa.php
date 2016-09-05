<?php require_once('../admin/locked.php'); 
$url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
?>
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
            Convocatorias Externas
          </h1>

            <?php				
				$query = $conexion->query("SELECT * FROM externas ORDER BY fecha_fin DESC")or die($mysqli->error);
				$num_total_registros = mysqli_num_rows($query);
            ?>
			
        </section>

        <!-- Main content -->
		
		<section class="content">
          <div class="row">
            <div class="col-xs-12">
				<div class="box">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $num_total_registros; ?> Registros</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                
				<table id="example1" class="table table-bordered table-striped">
				<thead>
				<tr>
				<th width="30%">Imagen</th>
				<th width="20%">Titulo</th>
				<th width="20%">Oferente</th>
				<th width="40%">Destinatarios</th>
				<th width="10%">Fecha Finalizacion</th>
				</tr>
				</thead>
				<tbody>
				<?php	
					while ($row = $query->fetch_assoc()){
						print ("<tr>
						<td><img src='../documentos/convocatorias/externas/".$row['imagen']."' width='80%' /></td>
						<td><a href='../ver/convocatoria_externa.php?Id=".$row['Id_externas']."'>".$row['titulo']."</a></td>
						<td>".$row['oferente']."</td>
						<td>".$row['destinatarios']."</td>
						<td>".$row['fecha_fin']."</td>
						</tr>");
					}
				?>

				</tbody>
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