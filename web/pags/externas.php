<!DOCTYPE html>
<html lang="en">
   <?php
    require_once ('../principal/head.php');
    ?>

  <body>
    <!--header start-->
    <?php
        require_once('../principal/header.php');
      ?>
    <!--header end-->

    <!--breadcrumbs start-->
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-4">
            <h1>
             Convocatorias Externas
            </h1>
          </div>
          
        </div>
      </div>
    </div>
    <!--breadcrumbs end-->
    <!--container start-->
    <div class="container">
      <div class="row">
        <!--blog start-->
        <div class="col-lg-9 ">
          <div class="blog-item">
            <table width='100%'>
            <?php
            $hoy = date("Y-m-d");
						$consulta = $conexion->query("SELECT * FROM externas WHERE estado='activado' ORDER BY fecha_inicio ASC")or die ("Error 1 ".$mysqli->error);
						$registros = mysqli_num_rows($consulta);
						while ($row= $consulta->fetch_assoc()){
							if ($hoy > $row['fecha_fin']){
								$conexion->query("UPDATE externas set estado='desactivada' WHERE Id_externas=".$row['Id_externas']."")or die ("Error 1 ".$mysqli->error);
							}
							else{
									print("
										<div class='item'>
											<div class='image'>
												<img src='../admin/img/".$row['imagen']."'>
											</div>
											<div class='content'>
												<a class='header'>".$row['titulo']."</a>
												<div class='meta'>
													<span class='cinema'>Fecha de inicio: ".$row['fecha_inicio']."</span>
												</div>
												<div class='description'  style='text-align: justify;'>
													".$row['oferente']."
												</div>
												<div class='extra'>
												<a href='ver_ext.php?Id=".$row['Id_externas']."'><div class='ui right floated primary button'>
													Ver  Convocatoria
													<i class='right chevron icon'></i>
												</div></a>
											  </div>
											</div>
										</div>										
									");
								}
							}
						?>
            </table>
              
          </div>
          
          

          

        </div>

        <div class="col-lg-3">
          <div class="blog-side-item">
            <div class="search-row">
              <input type="text" class="form-control" placeholder="Buscar aquí">
            </div>

              <?php require_once('../principal/sede.php'); ?>
              
            <?php require_once('../principal/etiquetas.php'); ?>
          </div>
        </div>

        <!--blog end-->
      </div>

    </div>
    <!--container end-->

    <!--footer start-->
    
    <!-- footer end -->
     <?php require_once('../principal/footer.php'); ?>

    <!--small footer end-->

    <!-- js placed at the end of the document so the pages load faster -->
    <?php 
        require_once('../principal/footerscript.php');
?>

  </body>
</html>
