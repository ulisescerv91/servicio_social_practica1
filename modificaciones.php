<?
  /******************************************************************************/
  /* © Copyright PGJ 2012-2014. All rights reserved.                            */
  /*                                                                            */
  /* Name: ejemplo_alta                                                      	*/
  /*                                                                            */
  /* Language: PHP/JavaScript                                                   */
  /*                                                                            */
  /* Function: Main record page						                            */
  /*                                                              
                */
  /*                                                                            */
  /*----------------------------------------------------------------------------*/
  /*   Date   | Item #  |  Name & Flag   | Explanation of Change                */
  /*----------------------------------------------------------------------------*/
  /*21-02-2014|         |F. Lares        |-Initial Version                      */ 
  /******************************************************************************/
?>

<? include ("../funciones.php");

   include ("../menu-ejemplo.php");

   ini_set("display_errors","0"); 
   ?>




<? 



if (/*Session abierta*/1==0)
  {
    ?>
    <SCRIPT LANGUAGE="JavaScript">
    <!-- 
    window.location="../index.html";
    // -->
    </script> 
  <?
  }
else {

?>

<html>
<head>



<title>PGJE COLIMA</title>
<link rel="stylesheet" type="text/css" href="../fuentes.css" />
<link rel="stylesheet" type="text/css" href="../tablas.css" />

<!-- ENLACES PARA MENU DE CADA APLICACION -->
<link rel="stylesheet" type="text/css" href="../menu/csshorizontalmenu.css" />
<script type="text/javascript" src="../menu/csshorizontalmenu.js"></script>


<script type="text/javascript" src="js_funciones.js"></script>
<!-- FIN DE MENU DE CADA APLICACION -->











<script type="text/javascript">


function validacion()
		 {
			 
			 //se toman los valores de los campos  a validar
			var	nombre= document.getElementById("plantilla_nombre").value;
			var lista_categoria=document.getElementById("categoria").selectedIndex;	
			var lista_subcatego=document.getElementById("subcategoria").selectedIndex;	
			var lista_dir=document.getElementById("id_direccion").selectedIndex;	
			
			
			
			
//nombre de formulario

		  	if( nombre == null || nombre.length == 0 || /^\s+$/.test(nombre) ) 
		  	{
				//si valor no tiene nada o
				//si valor tiene 0 caracteres O
				///^\s+$/.test(valor)  si el campo solo tiene puros espacion en blanco
				alert("El campo de Nombre esta vacio");
				  return false;

			}			
			
//categoria de formulario
					
			else if (lista_categoria==null || lista_categoria==0) 
			{

   					 alert('selecciona una CATEGORIA');
				    return false;
  			}
			
			
//subcategoria  de formulario			
			else if (lista_subcatego==null || lista_subcatego==0) 
			{

   					 alert('selecciona una SUB-CATEGORIA');
				    return false;
  			}
			
			
			
//direcccion de formulario			
			else if (lista_dir==null || lista_dir==0) 
			{

   					 alert('selecciona una DIRECCION');
				    return false;
  			}
			
			
		return true;


		}
</script>






<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	margin-top: 0px;
}
.Estilo1 {color: #666666}
.Estilo2 {font-size: 16px}

-->
</style>

   <SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
	  
/**
 * Creates a dinamic linked list
 * @param db 			- Database name (nombre de la base de datos)
 * @param table			- Table name (nombre de la tabla)
 * @param id_field		- Field id (campo con el que se compara)
 * @param name_field	- Field name (texto de la lista)
 * @param value			- Field value( Valor con el que comparas id_field)
 * @param id_list		- Select value (valor de la lista)
 * @param id_select		- Select name id(id donde ponemos el resultado)
 */
function list_query(db,table,id_field,name_field,value,id_list,id_select)
{
	var extra=arguments[arguments.length-1];
	var ajax= new XMLHttpRequest();	
	//alert('test');
	ajax.onreadystatechange = function()
	{
		//procesing
		if(ajax.readyState == 1)
		{
			document.getElementById(id_select).innerHTML = 'Cargando datos...';
		}
		//processed
		if(ajax.readyState == 4)
		{
			document.getElementById(id_select).innerHTML = ajax.responseText;
			//alert(id_select);
		}
	}
	ajax.open("get","list_query.php?db="+db+"&table="+table+"&id_field="+id_field+"&name_field="+name_field+"&value="+value+"&id_list="+id_list+"&extra="+extra, false);
	//alert("list_query.php?db="+db+"&table="+table+"&id_field="+id_field+"&name_field="+name_field+"&value="+value+"&id_list="+id_list+"&extra="+extra);
	ajax.send();
}	  
	  
   </SCRIPT>


<script>


function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	return false;
	return true;
}

function comillaKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode ==34 || charCode == 39)
	return false;
	return true;
}

/**
 * Mayusculas function upcase the words
 * @param objecto - object
 */                      				  
function Mayusculas(Objeto)
{
	Objeto.value=Objeto.value.toUpperCase();
}


</script>


<SCRIPT LANGUAGE="JavaScript" SRC="../calendario/CalendarPopup.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript">
	var cal = new CalendarPopup();
	cal.showYearNavigation();
	cal.showYearNavigationInput();
</SCRIPT>


<!-- solo si se va usar CLENDARIO EN FORMULARIO  dejar codigo -->
<SCRIPT LANGUAGE="JavaScript" SRC="../calendario/Calendario.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript">document.write(getCalendarStyles());</SCRIPT>
<SCRIPT LANGUAGE="JavaScript" ID="jscal1xx">var cal1xx = new CalendarPopup("testdiv1");cal1xx.showNavigationDropdowns();</SCRIPT>
<SCRIPT LANGUAGE="JavaScript">writeSource("jscal1xx");</SCRIPT>
<SCRIPT LANGUAGE="JavaScript" ID="jscal1xx2">var cal1xx2 = new CalendarPopup("testdiv2");cal1xx2.showNavigationDropdowns();</SCRIPT>
<SCRIPT LANGUAGE="JavaScript">writeSource("jscal1xx2");</SCRIPT>
<!-- FIN CALENDARIO EN FORMULARIO -->

</head>









<body >




           <?php
		   
		   
#conexion a la base de datos


include ('conexion.php');
		  #$dbBusqueda=ConectarSQL();
		  #$selected = mssql_select_db("ssocial_practicas", $dbBusqueda) or die("NO SE PUEDE ABRIR dB complaint");
	
	
	
