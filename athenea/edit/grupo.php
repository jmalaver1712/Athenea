<?php require_once('../admin/locked.php'); ?>
<?php
$Id_Grupo = validar_id($_GET['Id']);
$consulta = $conexion->query("SELECT * FROM grupos WHERE Id_Grupo = '$Id_Grupo' ")or die ("Error 1 ".$mysqli->error);
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
					Modificar Grupo de Investigación
				</h1>
			</section>

			<!-- Main content -->
			
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							
							<div class="box-body">

								<form enctype="multipart/form-data" action="grupophp.php" method="post" onsubmit="return validar()">
									<input class="form-control" type="hidden" name="Id_Grupo" value="<?php echo $Id_Grupo; ?>">
									<table width="100%">
										<tr>
											<td width="20%"><label>*Nombre del Grupo:</label></td>
											<td><input class="form-control" type="text" name="NombreGrupo" size="60"  value="<?php echo $row['Nombres']; ?>" required /></td>
										</tr>

										<tr>
											<td><label>Perfil GrupLAC:</label></td>
											<td><input class="form-control" type="url" name="CvLAC" value="<?php echo $row['CvLAC']; ?>" size="30" ></td>
										</tr>

										<tr>
											<td><label>Red Vinculada</label></td>
											<td>
												<input class="form-control" type="text" name="Redes" id="Redes">
												<input class="btn btn-primary" type="button" id="Agregar" value="Agregar" onclick="redJS()">
											</td>
										</tr>
										<tr>
											<td>&nbsp;</td>
											<td>
												<script>
													function remove_red(i){
														var redg = document.getElementById("div_red"+i);
														var contenedor= document.getElementById("RedesCONT");
														contenedor.removeChild(redg);
													}
												</script>
												<div id="RedesCONT">
													<?php
					//Categorias
													$Redes = $row['Id_Red'];
													$Red = explode('%%',$Redes);
													$RN = count($Red)-1;
													for ($f=1;$f<$RN;$f++){
														$Id_Red = $Red[$f];
														$queryR = $conexion->query("SELECT * FROM redes WHERE Id_Red = '$Id_Red'")or die ("Error 1 ".$mysqli->error);
														$rowR= $queryR->fetch_assoc();
														print("<div id='div_red".$f."'><input type='text' size='15' name='Red_O".$f."' value='".$rowR['Nombre']."' ><a href='JavaScript:remove_red(".$f.");'>Quitar</a></div>");
													}
													?>
													<br>
												</div>
											</td>
										</tr>

										<tr>
											<td><label>Sede a la que Pertenece:</label></td>
											<td>
												<select class="form-control" name="Sede">
													<option><?php echo $row['Sede']; ?></option>
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
													<option>Sede Virtual y Distancia (UVD) </option>
												</td>

											</td>
										</tr>

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
											</td>
										</tr>

										<tr>
											<td><label>Reseña:</label></td>
											<td><textarea class="form-control" name="Resena" cols="50" rows="3" ><?php echo $row['Resena']; ?></textarea></td>
										</tr>

										<tr>
											<td><label>Creación (Año):</label></td>
											<td><input class="form-control" type="number" name="Creacion" value="<?php echo $row['Creacion']; ?>"  >
											</td>
										</tr>


										<tr>
											<td><label>Categoria:</label></td>
											<td>
												<select class="form-control" name="Ano_Categoria" id="Ano_Categoria">
													<?php
													$AC = 2000;
													while($AC < 2020){ 
														echo "<option>".$AC."</option>";
														$AC++;
													}
													?>
												</select>
												<select class="form-control" name="Categoria" id="Categoria">
													<option>A1</option>
													<option>A</option>
													<option>B</option>
													<option>C</option>
													<option>D</option>
													<option>Reconocido</option>
													<option>NA (No Aplica)</option>
												</select>
												<input class="btn btn-primary" type="button" id="Agregar" value="Agregar" onclick="cateJS()">

											</td>
										</tr>
										<tr>
											<td>
												<script>
													function remove_cat(l){
														var Categ = document.getElementById("Categoria"+l);
														var contenedor= document.getElementById("CategoriasT");
														contenedor.removeChild(Categ);
													}
												</script>
											</td>
											<td>
												<div id="CategoriasT">

													<?php
					//Categorias
													$Categoria = $row['Categoria'];
													$Cate = explode('%%',$Categoria);
													$CN = count($Cate);
													for ($f=1;$f<$CN;$f++){
														print("<div id='Categoria".$f."'><input type='text' size='15' name='Cate_Old".$f."' value='".$Cate[$f]."' ><a href='JavaScript:remove_cat(".$f.");'>Quitar</a></div>");
													}
													?>

												</div>
												<br>
											</td>
										</tr>

										<tr>
											<td><label>Lineas de investigación:</label></td>
											<td><input class="form-control" type="text" name="valor" id="valor" size="50" >
												<input class="btn btn-primary" type="button" onclick="dinamica()" value="Agregar"></td>
											</tr>

											<tr>
												<td><label>Lineas:</label></td>
												<td>
													<script>
														function remove(l){
															var Line = document.getElementById("Linea"+l);
															var contenedor= document.getElementById("dinamismo");
															contenedor.removeChild(Line);
														}
													</script>
													<div id="dinamismo">
														<?php
					//Lineas
														$Lineas = explode('#',$row['Lineas']);
														$lin = count($Lineas)-1;
														for ($j=0;$j<$lin;$j++){
															print("<div id='Linea".$j."'><input type='text' size='40' name='Vet".$j."' value='".$Lineas[$j]."' ><a href='JavaScript:remove(".$j.");'>Quitar</a></div>");
														}
														?>
													</div>
												</td>

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
											<td>Buscar Integrantes</td>
											<td><input class="form-control" type='text' name='Nombres' Id='nombre1' size='40' />
												<input class="btn btn-primary" type='button' onClick='agregarCampo()' value='Agregar'></td>
											</tr>

											<tr>
												<td>Integrantes Actuales</td>
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
														for ($i=1;$i<$num;$i++){
															$Id = $Investigadores[$i];
															$query = $conexion->query("SELECT * FROM investigadores WHERE Id_Investigador = '$Id' ")or die ("Error 1 ".$mysqli->error);
															$inte = $query->fetch_assoc();
															print("<div id='VIN".$i."'><input type='text' size='40' name='Old".$i."' value='".$inte['Nombres']."' ><a href='JavaScript:quitar(".$i.");'>Quitar</a></div>");
														}
														?>
													</div></td>
												</tr>

												<tr>
													<td><label>Observaciones:</label></td>
													<td><textarea class="form-control" name="Observaciones" cols="50" rows="6" ><?php echo $row['Observaciones']; ?></textarea> <br><br></td>
												</tr>


												<tr>
													<td><label>Acta de Inicio</td>
													<input class="form-control" type="hidden" name="DocOld" value="<?php echo $row['Acta'] ?>" >
													<td><?php if($row['Acta'] != ""){print ("<a href='../documentos/grupos/".$row['Acta']."' target='_blank' >Ver Acta de Inicio</a>"); }
														else{ echo"No se encuentra Acta de Inicio"; }
														?>
													</tr>

													<script>
														function Presentacion(){
															Subir = document.getElementById('Subir')

															if (Subir.checked)
																{document.getElementById('Cambia').value = "Cambiar"
															document.getElementById('PresenCambia').style.display = "block"
															document.getElementById('doc').required = true
														}
														else{document.getElementById('Cambia').value = ""
															document.getElementById('PresenCambia').style.display = "none"
														document.getElementById('doc').required = false
													}

												}
											</script>
											<tr>
												<td></td>
												<td>¿Desea reemplazar el documento Existente?
													<input type="checkbox" name="Subir" id="Subir" onclick="Presentacion()">
													<input type="hidden" name="Cambia" id="Cambia">
												</td>
											</tr>
											<tr>
												<td></td>
												<td id="PresenCambia" style="display:none;">
													<input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="2000000">
													<input class="form-control" type="file" id="doc" name="doc" accept=".pptx"></td>
												</tr>
												<tr>
													<td>
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
