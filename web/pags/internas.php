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
             Convocatorias Internas
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
                        $consulta1 = $conexion -> query("SELECT * FROM internas WHERE estado1='activado' ORDER BY fecha_inicio1 ASC")or die ("Error 1 ".$mysqli->error);
                        $registros1 = mysqli_num_rows($consulta1);
							while ($row1= $consulta1 ->fetch_assoc()){
								if ($hoy > $row1['fecha_fin1']){
									$conexion -> query("UPDATE internas set estado1='desactivada' WHERE Id_internas=".$row1['Id_internas']."")or die ("Error 1 ".$mysqli->error);
								}
								else {
									print("
										<div class='item'>
											<div class='image'>
												<img src='img/".$row1['imagen1']."'>
											</div>
											<div class='content'>
												<a class='header'>".$row1['titulo1']."</a>
												<div class='meta'>
													<span class='cinema'>Fecha de inicio: ".$row1['fecha_inicio1']."</span>
												</div>
												<div class='description'  style='text-align: justify;'>
													".$row1['oferente1']."
												</div>
												<div class='extra'>
												<a href='ver_in.php?Id=".$row1['Id_internas']."'><div class='ui right floated primary button'>
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