$id = $_GET['ref']; #se recibe el valor del dato que se envio de la otra pag
	
	#conexion y seleccion de tabla de la base de datos
  $con=mssql_connect($host,$user,$pw) or die('PROBLEMAS AL CONECTAR CON EL HOST');
		 mssql_select_db($bd,$con)or die('problemas al conectar con la base de datos');
		   
		   
		   
		   
		   #para vacias los datos de hechos que fueron guardados
 	//////////////////////////////////////////		hechos	
		$sql_hechos="
		 	  SELECT [echos1_db]
		  			,[echos2_db]
		  			,[echos3_db]
		  			,[echos4_db]
		  			,[echos5_db]									
		  			,[echos6_db]
		  			,[echos7_db]
		  
		  
			  
			FROM [ssocial_practicas].[dbo].[sechos_db] 
			
			where id_user = '$id'
			
		  ";
		
		  
		  
		  $resultados=mssql_query($sql_hechos);
		  while ($row1=mssql_fetch_array($resultados))	
		  {
			  
			
			  
			  
	
	?>		  




<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="22"><img src="../imagenes/banner-publicidad.gif" width="245" height="122"><img src="../banner-titulo-actas&aps.png" width="561" height="122"><img src="../banner-concepto.gif" width="194" height="122"></td>
  </tr>
  <tr>
    <td>
    
   
    
    
	<iframe name="menu-principal" width="1000" height="120" src="../menu-principal.php"  scrolling="no"  frameborder="0"  vspace="0" hspace="0"></iframe>	</td>
  </tr>
  <tr>
    <td height="22">
<?	
echo menu_ejemplo();
?>		
	</td>
  </tr>
  <tr>
    <td height="48" align="left" valign="top" background="../imagenes/pag-titulo.png"><table width="937" border="0">
      <tr>
        <td width="28">&nbsp;</td>
        <td width="899" class="Pagina-TITULO">EJEMPLO - ALTA </td>
        <td width="899" class="Tablas-Titulo"><div align="right"><?php echo "Nombre de la Persona"; ?></div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="99"><table width="990" align="center" cellpadding="0" cellspacing="0" class="FONDO_PAGINAS">
      <tr>
        <td width="988" height="191" align="left" valign="top">
<?	
	

	if(1>0)  {
	//SI ES CORRECTO SU USUARIO Y CLAVE
	//============================================================================
?>
	
	
	
    
    
             




    
    
    
    
    
    

<form  onsubmit="return validacion()"  name="Form1" id="Form1" method="post" action="update.php" >

<!--pongo el id del usuario que se va a modificar en un txtbox invisible-->
 <input type="text" id="ids" name="clave" size="3" hidden="true" value="<?php echo $_GET['ref'];?> "

<!--para recuperar el id de el usuario que se seleccionio-->





<!--para recuperar la fecha actual para guardar, este no se veera en la pag-->
<input type="hidden"  name="fechas" value="<?php  echo date("Y-m-d");  ?>">



<table width="930" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="55" background="../imagenes/cuadro-sup1.png">&nbsp;</td>
    <td width="828" background="../imagenes/cuadro-sup2.png">&nbsp;</td>
    <td width="55" background="../imagenes/cuadro-sup3.png">&nbsp;</td>
  </tr>
  <tr>
    <td background="../imagenes/cuadro-cent1.png">&nbsp;</td>
    <td bgcolor="#FFFFFF"><table width="819" border="0">
      <tr>
        <td width="813">
        <fieldset><legend>
                <label class="Campos-Formulario">
                  GENERALES DEL PLANTILLA
                  </label>
                </legend>
        <table width="820" border="0" align="center">
          <tr>
            <td class="Campos-Formulario">&nbsp;</td>
            <td colspan="7" class="Campos-Formulario">&nbsp;</td>
          </tr>
          <tr>
            <td width="130" class="Campos-Formulario"><span class="Cuadro-ContenidoError">*</span>NOMBRE:</td>
            <td class="Campos-Formulario" colspan="7"><label for="paterno2"></label>
              <input name="plantilla_nombre"   type="text" class="Campos-Contenido" id="plantilla_nombre" size="100" onChange="Mayusculas(this);" >
              <label for="tipo_archivo3"></label></td>
          </tr>

          <tr>
            <td><span class="Cuadro-ContenidoError">*</span><span class="Campos-Formulario">CATEGORIA</span></td>
            <td width="140" colspan="">
            <select name="categoria" class="Campos-Contenido" id="categoria" style="width:140">
              <option 	value="0" selected="selected">&lt; --CATEGORIA-- &gt;</option>
              
               
               
               
             <?php 
				include ('conexion.php');

		
  $con=mssql_connect($host,$user,$pw) or die('PROBLEMAS AL CONECTAR CON EL HOST');
		 mssql_select_db($bd,$con)or die('problemas al conectar con la base de datos');
 
 #se seleccion los campos de la pag consultas
		  $sql="
		  SELECT 
				 [id_categoria]
				,[opc_categoria]
				
			FROM [ssocial_practicas].[dbo].[scategorias_db] 
		  ";
	  
while ($row=mssql_fetch_array($resultados))
		  
		  echo $sql;	  			  

		  $resultados=mssql_query($sql);

		  while ($row=mssql_fetch_array($resultados))	
		  {   	
			?>
            
             <option value="<?PHP echo $row['opc_categoria'];?>" >&lt; <?PHP echo $row['opc_categoria'];?> &gt;</option>
             
            
            
      <?php 
		  }  # llave del while
		  ?>
                
                      <? //Formulario_List('complaint','cat_doc_categorias','id_categoria','categoria','id_categoria','>','0 ORDER BY id_categoria',''); ?>
            </select>
            </td>
            <td width="108" align="right"><span class="Cuadro-ContenidoError">*</span><span class="Campos-Formulario"> SUB CATEGORIA</span></td>
            <td colspan="5">
            <select name="subcategoria" class="Campos-Contenido" id="subcategoria" style="width:140">
              <option value="0" selected="selected">&lt; --SUBCATEGORIA-- &gt;</option>
              
             
              <?php 
				include ('conexion.php');

		
  $con=mssql_connect($host,$user,$pw) or die('PROBLEMAS AL CONECTAR CON EL HOST');
		 mssql_select_db($bd,$con)or die('problemas al conectar con la base de datos');
 
 #se seleccion los campos de la pag consultas
		  $sql="
		  SELECT 
				 [id_subcategoria]
				,[opc_subcategoria]
				
			FROM [ssocial_practicas].[dbo].[ssubcategoria_db] 
		  ";
	  
while ($row=mssql_fetch_array($resultados))
		  
		  echo $sql;	  			  

		  $resultados=mssql_query($sql);

		  while ($row=mssql_fetch_array($resultados))	
		  {   	
			?>
            
             <option value="<?PHP echo $row['opc_subcategoria'];?>" >&lt; <?PHP echo $row['opc_subcategoria'];?> &gt;</option>
             
            
            
      <?php 
		  }  # llave del while
		  ?>
              
              
                      <? //Formulario_List('complaint','cat_doc_subcategorias','id_subcategoria','subcategoria','id_subcategoria','>','0 ORDER BY id_subcategoria',''); ?>
            </select>
            </td>
          </tr>

          <tr>
          
          
      <td align="left" valign="middle" class="contenido"><input id="checkbox1" type="checkbox" value="1"  name="1" />
        <span class="Campos-Formulario">Personas</span></td>
        
        
      <td align="left" valign="middle" class="contenido" ><input id="checkbox2" type="checkbox" value="2"  name="2" />
        <span class="Campos-Formulario">Delitos</span></td>
      <td align="left" valign="middle" class="contenido" ><input id="checkbox3" type="checkbox" value="3"  name="3" />
        <span class="Campos-Formulario">Vehiculos</span></td>
      <td width="102" align="left" valign="middle" class="contenido" ><input name="4" type="checkbox" class="Campos-Contenido" id="checkbox4" value="4"  />
        <span class="Campos-Formulario">Objetos</span></td>
      <td width="99" align="left" valign="middle" class="contenido" ><input name="5" type="checkbox" class="Campos-Contenido" id="checkbox5" value="5"  />
        <span class="Campos-Formulario">Archivos</span></td>
      <td width="109" align="left" valign="middle" class="contenido" >
      <input name="6" type="checkbox" class="Campos-Contenido" id="checkbox6" value="6"  />
        <span class="Campos-Formulario">Burocratas</span></td>
      <td width="102" align="left" valign="middle" class="contenido" >
      <input name="7" type="checkbox" class="Campos-Contenido" id="checkbox7" value="7" />
        <span class="Campos-Formulario">Oficio</span></td>

          </tr>
          
          <tr>
      <td align="left" valign="middle" class="contenido"><input id="checkbox8" type="checkbox" value="8"  name="8" />
        <span class="Campos-Formulario">Comp</span></td>
      <td align="left" valign="middle" class="contenido" ><input id="checkbox9" type="checkbox" value="9"  name="9" />
        <span class="Campos-Formulario">Fecha Cita</span></td>
      <td align="left" valign="middle" class="contenido" ><input id="checkbox10" type="checkbox" value="10"  name="10" />
        <span class="Campos-Formulario">Fecha Doc</span></td>
      <td align="left" valign="middle" class="contenido" ><input name="11" type="checkbox" class="Campos-Contenido" id="checkbox11" value="11"  />
        <span class="Campos-Formulario">Vigente</span></td>
      <td align="left" valign="middle" class="contenido" ><input name="12" type="checkbox" class="Campos-Contenido" id="checkbox12" value="12"  />
        <span class="Campos-Formulario">Peritos</span></td>
      <td align="left" valign="middle" class="contenido" ><input name="13" type="checkbox" class="Campos-Contenido" id="checkbox13" value="13"  />
        <span class="Campos-Formulario">Psicolog</span></td>
      <td align="left" valign="middle" class="contenido" >
      
      

    
      
      
      
            <input name="14" type="checkbox" class="Campos-Contenido" id="checkbox14" value="14"  />
      
      
      
        <span class="Campos-Formulario">Mpio Doc</span></td>
      </tr>

      <tr>
      <td align="left" valign="middle" class="contenido"><input id="checkbox15" type="checkbox" value="15"  name="15" />
        <span class="Campos-Formulario">Tipo Dest.</span></td>
      <td align="left" valign="middle" class="contenido" ><input id="checkbox16" type="checkbox" value="16"  name="16" />
        <span class="Campos-Formulario">Personal Firma</span></td>
      <td align="left" valign="middle" class="contenido" >&nbsp;
        <span class="Campos-Formulario">&nbsp;</span></td>
      <td align="left" valign="middle" class="contenido" >&nbsp;
        <span class="Campos-Formulario">&nbsp;</span></td>
      <td align="left" valign="middle" class="contenido" >&nbsp;
        <span class="Campos-Formulario">&nbsp;</span></td>
      <td align="left" valign="middle" class="contenido" >&nbsp;
        <span class="Campos-Formulario">&nbsp;</span></td>
      <td align="left" valign="middle" class="contenido" >&nbsp;
        <span class="Campos-Formulario">&nbsp;</span></td>
     </tr>
     
      
      
      
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr> 
        <td width="130" class="Campos-Formulario">MENSAJE DE AYUDA:</td>
          <td class="Campos-Formulario" colspan="7">
          <label for="mensaje_ayuda"></label>
              <textarea name="mensaje_ayuda" cols="80" rows="3" id="mensaje_ayuda1" class="Campos-Contenido"></textarea>
          </td>
      </tr>         

        </table></fieldset></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>
        <fieldset><legend>
                <label class="Campos-Formulario">
                  HECHOS Y TITULOS HECHOS
                  </label>
                </legend>
        <table width="822" border="0">
          <tr>
            <td width="130" class="Campos-Formulario">&nbsp;</td>
            <td width="682" colspan="7" class="Campos-Formulario">&nbsp;</td>
          </tr>


      
          <tr>
      		<td align="center" valign="middle" class="contenido"><input id="hechos1" type="checkbox" value="0" 
            onclick="activar1()" name="hechos" />
        		
                
                <span class="Campos-Formulario">Hechos 1</span></td>
            <td class="Campos-Formulario" colspan="7"><label for="tipo_hechos1"></label>
              <label for="tipo_archivo3">Titulo 1</label>
              <input name="tipo_hechos" type="text" class="Campos-Contenido" id="tipo_hechos1" size="80" onChange="Mayusculas(this);" disabled="true" value="<?php echo $row1[0];	?>" >
          </td>
          </tr>
          
  
          
          <!--activar o desactivar texto de tipo de echos   manda a la funcion onClick="activar#()" -->
          
        
    
          
          <tr>
      		<td align="center" valign="middle" class="contenido"><input id="hechos2" type="checkbox" value="0" onClick="activar2()" name="hechos2" />
        		
                
                
                
                <span class="Campos-Formulario">Hechos 2</span></td>
            <td class="Campos-Formulario" colspan="7"><label for="tipo_hechos22"></label>
            	<label for="tipo_archivo3">Titulo 2</label>
              <input name="tipo_hechos2" type="text" class="Campos-Contenido" id="tipo_hechos2" size="80" onChange="Mayusculas(this);" disabled="true" value="<?php echo $row1[1];	?>">
			</td>
          </tr>
          <tr>
      		<td align="center" valign="middle" class="contenido"><input id="hechos3" type="checkbox" value="0"  onclick="activar3()" name="hechos3" />
        		<span class="Campos-Formulario">Hechos 3</span></td>
            <td class="Campos-Formulario" colspan="7"><label for="tipo_hechos32"></label>
              <label for="tipo_archivo3">Titulo 3</label>
              <input name="tipo_hechos3" type="text" class="Campos-Contenido" id="tipo_hechos3" size="80" onChange="Mayusculas(this);" disabled="true" value="<?php echo $row1[2];	?>" >
			</td>
          </tr>
          <tr>
      		<td align="center" valign="middle" class="contenido"><input id="hechos4" type="checkbox" value="0"  onclick="activar4()" name="hechos4" />
        		<span class="Campos-Formulario">Hechos 4</span></td>
            <td class="Campos-Formulario" colspan="7"><label for="tipo_hechos42"></label>
              <label for="tipo_archivo3">Titulo 4</label>
              <input name="tipo_hechos4" type="text" class="Campos-Contenido" id="tipo_hechos4" size="80" onChange="Mayusculas(this);" disabled="true" value="<?php echo $row1[3];	?>" >
			</td>
          </tr>
          <tr>
      		<td align="center" valign="middle" class="contenido"><input id="hechos5" type="checkbox" value="0"  onclick="activar5()" name="hechos5" />
        		<span class="Campos-Formulario">Hechos 5</span></td>
            <td class="Campos-Formulario" colspan="7"><label for="tipo_hechos52"></label>
              <label for="tipo_archivo3">Titulo 5</label>
              <input name="tipo_hechos5" type="text" class="Campos-Contenido" id="tipo_hechos5" size="80" onChange="Mayusculas(this);" disabled="true"  value="<?php echo $row1[4];	?>" >
			</td>
          </tr>
          <tr>
      		<td align="center" valign="middle" class="contenido"><input id="hechos6" type="checkbox" value="0" onClick="activar6()"  name="hechos6" />
        		<span class="Campos-Formulario">Hechos 6</span></td>
            <td class="Campos-Formulario" colspan="7"><label for="tipo_hechos62"></label>
              <label for="tipo_archivo3">Titulo 6 
                <input name="tipo_hechos6" type="text" class="Campos-Contenido" id="tipo_hechos6" size="80" onChange="Mayusculas(this);" disabled="true"  value="<?php echo $row1[5];	?>">
                </label></td>
          </tr>
          
     
          <tr>
      		<td align="center" valign="middle" class="contenido"><input id="hechos7" type="checkbox" value="0" onClick="activar7()"  name="hechos7" />
        		<span class="Campos-Formulario">Hechos 7</span></td>
            <td class="Campos-Formulario" colspan="7"><label for="tipo_hechos72"></label>
              <label for="tipo_archivo3">Titulo 7</label>
              <input name="tipo_hechos7" type="text" class="Campos-Contenido" id="tipo_hechos7" size="80" onChange="Mayusculas(this);" disabled="true" value="<?php echo $row1[6];	?>" >
            </td>
          </tr>
 


        </table></fieldset></td>
      </tr>
      

      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>
        <fieldset><legend>
                <label class="Campos-Formulario">
                  ESTATUS Y CAMPOS ESPECIALES
                  </label>
                </legend>
        <table width="822" border="0">
          <tr>
            <td width="94" class="Campos-Formulario">&nbsp;</td>
            <td colspan="7" class="Campos-Formulario">&nbsp;</td>
          </tr>
		
        <td><span class="Campos-Formulario">CAMBIA A ESTATUS</span></td>
            <td width="140" colspan="">
            <select name="id_estado_guarda" class="Campos-Contenido" id="id_estado_guarda" style="width:140">
              <option value="0" selected="selected">&lt; ESTATUS &gt;</option>
              
                <option value="cambiar1" >&lt; cambiar1 &gt;</option>
                <option value="cambiar2" >&lt; cambiar2 &gt;</option>
                <option value="cambiar3" >&lt; cambiar3 &gt;</option>
                      <? //Formulario_List('complaint','cat_estado_guarda','id_estado_guarda','estado_guarda','id_estado_guarda','>','0 ORDER BY id_estado_guarda',''); ?>
            </select>
            </td>
            <td width="99" align="left"><span class="Cuadro-ContenidoError">*</span><span class="Campos-Formulario"> DIRECCION</span></td>
            <td width="142">
            <select name="id_direccion" class="Campos-Contenido" id="id_direccion" style="width:140">
              <option value="0" selected="selected">&lt; DIRECCION &gt;</option>
              <option value="direccion1" >&lt; direccion1 &gt;</option>
                <option value="direccion2" >&lt; direccion2 &gt;</option>
                 <option value="direccion3" >&lt; direccion3 &gt;</option>

              
              
                      <? //Formulario_List('pgj_personal','cat_direcciones','id_direccion','ndireccion','id_direccion','>','0 AND activa=1 ORDER BY id_direccion',''); ?>
            </select>
            </td>
            <td width="131" align="left"><span class="Campos-Formulario"> SITUACION LEGAL</span></td>
            <td colspan="3">
            <select name="situacion" class="Campos-Contenido" id="situacion" style="width:140">
              <option value="0" selected="selected">&lt; SITUACION &gt;</option>
              
                <option value="sit-leg1" >&lt; sit-leg1 &gt;</option>
                <option value="sit-leg2" >&lt; sit-leg2 &gt;</option>
                <option value="sit-leg3" >&lt; sit-leg3 &gt;</option>
                      <? //Formulario_List('complaint','cat_situacion_legal','id_situacion_legal','situacion_legal','id_situacion_legal','>','0 ORDER BY id_situacion_legal',''); ?>
            </select>
            </td>
	
	<tr>
    <?
 
    ?>
            <td width="94" class="Campos-Formulario">ASIGNAR A:</td>
            <td class="Campos-Formulario"><select name="asignarA" class="Campos-Contenido" id="asignarA" style="width:140">
              <option value="0" selected="selected">&lt; SIN ASIGNAR &gt;</option>
              
              <option value="asignar1" >&lt; asignar1 &gt;</option>
              <option value="asignar2" >&lt; asignar2 &gt;</option>
              <option value="asignar3" >&lt; asignar3 &gt;</option>
              
              
              
              
              <? // Formulario_List('Nombre Base de Datos','Nombre de la tabla','Campo ID','Campo a Listar','Campo ID','>','0'); ?>
             
            </select></td>
			<?PHP /*@04 BEGIN*/?>            
            <td align="left" class="Campos-Formulario"> DIRECCION DESTINO</td>
            <td class="Campos-Formulario"><select name="id_direccion_destino" class="Campos-Contenido" id="id_direccion_destino" style="width:140">
              <option value="0" selected="selected">&lt; DIRECCION &gt;</option>
              		<option value="destino1" >&lt; destino1 &gt;</option>
                    <option value="destino2" >&lt; destino2 &gt;</option>
                    <option value="destino3" >&lt; destino3 &gt;</option>
              
              
              
              <? // Formulario_List('Nombre Base de Datos','Nombre de la tabla','Campo ID','Campo a Listar','Campo ID','>','0'); ?>            </select></td>
            <td class="Campos-Formulario">NIVEL DE DIFICULTAD</td>
            <td width="81" class="Campos-Formulario"><select name="nivel_dificultad" class="Campos-Contenido" id="nivel_dificultad" style="width:80">
            <option value="0" selected="selected">&lt; NIVEL &gt;</option>
            <option value="1" >1</option>
            <option value="2" >2</option>
            <option value="3" >3</option>
            <option value="4" >4</option>
            <option value="5" >5</option>
          
            </select></td>
            <td width="62" align="right" class="Campos-Formulario">D&Iacute;AS MAX</td>
            <td width="39" class="Campos-Formulario"><input name="dias_maximo" type="text" class="Campos-Contenido" id="dias_maximo" onKeyPress="return isNumberKey(event);" size="5" maxlength="5" value="0" > </td>

            
          </tr>

        <td><span class="Campos-Formulario">DEPARTAMENTO</span></td>
            <td width="140" colspan="">
            <select name="id_departamento" class="Campos-Contenido" id="id_departamento" style="width:140">
              <option value="0" selected="selected">&lt; DEPARTAMENTO &gt;</option>
              
              <option value="departamento1" >&lt; departamento1 &gt;</option>
              <option value="departamento2" >&lt; departamento2 &gt;</option>
              <option value="departamento3" >&lt; departamento3 &gt;</option>
              
              
              
              <? // Formulario_List('Nombre Base de Datos','Nombre de la tabla','Campo ID','Campo a Listar','Campo ID','>','0'); ?>            </select>
            </td>
            <td width="99" align="left">&nbsp;</td>
            <td width="142">&nbsp;
            
            </td>
            <td width="131" align="left">&nbsp;</td>
            <td colspan="3">&nbsp;</td>
                      


        </table></fieldset></td>
      </tr>
      
      
    </table>
    <br>
      <table width="239" border="0" align="center">
        <tr>
          <td width="115">
          
       <input type="image"  src="../imagenes/boton-guardar.png" />
<!--         <input type="submit" value="OPRIME">-->
          
          
          
          </td>
          <td width="116"><a href="plantillas_index.php"><img src="../imagenes/boton-regresar.png" alt="" width="129" height="29" border="0" align="center"></a></td>
        </tr>
  </table></td>
    <td background="../imagenes/cuadro-cent3.png">&nbsp;</td>
  </tr>
  <tr>
    <td height="28" background="../imagenes/cuadro-inf1.png">&nbsp;</td>
    <td background="../imagenes/cuadro-inf2.png">&nbsp;</td>
    <td background="../imagenes/cuadro-inf3.png" width="108">&nbsp;</td>
  </tr>
</table>
<?php
	echo "esta es la fecha de HOY: ";
	echo date("Y-m-d");
?>





</form>
<?  

		  
		} //FIN SI ES CORRECTO		  
	  
		 else
		  {	
		//   NOOOO   ES CORRECTO SU USUARIO Y CLAVE
		//============================================================================	
			  
?>
<table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="24" background="../imagenes/cuadro-sup.png"><div align="center" class="Cuadro-Titulos">ERROR</div></td>
  </tr>
  <tr>
    <td background="../imagenes/cuadro-cent.png"><table width="417" border="0">
      <tr>
        <td width="66" align="center" valign="middle"><div align="center"><img src="../imagenes/ico-restringido.png" width="57" height="55"></div></td>
        <td width="335"><div align="justify">
          <p align="center"><br>
                  <span class="Cuadro-ContenidoError">ACCESO RESTRINGIDO <br>
                  </span><span class="Cuadro-Contenido"><br>
                  No tiene permisos para ver esta p&aacute;gina, <br>
si necesita tener acceso comuniquse a:<br>
<span class="Cuadro-ContenidoInformacion">AREA DE INFORMATICA. </span></span><br>
                <a href="index.html"></a></p>
        </div>
              </p></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="../imagenes/cuadro-inf.png" width="436" height="37"></td>
  </tr>
</table>
<?
			} 
		//FIN NOOOO   ES CORRECTO SU USUARIO Y CLAVE
		//============================================================================
				
?>
        </td>
      </tr>
    </table>      </td>
  </tr>
  <tr>
    <td><img src="../imagenes/pag-piepagina.png" width="1001" height="44"></td>
  </tr>
</table>




          
<?php
			}  //el de los hechos
 ?>







