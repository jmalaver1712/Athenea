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
				$inv = $conexion->query("SELECT * FROM investigadores WHERE Documento = '$Doc'")or die ("Error 1 ".$mysqli->error);
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
								$edad = 0;
								$anoact = date("Y");
								$mesact = date("m");
								$diaact = date("d");
								list($anio,$mes,$dia) = explode("-",$row['Nacimiento']);
								if($mes >= $mesact){
									$edad=$edad-1;
								}
								$edad =$edad + $anoact - $anio;
				//Jubilacion

								$jubila = 0;
								if($row['Genero'] == "Masculino"){$jubila = $anio + 62;}
								if($row['Genero'] == "Femenino"){$jubila = $anio + 57;}
								?>
								<div class="ui raised segment">
									<a class="ui ribbon label">Datos Principales</a>
									<span></span>
									<p>
										<b>Cédula:</b> <?php echo $row['Documento']; ?><br>
										<b>Fecha de Nacimiento:</b> <?php echo $row['Nacimiento']; ?><br>
										<b>Edad:</b> <?php echo $edad." Años"; ?><br>
										<b>Género:</b> <?php echo $row['Genero']; ?><br>
										<b>Nacionalidad:</b> <?php echo $row['Nacionalidad']; ?><br>
										<b>Perfil CvLAC: </b><a href="<?php echo $row['CvLAC']; ?>" target="_blank">Ver aquí</a><br>
										<b>Categoría de Colciencias:</b> <?php echo $row['Categoria']; ?><br>
										<b>Tipo de Investigador:</b> <?php echo $row['Tipo_Inves']; ?><br>
										<b>Expectativa de Jubilación (Año): </b><?php echo $jubila; ?><br>
										<b>Institución: </b> <?php echo $row['Institucion']; ?><br>
										<b>Año de Vinculación al Grupo</b> <?php echo $row['Vinculacion']; ?><br>
										<b>Años de Continuidad:</b> <?php echo $row['Continuidad']; ?><br>
										<b>País:</b> <?php echo $row['Pais']; ?><br>
										<b>Departamento: </b> <?php echo $row['Depto']; ?><br>
										<b>Municipio / Ciudad:</b> <?php echo $row['Ciudad']; ?><br>
										<b>Reseña:</b> <p style="text-align:justify"><?php echo $row['Resena']; ?><br><br></p><br>
										<b>Teléfono: </b><?php echo "<a href='tel:".$row['Telefono']."'>".$row['Telefono']."</a>"; ?><br>
										<b>Correo:</b> <?php echo "<a href='mailto:".$row['Correo']."'>".$row['Correo']."</a>"; ?><br>
									</p>
									<a class="ui ribbon label green">Estudios</a>
									<p>
										<b>Estudios / Título: </b><br><?php
										$Carrera = explode("%%",$row['Estudios']);
										$num = count($Carrera)-1;
										for ($i=0;$i<$num;$i++){
											$Estudio = explode("-_-",$Carrera[$i]);
											echo $Estudio[0]."/".$Estudio[1]."/".$Estudio[2]."<br>";
										}
										?><br>
										<b>Beneficios: </b><?php
										$IdB = explode("%",$row['Id_Beneficios']);
										$numb = count($IdB)-1;
										for ($b=1;$b<$numb;$b++){
											$idT = $IdB[$b];
											$consultarB = $conexion->query("SELECT * FROM beneficios WHERE Id_Beneficio = '$idT'")or die ("Error".$mysqli->error);
											$rowB = $consultarB->fetch_assoc();
											echo "Tipo: ".$rowB['Tipo']."<br>
											Fecha Inicio: ".$rowB['Fecha_Ini']."<br>
											Fecha Final: ".$rowB['Fecha_Fin']."<br>
											Monto: ".$rowB['Monto']."<br>
											Observaciones: ".$rowB['Observaciones']."<br><br>";
										}
										?><br>
										<b>Reconocimientos:</b> <?php
										echo "Horas de Investigación: ".$row['Horas']."<br><br>";
										$IdR = explode("%",$row['Id_Reconocimientos']);
										$numR = count($IdR)-1;
										for ($r=1;$r<$numR;$r++){
											$idR = $IdR[$r];
											$consultarR = $conexion->query("SELECT * FROM reconocimientos WHERE Id_Reconocimiento = '$idR'")or die ("Error".$mysqli->error);
											$rowR = $consultarR->fetch_assoc();
											echo "Fecha: ".$rowR['Fecha']."<br>
											Reconocimiento: ".$rowR['Reconocimiento']."<br>
											Institución: ".$rowR['Institucion']."<br>
											Observaciones: ".$rowR['Observaciones']."<br><br>";
										}
										?><br>
										<b>Observaciones:</b><p style="text-align:justify"><?php echo $row['Observaciones'];?></p><br>
									</p>
									<a class="ui teal ribbon label">Datos de UNIMINUTO</a>
									<p>
										<table <?php 
										if($row['Id_Trabajo'] == 0){ print ("style='display:none'"); }
										$IdT = $row['Id_Trabajo']; 
										$consultarT = $conexion->query("SELECT * FROM trabajo WHERE Id_Trabajo = '$IdT' ")or die ("Error".$mysqli->error);
										$rowT = $consultarT->fetch_assoc();
										?>>
										<tr>
											<td><label>Sede Uniminuto:</label></td>
											<td><?php echo $rowT['Sede']; ?></td>
										</tr>

										<tr>
											<td><label>Facultad o Unidad:</label></td>
											<td><?php echo $rowT['Facultad'];?></td>
										</tr>

										<tr>
											<td><label>Tipo de Contrato:</label></td>
											<td><?php echo $rowT['Tipo_Contrato']; ?></td>
										</tr>

										<tr>
											<td><label>Año de Vinculación a UNIMINUTO:</label></td>
											<td><?php echo $rowT['Ano_Vinculo']; ?></td>
										</tr>

										<tr>
											<td><label>Cargo:</label></td>
											<td><?php echo $rowT['Cargo']; ?></td>
										</tr>

										<tr>
											<td><label>Salario:</label></td>
											<td>$ <?php echo $rowT['Salario']; ?></td>
										</tr>

										<tr>
											<td><label>Horas de Investigación:</label></td>
											<td><?php echo $rowT['Horas']; ?></td>
										</tr>
									</table>
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