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
								<?php
								$consultal = $conexion->query("SELECT * FROM libro WHERE Autores LIKE '%-$Id_Inves-%' " )or die ("Error 1 ".$mysqli->error);
								$num1 = mysqli_num_rows($consultal);
								?>
								<span> <?php echo $num1 ?> Libros encontrados</span><br><br>
								<p>
									<?php
									if($num1 == "0"){
										print("No se encuentran registros<br><br>");
									}
									else{
										print("
											<table class='ui table'>
												<thead>
													<tr>
														<th>Título</th>
														<th>Año</th>
														<th>Palabras Claves</th>
													</tr>
												</thead>
												<tbody>
													");
										while ($row1= $consultal->fetch_assoc()){
											print("
												<tr>
													<td>".$row1['Titulo']."</td>
													<td>".$row1['Ano']."</td>
													<td>".$row1['Palabras_Claves']."</td>
												</tr>
												");
										}
										print("</tbody></table>");
									}							
									?>
								</p>
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