<?php


#para vaciar los datos que son obligatorios


include ('conexion.php');
		  #$dbBusqueda=ConectarSQL();
		  #$selected = mssql_select_db("ssocial_practicas", $dbBusqueda) or die("NO SE PUEDE ABRIR dB complaint");
	
	
	
$id = $_GET['ref']; #se recive el valor del dato que se envio de la otra pag
	
	#conexion y seleccion de tabla de la base de datos
  $con=mssql_connect($host,$user,$pw) or die('PROBLEMAS AL CONECTAR CON EL HOST');
		 mssql_select_db($bd,$con)or die('problemas al conectar con la base de datos');
		 ////////////////// DATOS DE NOMBRE, dir,cat y sub-cat
		  $sql="
		  SELECT [nombre_db]
			  ,[categoria_db]
				,[subcategoria_db]
				,[direccion_db]
	
			FROM [ssocial_practicas].[dbo].[sdatos_db] 
			
			where id_user = '$id'
			
		  ";
		   			  

		  $resultados=mssql_query($sql);
		  while ($row=mssql_fetch_array($resultados))	
		  {   
			
				
			 
 ?>
     
         


     <script type="text/javascript">

//		insertamso los datos de la tabla a lso campos correspondientes	    	
		var xname="<?php  echo $row['nombre_db'];  ?>";
		var x="<?php  echo $row['categoria_db'];  ?>";
		var y="<?php  echo $row['subcategoria_db'];  ?>";
		var z="<?php  echo $row['direccion_db'];  ?>";
		
		document.getElementById("plantilla_nombre").value=xname;
		document.getElementById("categoria").value=x;
		document.getElementById("subcategoria").value=y;
		document.getElementById("id_direccion").value=z;
			
	</script>





 		<? 		
		  }//while ($row=mssql_fetch_array($resultados))
		  //donde se oobtiene el valor de usuario que se selecciono
			 	
			 ?>
         
             
             
             
 <?php
 	//////////////////////////////////////////DATOS DE CHECk			
					  $sql_checkbox="
		  SELECT [din_id_interes]
			  
			FROM [ssocial_practicas].[dbo].[sdir_intereses] 
			
			where din_id_user = '$id'
			
		  ";
	  			  

		  $resultados=mssql_query($sql_checkbox);
		  while ($row=mssql_fetch_array($resultados))	
		  {
			  
			  
			  
			  
?>			  
			  
			  
			  
			    <script type="text/javascript">

//por cada check-box que fue seleccionado, se detecta cual fue y cambia su valor  a checked		
			document.getElementById("checkbox"+<?php  echo $row['din_id_interes'];  ?>).checked=true;
			
			
	</script>
			  
			  
<?php
			}  //el de los checkbox
 ?>
             
             

   




