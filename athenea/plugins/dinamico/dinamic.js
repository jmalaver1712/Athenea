
//Facultad
function facultad(z){
if (z == "Otro"){
document.getElementById('Facultad2').disabled = false
}
else (
document.getElementById('Facultad2').disabled = true
)
}


//Articulo Indexado
function index(x){
if (x == "SI"){
document.getElementById('detalles').disabled = false
}
else{
document.getElementById('detalles').disabled = true
}
}



// Vinculo con UNIMINUTO
function check(){
if (document.getElementById("Vinculo").checked){
document.getElementById('labora').style.display = "block"
}
else {
document.getElementById('labora').style.display = "none"
}
}


var red = 0;
function redJS(){
	var Redes = document.getElementById("Redes").value;
	red = red + 1;
	var NvoCampo= document.createElement("div");
	NvoCampo.id= "div_red"+red;
	NvoCampo.innerHTML= 
		"        <input type='text' value='"+Redes+"' name='Red_G"+red+"' id='Red_G"+red+"' >" +
		"        <a href='JavaScript:quitarRed("+red+");'> Quitar </a>";
	var contenedor= document.getElementById("RedesCONT");
    contenedor.appendChild(NvoCampo);
	document.getElementById("Redes").value = ""
  }
function quitarRed(idred){
  var eliminar = document.getElementById("div_red"+idred);
  var contenedor= document.getElementById("RedesCONT");
  contenedor.removeChild(eliminar);
}


function facultad(z){
if (z == "Otro"){
document.getElementById('Facultad2').disabled = false
}
else (
document.getElementById('Facultad2').disabled = true
)
}




var tra = 0;
function Trayectoria(){
	var Fecha_Ini = document.getElementById("Fecha_Ini").value;
	var Fecha_Fin = document.getElementById("Fecha_Fin").value;
	tra = tra + 1;
	if(document.getElementById("Fecha_Act").checked){
	Fecha_Fin = "ACTUALIDAD";
	
	}
	var NvoCampo= document.createElement("div");
	NvoCampo.id= "Fechas"+tra;
	NvoCampo.innerHTML= 
		"        <input type='text' value='"+Fecha_Ini+"' name='Fecha_Ini"+tra+"'>" +
		"        <input type='text' value='"+Fecha_Fin+"' name='Fecha_Fin"+tra+"'>" +
		"        <a href='JavaScript:quitarFecha("+tra+");'>Quitar</a>";
	var contenedor= document.getElementById("Trayecto");
    contenedor.appendChild(NvoCampo);
  }
function quitarFecha(Id_F){
  var eliminar = document.getElementById("Fechas"+Id_F);
  var contenedor= document.getElementById("Trayecto");
  contenedor.removeChild(eliminar);
}


var cat = 0;
function cateJS(){
	var Categoria = document.getElementById("Categoria").value;
	var Ano_Categoria = document.getElementById("Ano_Categoria").value;
	cat = cat + 1;
	var NvoCampo= document.createElement("div");
	NvoCampo.id= "Categorias"+cat;
	NvoCampo.innerHTML= 
		"        <input type='text' value='"+Ano_Categoria+" - "+Categoria+ "' name='Categoria"+cat+"' id='Categoria"+cat+"' size='15' >" +
		"        <a href='JavaScript:quitarCate("+cat+");'> Quitar </a>";
	var contenedor= document.getElementById("CategoriasT");
    contenedor.appendChild(NvoCampo);
  }
function quitarCate(Id_Cate){
  var eliminar = document.getElementById("Categorias"+Id_Cate);
  var contenedor= document.getElementById("CategoriasT");
  contenedor.removeChild(eliminar);
}


