<?php require_once('../admin/locked.php'); ?>
<?php
$Id_Investigador = $_GET['Id'];
$inv = $conexion->query("SELECT * FROM investigadores WHERE Id_Investigador = '$Id_Investigador' ")or die ("Error 1 ".$mysqli->error);
$row= $inv->fetch_assoc();
$tipo = "";
if($row["Tipo_Inves"] == "Estudiante"){$Tipo = "Estudiante";}
else {$Tipo = "Investigador";}
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
		  <?php echo $Tipo; ?>
          </h1>	
        </section>

        <!-- Main content -->
		
		<section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                
                <div class="box-body">
					
          <!-- START CUSTOM TABS -->
          <div class="row">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Investigador</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Productos</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Grupos</a></li>
                  <li><a href="#tab_4" data-toggle="tab">Proyectos</a></li>
				  
					<li class="pull-right"><a onclick="return confirmDelete(this);" <?php echo "href='../eliminar/eliminar.php?Id=".$row['Id_Investigador']."&Tabla=investigadores&Campo=Id_Investigador'"; ?> class="text-muted"><i class="fa fa-close"></i></a></li>
					<li class="pull-right"><a <?php echo "href='../edit/investigador.php?Id=".$row['Id_Investigador']."'" ?> class="text-muted"><i class="fa fa-edit"></i></a></li>

                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
				  
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
				  
                   <table width="100%" border="0">
                        <tr>
                            <td width="25%"><label>Nombre:</label></td>
                            <td><?php echo $row['Nombres']; ?></td>
                        </tr>
                        
                        <tr>
                            <td><label>No. Documento:</label></td>
                            <td><?php echo $row['Documento']; ?></td>
                        </tr>
                        
                        <tr>
                            <td><label>Fecha de Nacimiento:</label></td>
                            <td><?php echo $row['Nacimiento']; ?></td>
                        </tr>
						<tr>
                            <td><label>Edad:</label></td>
                            <td><?php echo $edad." Años"; ?></td>
                        </tr>
						
						 <tr>
                            <td><label>Género:</label></td>
                            <td><?php echo $row['Genero']; ?></td>
                        </tr>
						<tr>
                            <td><label>Nacionalidad</label></td>
                            <td><?php echo $row['Nacionalidad']; ?></td>
                        </tr>
                        
                        <tr>
                            <td><label>Perfil CvLAC:</label></td>
                            <td><a href="<?php echo $row['CvLAC']; ?>" target="_blank">Ver CvLAC</a></td>
                        </tr>
						
						<tr>
                            <td><label>Categoría de Colciencias:</label></td>
                            <td><?php echo $row['Categoria']; ?></td>
                        </tr>
						
						<tr>
                            <td><label>Tipo de Investigador:</label></td>
                            <td><?php echo $row['Tipo_Inves']; ?></td>
                        </tr>
                        
                        <tr>
                            <td><br></td>
                            <td><br></td>
                        </tr>
						
						<tr>
                            <td><label>Expectativa de Jubilación (Año):</label></td>
                            <td><?php echo $jubila; ?></td>
                        </tr>
						
						<tr>
                            <td><label>Institución:</label></td>
                            <td><?php echo $row['Institucion']; ?></td>
                        </tr>
						
						<tr>
                            <td><label>Año de Vinculación al Grupo</label></td>
                            <td><?php echo $row['Vinculacion']; ?></td>
                        </tr>
						
						<tr>
                            <td><label>Años de Continuidad:</label></td>
                            <td><?php echo $row['Continuidad']; ?></td>
                        </tr>
						
                        <tr>
                            <td><label>País:</label></td>
                            <td><?php echo $row['Pais']; ?></td>
                        </tr>
						
                        <tr>
                            <td><label>Departamento:</label></td>
                            <td><?php echo $row['Depto']; ?></td>
                        </tr>
                        <tr>
                            <td><label>Municipio / Ciudad:</label></td>
                            <td><?php echo $row['Ciudad']; ?></td>
                        </tr>
                        <tr>
                            <td><label>Reseña:</label></td>
                            <td><p style="text-align:justify"><?php echo $row['Resena']; ?><br><br></p></td>
                        </tr>
                        <tr>
                            <td><label>Teléfono:</label></td>
                            <td><?php echo "<a href='tel:".$row['Telefono']."'>".$row['Telefono']."</a>"; ?></td>
                        </tr>
                        <tr>
                            <td><label>Correo:</label></td>
                            <td><?php echo "<a href='mailto:".$row['Correo']."'>".$row['Correo']."</a>"; ?></td>
                        </tr>
                        
                        <tr>
                            <td><label>Estudios / Título:</label></td>
                            <td><?php
							$Carrera = explode("%%",$row['Estudios']);
							$num = count($Carrera)-1;
							for ($i=0;$i<$num;$i++){
							$Estudio = explode("-_-",$Carrera[$i]);
							echo $Estudio[0]."/".$Estudio[1]."/".$Estudio[2]."<br>";
							}
							?>
							<br>
							</td>
                        </tr>
                        
                        <tr>
                            <td><label>Beneficios:</label></td>
                            <td><?php
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
							?>
                        </tr>
                        
                        <tr>
						   <td><label>Reconocimientos:</label></td>
						   <td>
						   <?php
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
							?>
						   </td>
						</tr>
						<tr>
						<td><label>Observaciones</label></td>
						<td><p style="text-align:justify"><?php echo $row['Observaciones'];?></p></td>
						</tr>
					   </table>
						<br>
						<br>
					   
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

						<table width="100%">
						<tr>
						<td align="right"><?php echo "<font size='-1'>".$row['Ult_Registro']."</font>"; ?></td>
						</tr>
						</table>	
					   
					   
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                   <h3>Libros</h3>
                <?php
					$consultal = $conexion->query("SELECT * FROM libro WHERE Autores LIKE '%-$Id_Investigador-%' " )or die ("Error 1 ".$mysqli->error);
					$num1 = mysqli_num_rows($consultal);
					if($num1 == "0"){
					print("No se encuentran registros<br><br>");
					}
					else{
						print("
						<font size='+2'>".$num1." Libros encontrados</font>
							<table width='100%'>
								<tr>
									<td bgcolor='#CCCCCC' width='30%' align='center'>Título</td>
									<td bgcolor='#CCCCCC' width='5%'></td>
									<td bgcolor='#CCCCCC' width='10%' align='center' >Año</td>
									<td bgcolor='#CCCCCC' width='5%'></td>
									<td bgcolor='#CCCCCC' width='30%' align='center' >Palabras Claves</td>
							   </tr>
						");
						while ($row1= $consultal->fetch_assoc()){
						print("<tr>
							<td><p align='justify'><a href='../ver/libro.php?Id=".$row1['Id_Libro']."'>".$row1['Titulo']."</a></p></td>
							<td></td>
							<td align='center'>".$row1['Ano']."</td>
							<td></td>
							<td><p align='justify'>".$row1['Palabras_Claves']."</p></td>
							</tr>
							<tr><td colspan='10' bgcolor='#DDDDDD'>&nbsp;</td></tr>
						");
						
						}
						print("</table><br><br>");
					}
						
				?>
				<h3>Artículos</h3>
				<?php
					$consultaar = $conexion->query("SELECT * FROM articulo WHERE Id_Investigadores LIKE '%-$Id_Investigador-%'" )or die ("Error 1 ".$mysqli->error);
					$num2 = mysqli_num_rows($consultaar);
					if($num2 == "0"){
					print("No se encuentran registros<br><br>");
					}
					else{
						print("
						<font size='+2'>".$num2." Artículos encontrados</font>
							<table width='100%'>
								<tr>
								<td bgcolor='#CCCCCC' width='30%' align='center'>Título</td>
									<td bgcolor='#CCCCCC' width='5%'></td>
									<td bgcolor='#CCCCCC' width='30%' align='center' >Revista</td>
									<td bgcolor='#CCCCCC' width='5%'></td>
									<td bgcolor='#CCCCCC' width='10%' align='center' >Año</td>
							   </tr>
						");
						while ($row2= $consultaar->fetch_assoc()){
						print("<tr>
							<td><p align='justify'><a href='../ver/articulo.php?Id=".$row2['Id_Articulo']."'>".$row2['Titulo']."</a></p></td>
							<td></td>
							<td><p align='justify'>".$row2['Revista']."</p></td>
							<td></td>
							<td align='center'>".$row2['Ano']."</td>
							</tr>
							<tr><td colspan='10' bgcolor='#DDDDDD'>&nbsp;</td></tr>
						");
						
						}
					print("</table><br><br>");
					}
				?>
				<h3>Ponencia</h3>
				<?php
					$consultap = $conexion->query("SELECT * FROM ponencia WHERE Id_Investigadores LIKE '%-$Id_Investigador-%' " )or die ("Error 1 ".$mysqli->error);
					$num3 = mysqli_num_rows($consultap);
					if($num3 == "0"){
					print("No se encuentran registros<br><br>");
					}
					else{
						print("
						<font size='+2'>".$num3." Ponencias encontrados</font>
							<table width='100%'>
							<tr>
								<td bgcolor='#CCCCCC' width='30%' align='center'>Título</td>
									<td bgcolor='#CCCCCC' width='5%'></td>
									<td bgcolor='#CCCCCC' width='30%' align='center' >Evento</td>
									<td bgcolor='#CCCCCC' width='5%'></td>
									<td bgcolor='#CCCCCC' width='10%' align='center' >Fecha</td>
							   </tr>
						");
						while ($row3= $consultap->fetch_assoc()){
						print("<tr>
							<td><p align='justify'><a href='../ver/ponencia.php?Id=".$row3['Id_Ponencia']."'>".$row3['Titulo']."</a></p></td>
							<td></td>
							<td><p align='justify'>".$row3['Evento']."</p></td>
							<td></td>
							<td>".$row3['Fecha']."</td>
							</tr>
							<tr><td colspan='10' bgcolor='#DDDDDD'>&nbsp;</td></tr>
						");
						
						}
					print("</table><br><br>");
					}
				?>
				<h3>Capítulo</h3>
				<?php
					$consultacap = $conexion->query("SELECT * FROM capitulo WHERE Id_Investigadores LIKE '%-$Id_Investigador-%'  " )or die ("Error 1 ".$mysqli->error);
					$num4 = mysqli_num_rows($consultacap);
					if($num4 == "0"){
					print("No se encuentran registros<br><br>");
					}
					else{
						print("
						<font size='+2'>".$num4." Capítulos encontrados</font>
						<table width='100%'>
							<tr>
								<td bgcolor='#CCCCCC' width='30%' align='center'>Título</td>
								<td bgcolor='#CCCCCC' width='5%'></td>
								<td bgcolor='#CCCCCC' width='30%' align='center' >Libro</td>
								<td bgcolor='#CCCCCC' width='5%'></td>
								<td bgcolor='#CCCCCC' width='10%' align='center' >Editorial</td>
						   </tr>
					");
						while ($row4= $consultacap->fetch_assoc()){
						print("<tr>
							<td><p align='justify'><a href='../ver/capitulo.php?Id=".$row4['Id_Capitulo']."'>".$row4['Titulo']."</a></p></td>
							<td></td>
							<td><p align='justify'>".$row4['Libro']."</p></td>
							<td></td>
							<td>".$row4['Editorial']."</td>
							</tr>
							<tr><td colspan='10' bgcolor='#DDDDDD'>&nbsp;</td></tr>
						");
						
						}
					print("</table><br><br>");
					}
				?>
				
				
				<h3>Multimedia</h3>
				<?php
					$consultamul = $conexion->query("SELECT * FROM multimedia WHERE Id_Investigadores LIKE '%-$Id_Investigador-%'  " )or die ("Error 1 ".$mysqli->error);
					$num5 = mysqli_num_rows($consultamul);
					if($num5 == "0"){
					print("No se encuentran registros<br><br>");
					}
					else{
						print("
						<font size='+2'>".$num5." Productos multimedia encontrados</font>
						<table width='100%'>
							<tr>
								<td bgcolor='#CCCCCC' width='30%' align='center'>Título</td>
								<td bgcolor='#CCCCCC' width='5%'></td>
								<td bgcolor='#CCCCCC' width='30%' align='center' >Fecha</td>
								<td bgcolor='#CCCCCC' width='5%'></td>
								<td bgcolor='#CCCCCC' width='10%' align='center' >Lugar</td>
								<td bgcolor='#CCCCCC' width='5%'></td>
						   </tr>
					");
						while ($row5= $consultamul->fetch_assoc()){
						print("<tr>
							<td><p align='justify'><a href='../ver/multimedia.php?Id=".$row5['Id_Multimedia']."'>".$row5['Titulo']."</a></p></td>
							<td></td>
							<td><p align='justify'>".$row5['Fecha_Publicacion']."</p></td>
							<td></td>
							<td>".$row5['Lugar_Publicacion']."</td>
							</tr>
							<tr><td colspan='10' bgcolor='#DDDDDD'>&nbsp;</td></tr>
						");
						}
					print("</table>");
					}
				?>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                  <h3>Grupo</h3>
                <?php
					$consultagru = $conexion->query("SELECT * FROM grupos WHERE Id_Investigador = '$Id_Investigador' OR Id_Investigadores LIKE '%-$Id_Investigador-%'" )or die ("Error 1 ".$mysqli->error);
					$num5 = mysqli_num_rows($consultagru);
					if($num5 == "0"){
					print("No se encuentran registros<br><br>");
					}
					else{
						print("
						<font size='+2'>Vinculado a ".$num5." Grupos</font>
							<table width='100%'>
							<tr>
								<td bgcolor='#CCCCCC' width='30%' align='center'>Nombre</td>
								<td bgcolor='#CCCCCC' width='5%'></td>
								<td bgcolor='#CCCCCC' width='30%' align='center' >Reseña</td>
								<td bgcolor='#CCCCCC' width='5%'></td>
								<td bgcolor='#CCCCCC' width='10%' align='center' >Creación</td>
								<td bgcolor='#CCCCCC' width='5%'></td>
						   </tr>
						");
						while ($row5= $consultagru->fetch_assoc()){
						print("<tr>
							<td><p align='justify'><a href='../ver/grupo.php?Id=".$row5['Id_Grupo']."'>".$row5['Nombres']."</a></p></td>
							<td></td>
							<td><p align='justify'>".$row5['Resena']."</p></td>
							<td></td>
							<td align='center'>".$row5['Creacion']."</td>
							</tr>
							<tr><td colspan='10' bgcolor='#DDDDDD'>&nbsp;</td></tr>
						");
						
						}
						print("</table><br>");
					}
						
				?>
				<h3>Semillero</h3>
				<?php
					$consultasemi = $conexion->query("SELECT * FROM semilleros WHERE Id_Investigador = '$Id_Investigador' OR Id_Investigadores LIKE '%-$Id_Investigador-%'" )or die ("Error 1 ".$mysqli->error);
					$num6 = mysqli_num_rows($consultasemi);
					if($num6 == "0"){
					print("No se encuentran registros<br><br>");
					}
					else{
						print("
						<font size='+2'>Vinculado a ".$num6." Semilleros</font>
							<table width='100%'>
							<tr>
								<td bgcolor='#CCCCCC' width='30%' align='center'>Nombre</td>
								<td bgcolor='#CCCCCC' width='5%'></td>
								<td bgcolor='#CCCCCC' width='30%' align='center' >Descripcion</td>
								<td bgcolor='#CCCCCC' width='5%'></td>
								<td bgcolor='#CCCCCC' width='10%' align='center' >Creación</td>
						   </tr>
						");
						while ($row6= $consultasemi->fetch_assoc()){
						print("<tr>
							<td><p align='justify'><a href='../ver/semillero.php?Id=".$row6['Id_Semillero']."'>".$row6['Nombres']."</a></p></td>
							<td></td>
							<td><p align='justify'>".$row6['Descripcion']."</p></td>
							<td></td>
							<td align='center'>".$row6['Ano']."</td>
							</tr>
							<tr><td colspan='10' bgcolor='#DDDDDD'>&nbsp;</td></tr>
						");
						
						}
					print("</table>");
					}
				?>
				</div>
				<div class="tab-pane" id="tab_4">
				<h3>Proyectos (Lider)</h3>
                <?php
					$consultapro = $conexion->query("SELECT * FROM proyectos WHERE Id_Investigador = '$Id_Investigador'" )or die ("Error 1 ".$mysqli->error);
					$num7 = mysqli_num_rows($consultapro);
					if($num7 == "0"){
					print("No se encuentran registros<br><br>");
					}
					else{
						print("
						<font size='+2'>Vinculado a ".$num7." Proyectos como Lider</font>
							<table width='100%'>
								<tr>
									<td bgcolor='#CCCCCC' width='30%'>Nombre</td>
									<td bgcolor='#CCCCCC' width='5%'></td>
									<td bgcolor='#CCCCCC' width='60%'>Descripción</td>
							   </tr>
						");
						while ($row7= $consultapro->fetch_assoc()){
						print("<tr>
							<td><p align='justify'><a href='../ver/proyecto.php?Id=".$row7['Id_Proyecto']."'>".$row7['Nombre']."</a></p></td>
							<td></td>
							<td><p align='justify'>".$row7['Descripcion']."</p></td>
							</tr>
							<tr><td colspan='10' bgcolor='#DDDDDD'>&nbsp;</td></tr>
						");
						
						}
					print("</table>");
					}
				?>
				
				<h3>Proyectos (Integrante)</h3>
                <?php
					$consultapro = $conexion->query("SELECT * FROM proyectos WHERE Id_Investigadores LIKE '%-$Id_Investigador-%' " )or die ("Error 1 ".$mysqli->error);
					$num7 = mysqli_num_rows($consultapro);
					if($num7 == "0"){
					print("No se encuentran registros<br><br>");
					}
					else{
						print("
						<font size='+2'>Vinculado a ".$num7." Proyectos como Integrante</font>
							<table width='100%'>
								<tr>
									<td bgcolor='#CCCCCC' width='30%'>Nombre</td>
									<td bgcolor='#CCCCCC' width='5%'></td>
									<td bgcolor='#CCCCCC' width='60%'>Descripción</td>
							   </tr>
						");
						while ($row7= $consultapro->fetch_assoc()){
						print("<tr>
							<td><p align='justify'><a href='../ver/proyecto.php?Id=".$row7['Id_Proyecto']."'>".$row7['Nombre']."</a></p></td>
							<td></td>
							<td><p align='justify'>".$row7['Descripcion']."</p></td>
							</tr>
							<tr><td colspan='10' bgcolor='#DDDDDD'>&nbsp;</td></tr>
						");
						
						}
					print("</table>");
					}
				?>
				
                  </div><!-- /.tab-pane -->
				  
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->

					
					
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