</body>
</html>



<?
			} 
		//FIN NOOOO   TIENE SESION
		//============================================================================
				
?>







<?php


	#en alta_ejemplo campos especiales

		  $sql_special="
		  SELECT [cambiar_db]
			  ,[asignar_db]
				,[departamento_db]
				,[destino_db]
			    ,[sit_legal_db]
				,[nivel_db]
				,[diasmax_db]
				,[comentario_db]
	
			FROM [ssocial_practicas].[dbo].[sspecial_field] 
			
			where id_user = '$id'
			
		  ";
		   			  

		  $resultados=mssql_query($sql_special);
		  while ($row=mssql_fetch_array($resultados))	
		  {   
			
				
			 
 ?>
 
 
<script type="text/javascript">

//	se recuperan los datos que fueron guardados en la tabla		    	
		var s1="<?php  echo $row['cambiar_db'];  ?>";
		var s2="<?php  echo $row['asignar_db'];  ?>";
		var s3="<?php  echo $row['departamento_db'];  ?>";
		var s4="<?php  echo $row['destino_db'];  ?>";
		var s5="<?php  echo $row['sit_legal_db'];  ?>";
		var s6="<?php  echo $row['nivel_db'];  ?>";
		var s7="<?php  echo $row['diasmax_db'];  ?>";
		var s8="<?php  echo $row['comentario_db'];  ?>";
		
		
		//se  insertar en cada campo correspondiente los valores 
		document.getElementById("id_estado_guarda").value=s1;
		document.getElementById("asignarA").value=s2;
		document.getElementById("id_departamento").value=s3;
		document.getElementById("id_direccion_destino").value=s4;
		document.getElementById("situacion").value=s5;
		document.getElementById("nivel_dificultad").value=s6;
		document.getElementById("dias_maximo").value=s7;
		document.getElementById("mensaje_ayuda1").value=s8;
		
		
			
	</script>

 
 
 
 
 
 <?php 
 	}
 ?>
 







	    <script type="text/javascript">
//para activar los checked de los hechos

var i=1;
//se vacia el primer valor que hay en la tabla de hechos
var	x=document.getElementById("tipo_hechos"+i).value;

//se pone hasta 7 por que son el numero de hechos que se tienen en la base de datos
while(i<=7)
	{
//se pregunta si el valor que se tomo es nulo, no tiene nigun caracter o esta vacio
		if( x == null || x.length == 0 || /^\s+$/.test(x) )
		
				document.getElementById("tipo_hechos"+i).disabled=true;
				
	
		else
		{
			//se permite escribir en el tipo_hechos
			document.getElementById("tipo_hechos"+i).disabled=false;
			//el cghecked que le corresponde se  pone chekeado
			document.getElementById("hechos"+i).checked=true;
		}
			
		
		
		i+=1;
		x=document.getElementById("tipo_hechos"+i).value;	
	}
			
			
			
			
			
			
	</script>
