<?php require_once('../admin/locked.php'); ?>

<?php
$Id_Libro = $_GET['Id'];
$consulta = $conexion->query("SELECT * FROM libro WHERE Id_Libro = '$Id_Libro'" )or die ("Error 1 ".$mysqli->error);
$row= $consulta->fetch_assoc();
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
		  Libro
          </h1>	
        </section>

        <!-- Main content -->
		
		<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
				
					<ul class="nav nav-tabs">
					<li class="pull-right"><a onclick="return confirmDelete(this);" <?php echo "href='../eliminar/eliminar.php?Id=".$row['Id_Libro']."&Tabla=libros&Campo=Id_Libro'"; ?> class="text-muted"><i class="fa fa-close"></i></a></li>
					<li class="pull-right"><a <?php echo "href='../edit/libro.php?Id=".$row['Id_Libro']."'" ?> class="text-muted"><i class="fa fa-edit"></i></a></li>
					</ul><br>
				
				<table border="0" width="80%">
					<tr>
					<tr>
						<td><label>Título:</label></td>
						<td><?php echo $row['Titulo']; ?></td>
					</tr>
					
					<td><label>Autores:</label></td>
					<td>
					<?php
					//Autores
					$Id_Investigadores = $row['Autores'];
					$Investigadores = explode('-',$Id_Investigadores);
					$num = count($Investigadores);
					for ($i=0;$i<$num;$i++){
					$Id = $Investigadores[$i];
					$query = $conexion->query("SELECT * FROM investigadores WHERE Id_Investigador = '$Id' ")or die ("Error 1 ".$mysqli->error);
					$inte = $query->fetch_assoc();
					print("<a href='../ver/investigador.php?Id=$Id'>".$inte['Nombres']."</a><br>");
					}
					?>
					</td>
					</tr>
					
					<tr>
					<td><label>Año de Publicación:</label></td>
					<td><?php echo $row['Ano']; ?></td>
					</tr>

					<tr>
					<td><label>Nombre del Grupo o Semillero:</label></td>
					<td>
					<?php 
					$Id_Encargado = $row['Id_Encargado'];
					$Tipo_Encargado = $row['Tipo_Encargado'];
					$Tipo_Enl = "";
					$Campo = "";
					if($Tipo_Encargado != ""){
					if($Tipo_Encargado == "investigadores"){$Campo = "Id_Investigador"; $Tipo_Enl = "investigador";}
					if($Tipo_Encargado == "grupos"){$Campo = "Id_Grupo"; $Tipo_Enl = "grupo";}
					if($Tipo_Encargado == "semilleros"){$Campo = "Id_Semillero"; $Tipo_Enl = "semillero";}
					
					$query2= $conexion->query("SELECT * FROM $Tipo_Encargado WHERE $Campo = '$Id_Encargado'")or die ("Error 1 ".$mysqli->error);
					$row2= $query2->fetch_assoc();
					print("<a href='../ver/".$Tipo_Enl.".php?Id=$Id_Encargado'>".$row2['Nombres']."</a>");
					}
					?>
					<br><br>
					</td>
					</tr>
					<tr>
					<td><label>Nombre del Par evaluador:</label></td>
					<td><?php echo $row['Nombre_Par']; ?></td>
					</tr>
					
					<tr>
						<td><label>Programa:</label></td>
						<td><?php echo $row['Programa']; ?></td>
					</tr>
					
					<tr>
						<td><label>Facultad:</label></td>
						<td><?php echo $row['Facultad']; ?></td>
					</tr>
					
					<tr>
						<td><label>Sede:</label></td>
						<td><?php echo $row['Sede']; ?></td>
					</tr>
					
					<tr>
						<td><label>Ciudad:</label></td>
						<td><?php echo $row['Ciudad']; ?></td>
					</tr>
					<tr>
						<td><label>País:</label></td>
						<td><?php echo $row['Pais']; ?></td>
					</tr>
					<tr>
						<td><label>Editorial:</label></td>
						<td><?php echo $row['Editorial']; ?></td>
					</tr>
					<tr>
						<td><label>ISBN:</label></td>
						<td>
						<a target="_blank" href="http://isbn.camlibro.com.co/buscador.php?mode=buscar&code=<?php echo $row['ISBN']; ?>"><?php echo $row['ISBN']; ?></a>
						</td>
					</tr>
					<tr>
						<td><label>Compilador:</label></td>
						<td><?php echo $row['Compilador']; ?></td>
					</tr>
					<tr>
						<td><label>Año:</label></td>
						<td><?php echo $row['Ano']; ?></td>
					</tr>
					<tr>
						<td><label>Palabras Claves:</label></td>
						<td><?php echo $row['Palabras_Claves']; ?></td>
					</tr>
					<tr>
						<td><label>Documento:</td>
						<td><a href="<?php
						$Tipo_Doc = $row['Tipo_Doc'];
						if ($Tipo_Doc == "Documento"){
						echo "../documentos/libro/".$row['URL'];
						}
						else{
						echo $row['URL'];
						}
						?>" target="_blank">Ver documento</a>
					</tr>
					<tr>
					<td><label>Observaciones</label></td>
					<td><?php echo $row['Observaciones'] ?></td>
					</tr>
					
					<tr>
					<td colspan="2" align="right"><?php echo "<font size='-1'>".$row['Ult_Registro']."</font>"; ?></td>
					</tr>
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