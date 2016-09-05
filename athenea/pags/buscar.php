<?php require_once('../admin/locked.php'); ?>
<?php 
$buscar = $_GET['buscar'];

//Investigadores
$consultaI = $conexion->query("SELECT DISTINCT * FROM investigadores WHERE (Nombres LIKE '%$buscar%' OR Resena LIKE '%$buscar%') AND Tipo_Inves != 'Estudiante' AND Rectoria LIKE '%$Acc_Rect%' AND Sede_CR LIKE '%$Acc_Sede%' " )or die ("Error 1 ".$mysqli->error);
$registrosI = mysqli_num_rows($consultaI);

//Estudiantes
$consultaE = $conexion->query("SELECT DISTINCT * FROM investigadores WHERE (Nombres LIKE '%$buscar%' OR Resena LIKE '%$buscar%') AND Tipo_Inves = 'Estudiante' AND Rectoria LIKE '%$Acc_Rect%' AND Sede_CR LIKE '%$Acc_Sede%' " )or die ("Error 1 ".$mysqli->error);
$registrosE = mysqli_num_rows($consultaE);

//Grupos
$consultaG = $conexion->query("SELECT DISTINCT * FROM grupos WHERE (Nombres LIKE '%$buscar%' OR Resena LIKE '%$buscar%') AND Rectoria LIKE '%$Acc_Rect%' AND Sede_CR LIKE '%$Acc_Sede%' " )or die ("Error 1 ".$mysqli->error);
$registrosG = mysqli_num_rows($consultaG);

//Semilleros
$consultaS = $conexion->query("SELECT DISTINCT * FROM semilleros WHERE (Nombres LIKE '%$buscar%' OR Descripcion LIKE '%$buscar%') AND Rectoria LIKE '%$Acc_Rect%' AND Sede_CR LIKE '%$Acc_Sede%' " )or die ("Error 1 ".$mysqli->error);
$registrosS = mysqli_num_rows($consultaS);		

//Proyectos
$consultaP = $conexion->query("SELECT DISTINCT * FROM proyectos WHERE (Nombre LIKE '%$buscar%' OR Descripcion LIKE '%$buscar%' OR Nombre_Lider LIKE '%$buscar%') AND Rectoria LIKE '%$Acc_Rect%' AND Sede_CR LIKE '%$Acc_Sede%' " )or die ("Error 1 ".$mysqli->error);
$registrosP = mysqli_num_rows($consultaP);		

//Libros
$consultaP1 = $conexion->query("SELECT DISTINCT * FROM libro WHERE (Titulo LIKE '%$buscar%' OR Editorial LIKE '%$buscar%' OR Palabras_Claves LIKE '%$buscar%') AND Rectoria LIKE '%$Acc_Rect%' AND Sede_CR LIKE '%$Acc_Sede%' " )or die ("Error 1 ".$mysqli->error);
$registrosP1 = mysqli_num_rows($consultaP1);			

?>
<html>
<?php require_once('../menu/head.php'); ?> 

