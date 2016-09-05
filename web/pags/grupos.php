<!DOCTYPE html>
<html lang="es">
   <?php
    require_once ('../principal/head.php');
    $NRec = "";
    if(isset($_GET['Rec'])){
    $NRec = $_GET['Rec'];  
    }
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
              Grupos <?php echo $NRec; ?>
            </h1>
          </div>
          
        </div>
      </div>
    </div>
    <!--breadcrumbs end-->
      <?php
            $consulta = "SELECT * FROM grupos WHERE Rectoria LIKE '%$NRec%'";
            $Campo = "Nombres_Inves";
            $Criterio = "a";
            if(isset($_GET['Criterio']) && isset($_GET['Campo'])){
                $Campo = $_GET['Campo'];
                $Criterio = $_GET['Criterio'];
                $consulta = "SELECT * FROM grupos WHERE $Campo LIKE '%$Criterio%'";
            }
            $url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
            $query = $conexion->query($consulta);
            $num_total_registros = mysqli_num_rows($query);
        ?>
    <!--container start-->
    <div class="container">
      <div class="row">
        <!--blog start-->
        <div class="col-lg-9 ">
          <div class="blog-item">
            
            <?php
				                //Si hay registros
				                if ($num_total_registros > 0) {
				                //Limito la busqueda
				                $TAMANO_PAGINA = 5;
				                $pagina = false;
				                //examino la pagina a mostrar y el inicio del registro a mostrar
				                if (isset($_GET["pagina"]))
				                $pagina = $_GET["pagina"];
				                if (!$pagina) {
				                    $inicio = 0;
				                    $pagina = 1;
				                }
				                else {
				                    $inicio = ($pagina - 1) * $TAMANO_PAGINA;
				                }
				                //calculo el total de paginas
				                $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
                                //pongo el n?mero de registros total, el tama?o de p?gina y la p?gina que se muestra
				                $rs = $conexion->query($consulta." LIMIT ".$inicio."," . $TAMANO_PAGINA);
				                while ($row2= $rs->fetch_assoc()){
				                    $Id = $row2['Id_Investigador'];
				                    $query = $conexion->query("SELECT * FROM investigadores WHERE Id_Investigador = '$Id' ")or die ("Error 1 ".$mysqli->error);
				                    $inte =$query->fetch_assoc();
				                    print("<tr>
				                        <td><h2>".$row2['Nombres']."</h2><br>");
				                        $integ = $row2['Nombres_Inves'];
				                        $integrant = explode('-',$integ);
				                        $numI = count($integrant)-1;
				                        //for ($h=1;$h<$numI;$h++){
				                            //print ("&nbsp;&nbsp;&nbsp;&rarr; ".$integrant[$h]."<br>");
				                        //}
				                        print("<br><b>Sublíneas de Investigación: </b><br>");
                                        $Lineas = $row2['Lineas'];
				                        $Linea = explode('#',$Lineas);
				                        $num = count($Linea)-1;
				                        for ($j=0;$j<$num;$j++){
				                            print ("&nbsp;&nbsp;&nbsp;&rarr; ".$Linea[$j]."<br>");
				                        }
				                        print("</td>
				                            </tr>
				                        ");
				                    }
				                ?>
				            </tbody>
                        </table>
				        <br>
				        <center><?php
				            echo '<h4>';
				            if ($total_paginas > 1) {
				                if ($pagina != 1)
				                echo '<a href="'.$url.'?Campo='.$Campo.'&Criterio='.$Criterio.'&pagina='.($pagina-1).'">&lArr;</a>';
				                for ($i=1;$i<=$total_paginas;$i++) {
				                    if ($pagina == $i)
                                    //si muestro el ?ndice de la p?gina actual, no coloco enlace
				                    echo "&nbsp;<font size'+1' color='#006ed1'>".$pagina."</font>&nbsp;";
				                    else
				                    //coloco el enlace para ir a esa pagina
                                    echo '&nbsp;<a href="'.$url.'?Campo='.$Campo.'&Criterio='.$Criterio.'&pagina='.$i.'">'.$i.'</a>&nbsp;';
                                }
				                if ($pagina != $total_paginas)
				                echo '<a href="'.$url.'?Campo='.$Campo.'&Criterio='.$Criterio.'&pagina='.($pagina+1).'">&rArr;</a>';
				            }
				            echo '</h4>';
                        }else{
                        print("<tr><td><h2>No se encontraron Resultados</h2></td></tr></table>");
				        }
				        ?></center>
              
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
