









<?
  /******************************************************************************/
  /* © Copyright PGJ 2012-2014. All rights reserved.                            */
  /*                                                                            */
  /* Name: ejemplo_consulta                                                      	*/
  /*                                                                            */
  /* Language: PHP/JavaScript                                                   */
  /*                                                                            */
  /* Function: Main record page						                            */
  /*                                                                            */
  /*                                                                            */
  /*----------------------------------------------------------------------------*/
  /*   Date   | Item #  |  Name & Flag   | Explanation of Change                */
  /*----------------------------------------------------------------------------*/
  /*21-02-2014|         |F. Lares        |-Initial Version                      */ 
  /******************************************************************************/
?>

<? include ("../funciones.php");

   include ("../menu-ejemplo.php");
                            
	include ('conexion.php');
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
<!-- FIN DE MENU DE CADA APLICACION -->


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
        <td width="899" class="Pagina-TITULO">EJEMPLO - CONSULTA</td>
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
	
	
	
	

<form name="Form1" id="Form1" method="post" action="consultas.php">
  <table width="973" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="188" height="33" background="../imagenes/folder.png" class="Pagina-TITULO"><div align="center" class="Cuadro-ContenidoInformacion">FILTROS</div></td>
      <td width="185" align="center" background="../imagenes/folder-fdo.png" class="Tablas-TituloCol">&nbsp;</td>
      <td width="186" align="center" background="../imagenes/folder-fdo.png" class="Pagina-TITULO">&nbsp;</td>
      <td width="375" background="../imagenes/folder-fdo.png" class="Pagina-TITULO">&nbsp;</td>
      <td width="39" background="../imagenes/folder-fdo.png">&nbsp;</td>
    </tr>
    <tr>
      <td height="48" colspan="5" bgcolor="#DEC957" class="Pagina-TITULO"><span class="Campos-Formulario"><br>
        DEL:</span>
        <div id="testdiv1" style="position:absolute;visibility:hidden;background-color:white;layer-background-color:white;"></div>
        <input name="f_inicio" type="text" class="Campos-Contenido" id="f_inicio" value="<? if(strlen($_POST['f_inicio'])>9) echo $_POST['f_inicio']; else echo date("Y-m-d");; ?>" size="7" maxlength="10" readonly>
        <span class="HorasRojo">*</span> <a href="#" onClick="cal1xx.select(document.Form1.f_inicio,'anchor2xx','y-MM-dd'); return false;" name="anchor2xx" id="anchor2xx"> <img src="../calendario/cal.png" alt="" width="22" height="22" border="0" /></a> <span class="Campos-Formulario">AL:</span>
        <input name="f_fin" type="text" class="Campos-Contenido" id="f_fin" value="<? if(strlen($_POST['f_fin'])>9) echo $_POST['f_fin']; else echo date("Y-m-d");; ?>" size="7" maxlength="10" readonly>
        <a href="#" onClick="cal1xx.select(document.Form1.f_fin,'anchor3xx','y-MM-dd'); return false;" name="anchor3xx" id="anchor3xx"> <img src="../calendario/cal.png" alt="" width="22" height="22" border="0" /></a> <span class="Campos-Formulario">CATEGORIA</span>
        <select name="id_tipo_operativo" id="id_tipo_operativo"  style="width:35mm" class="Campos-Contenido">
          <option value="cateo1" >&lt; catego1 &gt;</option>
                <option value="catego2" >&lt; catego2 &gt;</option>
                 <option value="catego3" >&lt; catego3 &gt;</option>

        </select>
        <span class="Campos-Formulario">subcategoria:</span>
        <select name="id_autoridad" id="id_autoridad"  style="width:35mm" class="Campos-Contenido">
	 <option value="sub-catego1" >&lt; sub-catego1 &gt;</option>
                <option value="sub-catego2" >&lt; sub-catego2 &gt;</option>
                 <option value="sub-catego3" >&lt; sub-catego3 &gt;</option>

        </select>
        <a href="#"> 
        
  

<input type="image"  src="../imagenes/boton-buscar.png"/>

</a> <br>
        <br>
        <table width="800" align="center"  bgcolor="#FFFFFF">
          <tr>
            <td width="52" background="../imagenes/barra-btn-fdo.png"  class="campo"><div align="center">#</div></td>
            <td width="255" align="center" background="../imagenes/barra-btn-fdo.png"  class="campo">NOMBRE</td>
            <td width="114" background="../imagenes/barra-btn-fdo.png" class="campo"><div align="center">CATEGORIA</div></td>
            <td width="138" background="../imagenes/barra-btn-fdo.png" class="campo"><div align="center">SUB-CATEGORIA</div>
              <div align="center"></div>
              <div align="center"></div></td>
            <td width="92" align="center" background="../imagenes/barra-btn-fdo.png" class="campo">DIRECCION</td>
            
            <!--<td width="34" align="center" background="imagenesComplaint/barra-btn-fdo.png" class="campo">&nbsp;</td>-->
          </tr>

<?PHP
		  #$dbBusqueda=ConectarSQL();
		  #$selected = mssql_select_db("ssocial_practicas", $dbBusqueda) or die("NO SE PUEDE ABRIR dB complaint");
	
	
	#conexion y seleccion de tabla de la base de datos
  $con=mssql_connect($host,$user,$pw) or die('PROBLEMAS AL CONECTAR CON EL HOST');
		 mssql_select_db($bd,$con)or die('problemas al conectar con la base de datos');
 
 
		  $sql="
		  SELECT 
				 [id_user]
				,[nombre_db]
				,[categoria_db]
				,[subcategoria_db]
				,[direccion_db]
				,[fecha_db]
			FROM [ssocial_practicas].[dbo].[sdatos_db] 
			
			
		  ";
while ($row=mssql_fetch_array($resultados))
		  
		  echo $sql;	  			  

		  $resultados=mssql_query($sql);
		  $contador=0;	
		  $bgcolor= false;	
		  while ($row=mssql_fetch_array($resultados))	
		  {   
			  $contador++;


			
		  ?>

          <tr style="  " class="<? if ($bgcolor==false) echo 'FONDO_TABLA_FILA_2'; else 'FONDO_TABLA_FILA_1'; ?>">
            <td align="center" class="contenido"><?PHP echo $contador?></td>
            <td align="center" class="contenido"><?PHP echo $row['nombre_db'];?></td>
            <td align="center" class="contenido"><?PHP echo $row['categoria_db'];?></td>
            <td align="center" class="contenido"><?PHP echo $row['subcategoria_db'];?></td>
            <td align="center" class="contenido"><?PHP echo $row['direccion_db'];?></td>


          </tr>
          <? 			
		  }//while ($row=mssql_fetch_array($resultados))
			  $bgcolor=!$bgcolor;	
			 ?>
          <?	if($contador==0)  { ?>
          <tr>
            <td colspan="11" bgcolor="#FFFFFF" class="contenido"><div align="center" class="Campos-Formulario">NO EXISTEN REGISTROS CON ESE CRITERIO DE BUSQUEDA... </div></td>
          </tr>
          <? }?>
          <tr>
            <td colspan="11" background="../imagenes/barra-btn-fdo.png" class="campo">&nbsp;</td>
          </tr>
        </table>
        <BR></td>
    </tr>
  </table>
  
 <input name="calis" type="text" size="10" >
  
  
  
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


</body>
</html>



<?
			} 
		//FIN NOOOO   TIENE SESION
		//============================================================================
				
?>




	