var ben = 0;
function beneJS(){
	var FechaIni_Ben = document.getElementById("FechaIni_BEN").value;
	var FechaFin_Ben = document.getElementById("FechaFin_BEN").value;
	var Tipo_Ben = document.getElementById("Tipo_BEN").value;
	var Monto_Ben = document.getElementById("Monto_BEN").value;
	var Obser_Ben = document.getElementById("Obser_BEN").value;
	ben = ben + 1;
	var NvoCampo= document.createElement("div");
	NvoCampo.id= "Ben"+ben;
	NvoCampo.innerHTML= 
		"        <input type='hidden' value='"+FechaIni_Ben+"' name='FechaIni_Ben"+ben+"' id='FechaIni_Ben"+ben+"' >" +
		"        <input type='hidden' value='"+FechaFin_Ben+"' name='FechaFin_Ben"+ben+"' id='FechaFin_Ben"+ben+"'  >" +
		"        <input type='text' value='"+Tipo_Ben+"' name='Tipo_Ben"+ben+"' id='Tipo_Ben"+ben+"' size='15' >" +
		"        <input type='number' value='"+Monto_Ben+"' name='Monto_Ben"+ben+"' id='Monto_Ben"+ben+"' >" +
		"        <input type='text' value='"+Obser_Ben+"' name='Obser_Ben"+ben+"' id='Obser_Ben"+ben+"' >" +
		"        <a href='JavaScript:quitarBene("+ben+");'> Quitar </a>";
	var contenedor= document.getElementById("BenefeCONT");
    contenedor.appendChild(NvoCampo);
	document.getElementById("FechaFin_BEN").value = ""
	document.getElementById("FechaIni_BEN").value = ""
	document.getElementById("Monto_BEN").value = ""
	document.getElementById("Obser_BEN").value = ""
  }
function quitarBene(idben){
  var eliminar = document.getElementById("Ben"+idben);
  var contenedor= document.getElementById("BenefeCONT");
  contenedor.removeChild(eliminar);
}


var rec = 0;
function reconoJS(){
	var Fecha_Reco = document.getElementById("Fecha_REC").value;
	var Reconocimiento = document.getElementById("Recono_REC").value;
	var Institucion_Reco = document.getElementById("Insti_REC").value;
	var Observaciones_Reco = document.getElementById("Obser_REC").value;
	rec = rec + 1;
	var NvoCampo= document.createElement("div");
	NvoCampo.id= "Reco"+rec;
	NvoCampo.innerHTML= 
		"        <input type='hidden' value='"+Fecha_Reco+"' name='Fecha_Reco"+rec+"' id='Fecha_Reco"+rec+"' >" +
		"        <input type='text' value='"+Reconocimiento+"' name='Reconocimiento"+rec+"' id='Reconocimiento"+rec+"' >" +
		"        <input type='text' value='"+Institucion_Reco+"' name='Institucion_Reco"+rec+"' id='Institucion_Reco"+rec+"' >" +
		"        <input type='text' value='"+Observaciones_Reco+"' name='Observaciones_Reco"+rec+"' id='Observaciones_Reco"+rec+"' >" +
		"        <a href='JavaScript:quitarReco("+rec+");'> Quitar </a>";
		
	var contenedor= document.getElementById("ReconoCONT");
    contenedor.appendChild(NvoCampo);
	document.getElementById("Fecha_REC").value = ""
	document.getElementById("Recono_REC").value = ""
	document.getElementById("Insti_REC").value = ""
	document.getElementById("Obser_REC").value = ""
  }
function quitarReco(idrec){
  var eliminar = document.getElementById("Reco"+idrec);
  var contenedor= document.getElementById("ReconoCONT");
  contenedor.removeChild(eliminar);
}


var est = 0;
function estudios(){
	var nivel = document.getElementById("nivel").value;
	var titulo = document.getElementById("titulo").value;
	var institucion = document.getElementById("institucion").value;
	est = est + 1;
	var NvoCampo= document.createElement("div");
	NvoCampo.id= "estu"+est;
	NvoCampo.innerHTML= 
		"        <input type='text' value='"+nivel+"' name='nivel"+est+"' id='nivel"+est+"' size='8' >" +
		"        <input type='text' value='"+titulo+"' name='titulo"+est+"' id='titulo"+est+"' size='30' >" +
		"        <input type='text' value='"+institucion+"' name='institucion"+est+"' id='institucion"+est+"' size='30' >" +
		"        <a href='JavaScript:quitarEst("+est+");'> Quitar </a>";
	var contenedor= document.getElementById("estudio");
    contenedor.appendChild(NvoCampo);
	document.getElementById("titulo").value = ""
	document.getElementById("institucion").value = ""
  }
function quitarEst(idest){
  var eliminar = document.getElementById("estu"+idest);
  var contenedor= document.getElementById("estudio");
  contenedor.removeChild(eliminar);
}