<body class="skin-blue sidebar-mini">
    <div class="wrapper">
	
      <!-- Main Header -->
		<header class="main-header"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		
		
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
            Resultados
          </h1>
		  
				<section class="content">
				<div class="row">
				<div class="col-xs-12">

				<div class="box">

				<div class="box-body">

				<!-- START CUSTOM TABS -->
				<div class="row">
		  
		  
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab"><h3>Investigador y Estudiantes</h3></a></li>
                  <li><a href="#tab_2" data-toggle="tab"><h3>Grupos y Semilleros</h3></a></li>
                  <li><a href="#tab_3" data-toggle="tab"><h3>Proyectos</h3></a></li>
                  <li><a href="#tab_4" data-toggle="tab"><h3>Productos</h3></a></li>

                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
					<h2>Investigadores</h2>
					<h4><?php echo $registrosI ?> Registros encontrados</h4>
					<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
					<th width="30%">Nombre</th>
					<th width="25%">Institución</th>
					<th width="20%">CvLAC</th>
					<th width="15%">País</th>
					</tr>
					</thead>
					<tbody>
					<?php				
					while ($row = $consultaI->fetch_assoc()){
						print ("<tr>
						<td><a href='../ver/investigador.php?Id=".$row['Id_Investigador']."'>$row[Nombres]</a></td>
						<td>".$row['Institucion']."</td>
						<td><a target='_blank' href='".$row['CvLAC']."'>CvLAC</a></td>
						<td>".$row['Pais']."</td>
						</tr>");
					}
					?>
					</tbody>
					</table>
					
					<br><br><br>
					<h2>Estudiantes</h2>
					<h4><?php echo $registrosE ?> Registros encontrados</h4>
					<table id="example2" class="table table-bordered table-striped">
					<thead>
					<tr>
					<th width="30%">Nombre</th>
					<th width="25%">Institución</th>
					<th width="20%">CvLAC</th>
					<th width="15%">País</th>
					</tr>
					</thead>
					<tbody>
					<?php				
					while ($row = $consultaE->fetch_assoc()){
						print ("<tr>
						<td><a href='../ver/investigador.php?Id=".$row['Id_Investigador']."'>$row[Nombres]</a></td>
						<td>".$row['Institucion']."</td>
						<td><a target='_blank' href='".$row['CvLAC']."'>CvLAC</a></td>
						<td>".$row['Pais']."</td>
						</tr>");
					}
					?>
					</tbody>
					</table>
					
					
					
                  </div><!-- /.tab-pane -->
				  
				  
                  <div class="tab-pane" id="tab_2">
				  
					<h2>Grupos</h2>
					<h4><?php echo $registrosG ?> Registros encontrados</h4>
					<table id="example3" class="table table-bordered table-striped">
					<thead>
					<tr>
					<td width="30%">Nombre</td>
					<td width="20%">Creación</td>
					<td width="10%">GrupLac</td>
					<td width="20%">Categoria</td>
					</tr>
					</thead>
					<tbody>
					<?php				
					while ($rowG = $consultaG->fetch_assoc()){
					$Ult_Cate = explode('%%',$rowG['Categoria']);
					$num = count($Ult_Cate)-1;
					print ("<tr>
					<td><a href='../ver/grupo.php?Id=".$rowG['Id_Grupo']."'>".$rowG['Nombres']."</a></td>
					<td>".$rowG['Creacion']."</td>
					<td><a href='".$rowG['CvLAC']."'>GrupLac</a></td>
					<td>".$Ult_Cate[$num]."</td>
					</tr>");
					}
					?>
					</tbody>
					</table>
					<br><br><br>
					
					<h2>Semilleros</h2>
					<h4><?php echo $registrosS ?> Registros encontrados</h4>
					
					<table id="example4" class="table table-bordered table-striped">
					<thead>
					<tr>
					<th width="15%">Nombre</th>
					<th width="15%">Investigador Lider</th>
					<th width="20%">Sede</th>
					<th width="20%">Facultad</th>
					</tr>
					</thead>
					<tbody>

					<?php				
					while ($rowS = $consultaS->fetch_assoc()){
					$Id_Lider = $rowS['Id_Investigador'];
					$lider = $conexion->query("SELECT * FROM investigadores WHERE Id_Investigador = '$Id_Lider' ")or die ("Error 1 ".$mysqli->error);
					$con= $lider->fetch_assoc();
						print ("<tr>
						<td><a href='../ver/semillero.php?Id=".$rowS['Id_Semillero']."'>$rowS[Nombres]</a></td>
						<td><a href='../ver/investigador.php?Id=".$rowS['Id_Investigador']."'>$con[Nombres]</a></td>
						<td>$rowS[Sede]</td>
						<td>$rowS[Facultad]</td>
						</tr>");
					}
					?>

					</tbody>
					</table>
				   
                  </div><!-- /.tab-pane -->
				  
                  <div class="tab-pane" id="tab_3">
					<h2>Proyectos</h2>
					<h4><?php echo $registrosP ?> Registros encontrados</h4>
					<table id="example5" class="table table-bordered table-striped">
					<thead>
					<tr>
					<th width="40%">Proyecto</th>
					<th width="30%">Responsable</th>
					<th width="15%">Fecha Inicio</th>
					<th width="15%">Fecha Final</th>
					</tr>
					</thead>
					<tbody>

					<?php				
					while ($rowP = $consultaP->fetch_assoc()){
						print ("<tr>
						<td><a href='../ver/proyecto.php?Id=".$rowP['Id_Proyecto']."'>$rowP[Nombre]</a></td>
						<td><a href='../ver/investigador.php?Id=".$rowP['Id_Investigador']."'>$rowP[Nombre_Lider]</a></td>
						<td>$rowP[Fecha_Inicio]</td>
						<td>$rowP[Fecha_Fin]</td>
						</tr>");
					}
					?>
					</tbody>
					</table>
				</div>
				
				
				
				<div class="tab-pane" id="tab_4">
					<h2>Libros</h2>
					<h4><?php echo $registrosP1 ?> Registros encontrados</h4>
					<table id="example5" class="table table-bordered table-striped">
					<thead>
					<tr>
					<th width="40%">Proyecto</th>
					<th width="30%">Responsable</th>
					<th width="15%">Fecha Inicio</th>
					<th width="15%">Fecha Final</th>
					</tr>
					</thead>
					<tbody>

					<?php				
					while ($rowP = $consultaP->fetch_assoc()){
						print ("<tr>
						<td><a href='../ver/proyecto.php?Id=".$rowP['Id_Proyecto']."'>$rowP[Nombre]</a></td>
						<td><a href='../ver/investigador.php?Id=".$rowP['Id_Investigador']."'>$rowP[Nombre_Lider]</a></td>
						<td>$rowP[Fecha_Inicio]</td>
						<td>$rowP[Fecha_Fin]</td>
						</tr>");
					}
					?>
					</tbody>
					</table>
				</div>
				
				
				  
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