<?php require_once('../admin/locked.php'); ?>
<?php $Doc = validar_id($_GET['Doc']); ?>
<!DOCTYPE html>
<html>
<?php require_once('../menu/head.php'); ?> 

<body class="skin-blue sidebar-mini">
	<div class="wrapper">
		
		<!-- Main Header -->
		<header class="main-header">
			<?php require_once('../menu/logo.php'); ?>
			
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
					<small>Investigador</small>
				</h1>
				<?php
				$inv = $conexion->query("SELECT * FROM investigadores WHERE Documento = '$Doc' ")or die ("Error 1 ".$mysqli->error);
				$row= $inv->fetch_assoc();
				?>
			</section>

			<!-- Main content -->
			
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							
							
						</div><!-- /.box --> 

						<div class="box">
							<div class="box-header">
								<h3 class="box-title"><i class="inbox icon"></i><?php echo $row['Nombres']; ?></h3>
							</div><!-- /.box-header -->
							<div class="box-body">
								<a class="ui ribbon label red">Semilleros</a>
								<?php
								$consultasemi = $conexion->query("SELECT * FROM semilleros WHERE Id_Investigador = '$Id_Inves' OR Id_Investigadores LIKE '%-$Id_Inves-%'" )or die ("Error 1 ".$mysqli->error);
								$num6 = mysqli_num_rows($consultasemi);
								?>
								<span> <?php echo $num6 ?> Semilleros encontrados</span><br><br>
								<p>
									<?php
									if($num6 == "0"){
										print("No se encuentran registros<br><br>");
									}
									else{
										print("
											<table class='ui table'>
												<thead>
													<tr>
														<th>Nombre</th>
														<th>Descripción</th>
														<th>Creación</th>
													</tr>
												</thead>
												<tbody>
													");
										while ($row6 = $consultasemi->fetch_assoc()){
											print("
												<tr>
													<td>".$row6['Nombres']."</td>
													<td>".$row6['Descripcion']."</td>
													<td>".$row6['Ano']."</td>
												</tr>
												");
										}
										print("</tbody></table>");
									}							
									?>
								</div>
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