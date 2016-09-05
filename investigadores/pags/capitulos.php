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
								$Id_Inves = $row['Id_Investigador'];
								$consultacap = $conexion->query("SELECT * FROM capitulo WHERE Id_Investigadores LIKE '%-$Id_Inves-%'  " )or die ("Error 1 ".$mysqli->error);
								$num4 = mysqli_num_rows($consultacap);
								?>
								<span> <?php echo $num4 ?> Capítulos encontrados</span><br><br>
								<p>
									<?php
									if($num4 == "0"){
										print("No se encuentran registros<br><br>");
									}
									else{
										print("
											<table class='ui table'>
												<thead>
													<tr>
														<th>Título</th>
														<th>Libro</th>
														<th>Editorial</th>
													</tr>
												</thead>
												<tbody>
													");
										while ($row4= $consultacap->fetch_assoc()){
											print("
												<tr>
													<td>".$row4['Titulo_Cap']."</td>
													<td>".$row4['Libro']."</td>
													<td>".$row4['Editorial']."</td>
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