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
  <div id="da-slider" class="da-slider">
    <div class="da-slide">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2>
              <i>Sistema de Información</i>
              <br>
              <i>ATHENEA</i>
              <br>
              <i>Investigación</i>
            </h2>
            <p>
              <i>Dirección Nacional</i>
              <br />
              <i>de investigación</i>
            </p>
            <a href="../../athenea/admin/index.php" class="btn btn-info btn-lg da-link">
              Ingresar
            </a>

          </div>
        </div>
      </div>
    </div>
    
    <div class="da-slide">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2>
              <i>HISTORIA</i>
              <br />
              <i>Investigadores</i>
              <br />
              <i>Productos</i>
            </h2>
            <p>
              <i>Historia de Investigación</i>
              <br />
              <i>con UNIMINUTO</i>
            </p>
            <a href="../../investigadores/admin/index.php" class="btn btn-info btn-lg da-link">
              Ingresar
            </a>
          </div>
        </div>
      </div>
    </div>


    <div class="da-slide">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2>
              <i>CONVOCATORIAS</i>
            </br>
            <i>Externas - Internas</i>
          </br>
          <i>UNIMINUTO</i>
        </h2>
        <p>
          <i>Dirección Nacional</i>
          <br />
          <i>de Investigación</i>
          <br />
          <i>UNIMINUTO</i>
        </p>
        <a href="../pags/convocatorias.php" class="btn btn-info btn-lg da-link">
          Ver más
        </a>
      </div>
    </div>
  </div>
</div>

<nav class="da-arrows">
  <span class="da-arrows-prev">
  </span>
  <span class="da-arrows-next">
  </span>
</nav>
</div>


