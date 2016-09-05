<?php require_once('../admin/locked.php'); ?>
<?php $Rectoria = $_GET['Sede']; ?>
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
            <?php echo $Rectoria; ?>
            <small>Sede o Rectoría</small>
          </h1>
		  
            <?php				
				$url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
				$queryz = $conexion->query("SELECT * FROM investigadores WHERE Rectoria LIKE '%$Rectoria%' AND Tipo_Inves != 'Estudiante' ORDER BY Nombres ASC")or die($mysqli->error);
				$num_total_registros = mysqli_num_rows($queryz);
            ?>
			
        </section>

        <!-- Main content -->
		
		<section class="content">
          <div class="row">
            <div class="col-xs-12">
				<div class="box">
            <form action="investigadores.php" method="GET">
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
				<option value="Pais">Pais</option>
				<option value="Depto">Departamento</option>
				<option value="Ciudad">Ciudad</option>
				<option value="Categoria">Categoria CvLAC</option>
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
			$query = "SELECT DISTINCT Rectoria FROM investigadores  WHERE Rectoria LIKE '%$Rectoria%' AND Tipo_Inves != 'Estudiante' ORDER BY Rectoria DESC";
			$Campo = "Rectoria";

			if(isset($_GET['Campo'])){
			$Campo = $_GET['Campo'];
			$query = "SELECT DISTINCT $Campo FROM investigadores WHERE Rectoria LIKE '%$Rectoria%' AND Tipo_Inves != 'Estudiante' ORDER BY $Campo DESC";
			}
			
			$result = $conexion->query($query);
			$c=0;
			$total=0;
			while($row = $result->fetch_assoc()){
			$numero = 0;
				$categoria[$c] = $row[$Campo];
				$query2 = "SELECT * FROM investigadores WHERE $Campo = '$categoria[$c]' AND Tipo_Inves != 'Estudiante' AND Rectoria LIKE '%$Rectoria%'";
				
				if(isset($_GET['Campo'])){
				$query2 = "SELECT * FROM investigadores WHERE $Campo = '$categoria[$c]' AND Tipo_Inves != 'Estudiante' AND Rectoria LIKE '%$Rectoria%' ORDER BY $Campo DESC";
				}
				
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
			
		</div>
		
		<script type="text/javascript">
		$(function () {
			var colors = Highcharts.getOptions().colors,
			categories = [<?php for($y=0;$y<=$c-1;$y++){ echo "'".$categoria[$y]."',";}?>],
			//Boton de Abajo
			name = 'Investigadores',
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
					text: 'Numero de Investigadores'
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
				<th width="40%">Nombre</th>
				<th width="15%">Genero</th>
				<th width="15%">Tipo Investigador</th>
				<th width="15%">CvLAC</th>
				<th width="30%">Correo</th>
				<th width="30%">Filtro</th>
				</tr>
				</thead>
				<tbody>

				<?php				
					while ($row = $queryz->fetch_assoc()){
						print ("<tr>
						<td><a href='../ver/investigador.php?Id=".$row['Id_Investigador']."'>$row[Nombres]</a></td>
						<td>$row[Genero]</td>
						<td>$row[Tipo_Inves]</td>
						<td><a href=".$row['CvLAC']." target=0'_blank'>Ver CvLAC</a></td>
						<td>$row[Correo]</td>
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