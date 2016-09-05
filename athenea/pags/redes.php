<?php require_once('../admin/locked.php'); ?>
<?php $Rectoria = $_GET['Sede']; ?>
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
					<?php echo $Rectoria; ?>
					<small>Sede o Rectoría</small>
				</h1>

				<?php				
				$url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
				$queryz = $conexion->query("SELECT * FROM redes WHERE Rectoria LIKE '%$Rectoria%' ORDER BY Nombre ASC")or die($mysqli->error);
				$num_total_registros = mysqli_num_rows($queryz);
				?>
				
			</section>

			<!-- Main content -->
			
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							
							<form action="redes.php" method="GET">
								<center>
									<br>
									<table width="80%">
										<tr>
											<td>
												<label>Ordenar por:</label>
											</td>
											<td valign="center">
												<input type="hidden" name="Sede" value="<?php echo $Rectoria; ?>">
												<select class="form-control" name="Campo">
													<option value="Rectoria">Rectoria</option>
													<option value="Sede">Sede</option>
													<option value="Tipo_Red">Tipo de Red</option>
													<option value="Tipo_Asociacion">Tipo de Asociacion</option>
													<option value="Centro_Adscrito">Centro Adscrito</option>
													<option value="Facultad">Facultad</option>
													<option value="Programa">Programa</option>
												</select>
											</td>
											<td valign="center">
												<input class="btn btn-primary" type="submit" value="Ordenar" ></center>
											</td>
										</tr>
									</table>
									<br>
								</form>
								
								
								<div id="consulta">
									<?php
									$query = "SELECT DISTINCT Rectoria FROM redes WHERE Rectoria LIKE '%$Rectoria%' ORDER BY Rectoria DESC";
									$Campo = "Rectoria";
									
									if(isset($_GET['Campo'])){
										$Campo = $_GET['Campo'];
										$query = "SELECT DISTINCT $Campo FROM redes WHERE Rectoria LIKE '%$Rectoria%' ORDER BY $Campo DESC";
									}
									
									$result = $conexion->query($query);
									$c=0;
									$total=0;
									while($row = $result->fetch_assoc()){
										$numero = 0;
										$categoria[$c] = $row[$Campo];
										$query2 = "SELECT * FROM redes WHERE $Campo = '$categoria[$c]' AND Rectoria LIKE '%$Rectoria%' ";
										
										$rr = $conexion->query($query2)or die($mysqli->error);
										$numero = mysqli_num_rows($rr);
										$datos[$c] = $numero;
										$c++;
									}
									
									for ($j=0;$j<=$c-1;$j++)
									{
										$por[$j]= $datos[$j];
									}  
									?>
									
									<script type="text/javascript">
										$(function () {
											var colors = Highcharts.getOptions().colors,
											categories = [<?php for($y=0;$y<=$c-1;$y++){ echo "'".$categoria[$y]."',";}?>],
			//Boton de Abajo
			name = 'redes',
			data = [
			<?php
			$w = 0;
			for($x=0;$x<=$c-1;$x++){
				$w++;
				if ($w == 9){
					$w = 0;
				}
				?>	
				{
					y: <?php echo $por[$x] ?>,
					color: colors[<?php echo $w ?>],                   
				}, 
				<?php }?>	   
				];
				
				function setChart(name, categories, data, color) {
					chart.xAxis[0].setCategories(categories, false);
					chart.series[0].remove(false);
					chart.addSeries({
						name: name,
						data: data,
						color: color
					}, false);
					chart.redraw();
				}
				
				var chart = $('#grafica').highcharts({
					chart: {
						type: 'column'
					},
					title: {
						text: 'Numero de redes'
					},
					xAxis: {
						categories: categories
					},
					credits: {
						enabled: false
					},
					plotOptions: {
						column: {
							cursor: 'pointer',
							point: {
								events: {
									click: function() {
										var drilldown = this.drilldown;
										if (drilldown) { 
											setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
										} else { 
											setChart(name, categories, data);
										}
									}
								}
							},
							dataLabels: {
								enabled: true,
								color: colors[0],
								style: {
									fontWeight: 'bold'
								},
								formatter: function() {
									return this.y;
								},
							}
						}
					},
					series: [{
						name: name,
						data: data
					}],
					exporting: {
						enabled: true
					}
				})
				.highcharts(); 
			});
		</script>
		<div id="grafica"></div>
		
		
	</div><!-- /.box --> 

	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?php echo $num_total_registros; ?> Registros</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
			
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30%">Nombre</th>
						<th width="20%">Representante</th>
						<th width="40%">Objetivo</th>
						<th width="10%">Filtro</th>
					</tr>
				</thead>
				<tbody>

					<?php	
					
					while ($row = $queryz->fetch_assoc()){
						
						$Id_Lider = $row['Id_Investigador'];
						$lider = $conexion->query("SELECT * FROM investigadores WHERE Id_Investigador = '$Id_Lider' ")or die ("Error 1 ".$mysqli->error);
						$con= $lider->fetch_assoc();
						
						print ("<tr>
							<td><a href='../ver/redes.php?Id=".$row['Id_Red']."'>$row[Nombre]</a></td>
							<td><a href='../ver/investigador.php?Id=".$row['Id_Investigador']."'>$con[Nombres]</a></td>
							<td>$row[Objetivo]</td>
							<td>$row[$Campo]</td>
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