var aut =0;
function agregarAutor(){
	var nombre = document.getElementById("nombre1").value;
	var Rol = document.getElementById("RolAut").value;
	aut = aut + 1;
	var NvoCampo= document.createElement("div");
	NvoCampo.id= "divcampo_"+(aut);
	NvoCampo.innerHTML= 
		"        <input type='text' value='"+nombre+"' name='Nombres"+aut+"' id='Nombres"+aut+"' size='40' >" +
		"        <input type='text' value='"+Rol+"' name='RolAut"+aut+"' id='RolAut"+aut+"' size='15' >" +
		"        <a href='JavaScript:quitarAutor(" + aut +");'> Quitar </a>";
	var contenedor= document.getElementById("contenedorcampos");
    contenedor.appendChild(NvoCampo);
	document.getElementById("nombre1").value = "";
  }
function quitarAutor(iddiv){
  var eliminar = document.getElementById("divcampo_" + iddiv);
  var contenedor= document.getElementById("contenedorcampos");
  contenedor.removeChild(eliminar);
}




var campos =0;
function agregarCampo(){
	var nombre = document.getElementById("nombre1").value;
	campos = campos + 1;
	var NvoCampo= document.createElement("div");
	NvoCampo.id= "divcampo_"+(campos);
	NvoCampo.innerHTML= 
		"        <input type='text' value='"+nombre+"' name='Nombres"+campos+"' id='Nombres"+campos+"' size='40' >" +
		"        <a href='JavaScript:quitarCampo(" + campos +");'> Quitar </a>";
	var contenedor= document.getElementById("contenedorcampos");
    contenedor.appendChild(NvoCampo);
	document.getElementById("nombre1").value = "";
  }
function quitarCampo(iddiv){
  var eliminar = document.getElementById("divcampo_" + iddiv);
  var contenedor= document.getElementById("contenedorcampos");
  contenedor.removeChild(eliminar);
}





var campos2 =0;
function dinamica(){
	var dim = document.getElementById("valor").value;
	campos2 = campos2 + 1;
	var NvoCampo= document.createElement("div");
	NvoCampo.id= "divcampo_"+(campos2);
	NvoCampo.innerHTML= 
		"        <input type='text' value='"+dim+"' name='dim"+campos2+"' id='dim"+campos2+"' size='50' >" +
		"        <a href='JavaScript:quitar(" + campos2 +");'> Quitar </a>";
	var contenedor= document.getElementById("dinamismo");
    contenedor.appendChild(NvoCampo);
	document.getElementById("valor").value = "";
  }
function quitar(iddiv){
  var eliminar = document.getElementById("divcampo_" + iddiv);
  var contenedor= document.getElementById("dinamismo");
  contenedor.removeChild(eliminar);
}



function cambia(id){
if (id == "grupos"){
document.getElementById('grupo').style.display = "block"
document.getElementById('semillero').style.display = "none"
}
if (id == "semilleros"){
document.getElementById('grupo').style.display = "none" 
document.getElementById('semillero').style.display = "block"
}
}



function confirmDelete(link) {
	if (confirm("¿Está seguro de borrar esta información?")) {
		doAjax(link.href, "POST"); // doAjax needs to send the "confirm" field
	}
	return false;
}



function validar(){
var txt = document.getElementById('CvLAC').value
var n = txt.indexOf("190.216.132.131:")
if(n == "-1"){
alert ("El enlace a CvLAC no es Valido")
document.getElementById('CvLAC').value = ""
document.getElementById('CvLAC').focus()
return false
}
return true
}



function docs(){
if (document.getElementById("Enlace").checked){
document.getElementById('Enlace1').style.display = "block"
document.getElementById('Enlace1').required = true;
document.getElementById('Documento1').style.display = "none"
document.getElementById('Documento1').required = false;
}
if (document.getElementById("Documento").checked){
document.getElementById('Documento1').style.display = "block"
document.getElementById('Documento1').required = true;
document.getElementById('Enlace1').style.display = "none"
document.getElementById('Enlace1').required = false;
}
}



function muestra(){
e1 = document.getElementById('e1')
e2 = document.getElementById('e2')
e3 = document.getElementById('e3')
Subir = document.getElementById('Subir')
if (e1.checked){
document.getElementById('nombre').style.display = "block"
}
if (e2.checked){
document.getElementById('grupo').style.display = "block"
}
if (e3.checked){
document.getElementById('semillero').style.display = "block"
}


if (Subir.checked)
{document.getElementById('Cambia').value = "Cambiar"
document.getElementById('editdoc').style.display = "block"
document.getElementById('doc').required = true
}
else{document.getElementById('Cambia').value = ""
document.getElementById('editdoc').style.display = "none"
document.getElementById('doc').required = false
}

}