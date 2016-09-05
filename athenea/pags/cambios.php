$consulta = $conexion->query("SELECT * FROM noticias ORDER BY Fecha_cadu DESC LIMIT 3" )or die ("Error 1 ".$mysqli->error);
while ($row = $consulta->fetch_assoc())