<div class="container">
  <div class="row mar-b-50">
    <div class="col-md-12">
      <div class="text-center feature-head wow fadeInDown">
        <h1 class="">
          Noticias
        </h1>

      </div>
      <div class="feature-box">
        <?php
        $consulta = $conexion->query("SELECT * FROM noticias ORDER BY Fecha_cadu DESC LIMIT 3" )or die ("Error 1 ".$mysqli->error);
        while ($row = $consulta->fetch_assoc()){
          print("
            <div class='col-md-4 col-sm-4 text-center wow fadeInUp'>
              <div class='feature-box-heading'>
                <em>
                  <img src='../../athenea/documentos/noticias/".$row['Imagen']."' alt='' height='120px'>
                </em>
                <h4>
                  <b>".$row['Titulo']."</b>
                </h4>
              </div>
              <p class='text-center'>".$row['Resumen']."<br><center><a href='../pags/ver_noticia.php?Id=".$row['Id_noticia']."'>Ver más</a></center></p>
            </div>
            ");
        }
        ?>
      </div>
      <!--feature end-->
    </div>
  </div>
</div>



<div class="property gray-bg">
  <div class="container">

    <div class="row mar-b-60">
      <div class="col-lg-6">
        <!--tab start-->
        <section class="tab wow fadeInLeft">
          <header class="panel-heading tab-bg-dark-navy-blue">
            <ul class="nav nav-tabs nav-justified ">
              <li class="active">
                <a data-toggle="tab" href="#news">
                  Últimas Noticias
                </a>
              </li>
              <li>
                <a data-toggle="tab" href="#events">
                  Convocatorias Internas
                </a>
              </li>
              <li class="">
                <a data-toggle="tab" href="#notice-board">
                  Convocatorias Externas
                </a>
              </li>
            </ul>
          </header>
          <div class="panel-body">
            <div class="tab-content tasi-tab">
              <div id="news" class="tab-pane fade in active">
                <?php
                $consulta1 = $conexion->query("SELECT * FROM noticias ORDER BY Fecha_cadu DESC LIMIT 3" )or die ("Error 1 ".$mysqli->error);
                while ($row1 = $consulta1->fetch_assoc()){
                  print("
                    <article class='media'>
                      <a class='pull-left thumb p-thumb'>
                        <img src='../../athenea/documentos/noticias/".$row1['Imagen']."'>
                      </a>
                      <div class='media-body b-btm'>
                        <a href='../pags/ver_noticia.php?Id=".$row1['Id_noticia']."' class=' p-head'>
                          ".$row1['Titulo']."
                        </a>
                        <p> ".$row1['Resumen']."</p>
                      </div>
                    </article>
                    ");
                }
                ?>
              </div>
              <div id="events" class="tab-pane fade">
                <?php
                $consulta2 = $conexion->query("SELECT * FROM internas ORDER BY Fecha_inicio1 DESC LIMIT 3" )or die ("Error 1 ".$mysqli->error);
                while ($row2 = $consulta2->fetch_assoc()){
                  print("
                    <article class='media'>
                      <a class='pull-left thumb p-thumb'>
                        <img src='../../athenea/documentos/convocatorias/internas/".$row2['imagen1']."'>
                      </a>

                      <div class='media-body b-btm'>
                        <a href='../pags/ver_interna.php?Id=".$row2['Id_internas']."' class='cmt-head'>
                          ".$row2['titulo1']."
                        </a>
                        <p>

                          <i class='fa fa-time'>
                          </i>
                          Fecha de inicio: ".$row2['fecha_inicio1']."
                        </p>
                      </div>
                    </article>
                    ");
                }
                ?> 
              </div>
              <div id="notice-board" class="tab-pane fade">
                <?php
                $consulta3 = $conexion->query("SELECT * FROM externas ORDER BY Fecha_inicio DESC LIMIT 3" )or die("Error 1 ".$mysqli->error);
                while ($row3 = $consulta3->fetch_assoc()){
                  print("
                    <article class='media'>
                      <a class='pull-left thumb p-thumb'>
                        <img src='../../athenea/documentos/convocatorias/externas/".$row3['imagen']."'>
                      </a>
                      <div class='media-body b-btm'>
                        <a href='../pags/ver_externa.php?Id=".$row3['Id_externas']."' class='cmt-head'>
                          ".$row3['titulo']."
                        </a>
                        <p>

                          <i class='fa fa-time'>
                          </i>
                          Fecha de inicio: ".$row3['fecha_inicio']."
                        </p>
                      </div>
                    </article>
                    ");
                }
                ?> 
              </div>
            </div>
          </div>
        </section>
        <!--tab end-->
      </div>
      <div class="col-lg-6">
        <!--testimonial start-->
        <div class="about-testimonial boxed-style about-flexslider ">
          <section class="slider wow fadeInRight">
            <div class="flexslider">
              <ul class="slides about-flex-slides">
                <li>
                  <div class="about-testimonial-image ">
                    <img alt="" src="http://biblioteca.uniminuto.edu/ojs/public/journals/9/journalThumbnail_es_ES.jpg">
                  </div>
                  <a class="about-testimonial-author" target="_blank" href="http://biblioteca.uniminuto.edu/ojs/index.php/praxis">
                    Práxis Pedagógica
                  </a>
                  <span class="about-testimonial-company">
                    Revista
                  </span>
                  <div class="about-testimonial-content">
                    <p class="about-testimonial-quote">
                      Revista de la Facultad de Educación de la Corporación Universitaría Minuto de Dios
                    </p>
                  </div>
                </li>
                <li>
                  <div class="about-testimonial-image ">
                    <img alt="" src="http://biblioteca.uniminuto.edu/ojs/public/journals/6/journalThumbnail_es_ES.jpg">
                  </div>
                  <a class="about-testimonial-author" target="_blank" href="http://biblioteca.uniminuto.edu/ojs/index.php/DYG">
                    Desarrollo & Gestión
                  </a>
                  <span class="about-testimonial-company">
                    Revista
                  </span>
                  <div class="about-testimonial-content">
                    <p class="about-testimonial-quote">
                      El Objetivo de Desarrollo y Gestión lo constituye ser un canal de divulgación, interacción y reflexión de las funciones sustantivas de docencia, investigación y proyección social; todo esto en relación con las nuevas tendencias y paradigmas de las ciencias empresariales para que transciendan en la formación y el desarrollo de estudiantes, profesores e investigadores de la facultad y otros espacios académicos de la vida nacional e internacional.
                    </p>
                  </div>
                </li>
                <li>
                  <div class="about-testimonial-image ">
                    <img alt="" src="http://biblioteca.uniminuto.edu/ojs/public/journals/5/journalThumbnail_es_ES.jpg">
                  </div>
                  <a class="about-testimonial-author" target="_blank" href="http://biblioteca.uniminuto.edu/ojs/index.php/med">
                    Mediaciones
                  </a>
                  <span class="about-testimonial-company">
                    Revista
                  </span>
                  <div class="about-testimonial-content">
                    <p class="about-testimonial-quote">
                      Publicación de difusión científica y académica, de periodicidad semestral, editada por la Facultad de Ciencias de la Comunicación de la Corporación Universitaria Minuto de Dios - UNIMINUTO.
                    </p>
                  </div>
                </li>
                <li>
                  <div class="about-testimonial-image ">
                    <img alt="" src="http://biblioteca.uniminuto.edu/ojs/public/journals/4/journalThumbnail_es_ES.jpg">
                  </div>
                  <a class="about-testimonial-author" target="_blank" href="http://biblioteca.uniminuto.edu/ojs/index.php/POLI">
                    Polisemia
                  </a>
                  <span class="about-testimonial-company">
                    Revista
                  </span>
                  <div class="about-testimonial-content">
                    <p class="about-testimonial-quote">
                      Revista de la Facultad de Ciencias Humanas y Sociales y el Centro de Invetigación Humano y Social CEIHS.
                    </p>
                  </div>
                </li>
                <li>
                  <div class="about-testimonial-image ">
                    <img alt="" src="http://biblioteca.uniminuto.edu/ojs/public/journals/2/homepageImage_es_ES.png">
                  </div>
                  <a class="about-testimonial-author" target="_blank" href="http://biblioteca.uniminuto.edu/ojs/index.php/Inventum">
                    Inventum
                  </a>
                  <span class="about-testimonial-company">
                    Revista
                  </span>
                  <div class="about-testimonial-content">
                    <p class="about-testimonial-quote">
                      Publicación semestral de los resultados de investigación de la Facultad de Ingeniería.
                    </p>
                  </div>
                </li>
              </ul>
            </div>
          </section>
        </div>
        <!--testimonial end-->
      </div>
    </div>
  </div>
</div>

<div id="home-services">

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>
          Dirección Nacional de Investigación
        </h2>
      </div>

      <div class="col-md-4">
        <div class="h-service">
          <div class="icon-wrap ico-bg round-fifty wow fadeInDown">
            <i class="fa fa-question">
            </i>
          </div>
          <div class="h-service-content wow fadeInUp">
            <h3>
              PUBLICACIONES
            </h3>
            <p>
              Aquí podras encontrar un historial de todos los artículos, libros, capítulos de libros, ponencias y demás publicaciones que UNIMINUTO ha realizado.
              <br>
              Ver <a href="../pags/articulos.php">
              Artículos,
            </a>
            <a href="../pags/capitulos.php">
              Capítulos,
            </a>
            <a href="../pags/libros.php">
              Libros,
            </a>
            <a href="../pags/ponencias.php">
              Ponencias
            </a>
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="h-service">
        <div class="icon-wrap ico-bg round-fifty wow fadeInDown">
          <i class="fa fa-h-square">
          </i>
        </div>
        <div class="h-service-content wow fadeInUp">
          <h3>
            PROYECTOS
          </h3>
          <p>
            En este espacio encontraras todos lo proyectos que UNIMINUTO actualmente tiene en desarrollo tanto como entidad como por alianza.
            <br>
            <a href="../pags/proyectos.php">
              Ver Proyectos
            </a>
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="h-service">
        <div class="icon-wrap ico-bg round-fifty wow fadeInDown">
          <i class="fa fa-users">
          </i>
        </div>
        <div class="h-service-content wow fadeInUp">
          <h3>
            GRUPOS
          </h3>
          <p>
            Aquí se encuentran todos los grupos de investigación con lo que cuenta UNIMINUTO a nivel Nacional.
            <br>
            <a href="../pags/grupos.php">
              Ver Grupos
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- /row -->

</div>
<!-- /container -->

</div>
<!-- service end -->
<div class="hr">
  <span class="hr-inner"></span>
</div>

<?php require_once('../principal/footer.php'); 
require_once('../principal/footerscript.php');
?>
</body>
</html>