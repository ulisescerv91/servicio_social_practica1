<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>


 <select name="categorias" class="Campos-Contenido" id="sel_cat	" style="width:140">
              <option value="0" selected="selected">&lt; CATEGORIA &gt;</option>


<?php 
	include ('conexion.php');
	
	

		
  $con=mssql_connect($host,$user,$pw) or die('PROBLEMAS AL CONECTAR CON EL HOST');
		 mssql_select_db($bd,$con)or die('problemas al conectar con la base de datos');
 
 #se seleccion los campos de la pag consultas
		  $sql="
		  SELECT 
				 [id_categoria]
				,[opc_categoria]
				
			FROM [ssocial_practicas].[dbo].[catego] 
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
		  	

			
 </select>





</body>
</html>