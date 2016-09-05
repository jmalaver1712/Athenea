<?php
$con1 = "SELECT * FROM investigadores WHERE Rectoria LIKE '%$Acc_Rect%' AND Sede_CR LIKE '%$Acc_Sede%' ";
$query1 = $conexion -> query($con1);
?>
<script>
	$(function () {
		<?php
		while($row1= $query1->fetch_assoc()) {
		//se reciben los valores y se almacenan en un arreglo
			$elementos1[]= '"'.$row1['Nombres'].'"';
		}
		$arreglo1= implode(", ", $elementos1);//junta los valores del array en una sola cadena de texto
		?>	
		var availableTags1 = new Array(<?php echo $arreglo1; ?>);//imprime el arreglo dentro de un array de javascript	
		$( "#nombre" ).autocomplete({source: availableTags1});
		$( "#nombre1" ).autocomplete({source: availableTags1});
		$( "#nombre2" ).autocomplete({source: availableTags1});
	});
</script>

<?php
$con2 = "SELECT * FROM grupos WHERE Rectoria LIKE '%$Acc_Rect%' AND Sede_CR LIKE '%$Acc_Sede%'";
//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
$query2 = $conexion -> query($con2);
?>
<script>
	$(function () {
		<?php
		while($row2= $query2->fetch_assoc()) {
//se reciben los valores y se almacenan en un arreglo
			$elementos2[]= '"'.$row2['Nombres'].'"';
		}
$arreglo2= implode(", ", $elementos2);//junta los valores del array en una sola cadena de texto
?>	
var availableTags2 =new Array(<?php echo $arreglo2; ?>);//imprime el arreglo dentro de un array de javascript	
$( "#grupo" ).autocomplete({
	source: availableTags2
});
});
</script>

<?php

$con3 = "SELECT * FROM semilleros WHERE Rectoria LIKE '%$Acc_Rect%' AND Sede_CR LIKE '%$Acc_Sede%'";
//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
$query3 = $conexion -> query($con3);
?>
<script>
	$(function () {
		<?php
while($row3= $query3->fetch_assoc()) {//se reciben los valores y se almacenan en un arreglo
	$elementos3[]= '"'.$row3['Nombres'].'"';
}
$arreglo3= implode(", ", $elementos3);//junta los valores del array en una sola cadena de texto
?>	
var availableTags3 =new Array(<?php echo $arreglo3; ?>);//imprime el arreglo dentro de un array de javascript	
$( "#semillero" ).autocomplete({
	source: availableTags3
});
});
</script>

<?php

$con5 = "SELECT * FROM redes WHERE Rectoria LIKE '%$Acc_Rect%' AND Sede_CR LIKE '%$Acc_Sede%' ";
//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
$query5 = $conexion -> query($con5);
?>
<script>
	$(function () {
		<?php
while($row5= $query5->fetch_assoc()) {//se reciben los valores y se almacenan en un arreglo
	$elementos5[]= '"'.$row5['Nombre'].'"';
}
$arreglo5= implode(", ", $elementos5);//junta los valores del array en una sola cadena de texto
?>	
var availableTags5 =new Array(<?php echo $arreglo5; ?>);//imprime el arreglo dentro de un array de javascript	
$( "#Redes" ).autocomplete({
	source: availableTags5
});
});
</script>