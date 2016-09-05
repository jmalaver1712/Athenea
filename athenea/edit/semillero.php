<?php require_once('../admin/locked.php'); ?>
<?php
$Id_Semillero = validar_id($_GET['Id']);
$consulta = $conexion->query("SELECT * FROM semilleros WHERE Id_Semillero = '$Id_Semillero' ")or die ("Error 1 ".$mysqli->error);
$row= $consulta->fetch_assoc();
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
					Modificar Semillero de Investigación
				</h1>
			</section>

			<!-- Main content -->

			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">

							<div class="box-body">

								<form enctype="multipart/form-data" action="semillerophp.php" method="post" onsubmit="return validar()">
									<input class="form-control" type="hidden" name="Id_Semillero" value="<?php echo $Id_Semillero; ?>">
									<table width="100%">
										<tr>
											<td width="20%"><label>*Nombre del Semillero:</label></td>
											<td><input class="form-control" type="text" name="NombreSem" size="60"  value="<?php echo $row['Nombres']; ?>" required /></td>
										</tr>

										<tr>
											<td><label>Sede a la que Pertenece:</label></td>
											<td>
												<select class="form-control" name="Sede">
													<option><?php echo $row['Sede']; ?></option>
													<option>No Aplica</option>
													<option>Sede Principal (Calle 80)</option>
													<option>Rectoria Sede Cundinamarca</option>
													<option>Centro Regional Zipaquirá</option>
													<option>Centro Regional Soacha</option>
													<option>Centro Regional Madrid</option>
													<option>Centro Regional Girardot</option>
													<option>Seccional Bello</option>
													<option>Centro Regional Urabá</option>
													<option>Centro Regional Pereira</option>
													<option>Centro Tutorial El Bagre</option>
													<option>Centro Regional Chinchiná / Neira</option>
													<option>Sede Valle</option>
													<option>Centro Regional Buga</option>
													<option>Centro Operacional de Buenaventura</option>
													<option>Centro Tutorial Cali</option>
												</select>

											</td>
										</tr>

										<script>
											function facultad(z){
												if (z == "Otro"){
													document.getElementById('Facultad2').disabled = false
												}
												else (
													document.getElementById('Facultad2').disabled = true
													)
											}
										</script>
										<tr>
											<td><label>Facultad o Unidad</label></td>
											<td>
												<select class="form-control" name="Facultad" id="Facultad" onchange="facultad(this.value)">
													<option><?php echo $row['Facultad']; ?></option>
													<option>No Aplica (N/A)</option>
													<option>Facultad de Ciencias Humanas y Sociales</option>
													<option>Facultad de Ciencias Empresariales</option>
													<option>Facultad de Comunicaciones</option>
													<option>Facultad de Educación</option>
													<option>Facultad de Ingeniería</option>
													<option>Centro de Educación para el Desarrollo - CED</option>
													<option>Centro de Pensamiento Humano y Social MD – CPHS</option>
													<option>Otro</option>
												</select>
												<br>
												<input class="form-control" type="text" name="Facultad2" id="Facultad2" size="50" disabled placeholder="Otra Facultad o Unidad">
											</td>
										</tr>

										<tr>
											<td><label>Programa:</label></td>
											<td><input class="form-control" type="text" name="Programa" value="<?php echo $row['Programa']; ?>"></td>
										</tr>

										<tr>
											<td><label>Grupo de Investigación al que se encuentra adscrito el Semillero</label></td>
											<td>
												<?php
			//Lider
												$Id_Grupo = $row['Id_Grupo'];
												$Grupo = "";
												if ($Id_Grupo != ""){
													$grupo = $conexion->query("SELECT * FROM grupos WHERE Id_Grupo = '$Id_Grupo' ")or die ("Error 1 ".$mysqli->error);
													$bus= $grupo->fetch_assoc();
													$Grupo = $bus['Nombres'];
												}
												?>
												<input class="form-control" type="text" name="grupo" id="grupo" value="<?php echo $Grupo; ?>"><br></td>
											</tr>
											<tr>
												<td><label>Perfil:</label></td>
												<td><textarea class="form-control" name="Descripcion" cols="50" rows="3" ><?php echo $row['Descripcion']; ?></textarea></td>
											</tr>

											<tr>
												<td><label>Creación (Año):</label></td>
												<td><input class="form-control" type="number" name="Ano" value="<?php echo $row['Ano']; ?>"  >
												</td>
											</tr>
											<tr>
												<td><label>*Investigador Lider:</label></td>
												<?php 
					//Lider
												$Id_Lider = $row['Id_Investigador'];
												$lider = $conexion->query("SELECT * FROM investigadores WHERE Id_Investigador = '$Id_Lider' ")or die ("Error 1 ".$mysqli->error);
												$con= $lider->fetch_assoc();
												$Id_Lider = $con['Id_Investigador'];
												print("<td><input class='form-control' type='text' name='Lider' Id='nombre' size='40' value='".$con['Nombres']."'  /></td>");
												?>
											</tr>

											<tr>
												<td><label>Horas dedicadas al semillero</label></td>
												<td><input class="form-control" type="number" name="Horas" value="<?php echo $row['Horas']; ?>"  >
												</td>
											</tr>

											<tr>
												<td>Buscar Integrantes</td>
												<td><input class="form-control" type='text' name='Nombres' Id='nombre1' size='40' /><input class="btn btn-primary" type='button' onClick='agregarCampo()' value='Agregar'></td>
											</tr>

											<tr>
												<td>Nuevos Integrantes</td>
												<td>
													<script>
														function quitar(n){
															var eliminar = document.getElementById("VIN"+n);
															var contenedor= document.getElementById("contenedorcampos");
															contenedor.removeChild(eliminar);
														}
													</script>
													<div id="contenedorcampos">
														<?php
					//Integrantes
														$Id_Investigadores = $row['Id_Investigadores'];
														$Investigadores = explode('-',$Id_Investigadores);
														$num = count($Investigadores)-1;
														for ($i=0;$i<$num;$i++){
															$Id = $Investigadores[$i];
															$query = $conexion->query("SELECT * FROM investigadores WHERE Id_Investigador = '$Id' ")or die ("Error 1 ".$mysqli->error);
															$inte = $query->fetch_assoc();
															print("<div id='VIN".$i."'><input type='text' size='40' name='Old".$i."' value='".$inte['Nombres']."' ><a href='JavaScript:quitar(".$i.");'>Quitar</a></div>");
														}
														?>
													</div><br></td>
												</tr>

												<tr>
													<td><label>Acta de inicio</label></td>
													<td>
														<input class="form-control" type="hidden" name="DocOld" value="<?php echo $row['Acta_Inicio']; ?>">
														<a target="_blank" href=<?php echo "../documentos/semilleros/".$row['Acta_Inicio']; ?>>Ver Acta de inicio</a>
														<br>
														Reemplazar Acta de Inicio => <input class="form-control" type="file" id="doc" name="doc" accept=".pdf">
														<br><br>
													</td>
												</tr>

												<tr>
													<td><label>Observaciones:</label></td>
													<td><textarea name="Observaciones" cols="50" rows="6" ><?php echo $row['Observaciones']; ?></textarea></td>
												</tr>
												<tr>
													<td>
														<br>
														<br>
														<input class="btn btn-primary" type="submit" class="submit" value="Guardar" /></td>
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