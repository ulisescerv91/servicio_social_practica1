<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

	<?php
    
	
	<? 
ini_set('session.gc_maxlifetime', 14400);
session_start();
date_default_timezone_set("America/Chicago");
//ini_set("display_errors","1");
$agpo1="0,1,6,10,0";
$agpo2="0,3,4,9,0";
$agpo3="0,2,7,8,0";
$agpo4="0,5,0";
$sup_campos=array("firmas","acuerdos","fe_ministerial","certificaciones","mot_fun_acu","aceptacion","rat_peritajes","aus_peritajes","aus_informes","sol_peritajes","sol_informes");
$sup_desc=array("FIRMAS","ACUERDOS","FE MINISTERIAL","CERTIFICACIONES","MOT. Y FUNDAM. DE ACUERDOS","ACEPTACI&Oacute;N","RATIFICACI&Oacute;N DE PERITAJES","AUSENCIA DE PERITAJES","AUSENCIA DE INFORMES","SOLICITUD DE PERITAJES","SOLICITUD DE INFORMES");
$DiaLetra=array("DOMINGO","LUNES","MARTES","MIÉRCOLES","JUEVES","VIERNES","SÁBADO");
$MesLetra=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$DiasMes=array(31,28,31,30,31,30,31,31,30,31,30,31);
$dFechacomparar=strtotime("2010/12/31 23:59:59");
$dFechaactual=strtotime(date("Y/m/d H:i:s"));
$BdActas="ActasAps";
$BdDgeo="datosgeo";
$BdVr="snvrr";
$concatena="~~";

$varible_tmp1=0;
$varible_tmp2=0;
$varible_tmp3=0;

date_default_timezone_set('America/Mexico_City');


/* © Copyright PGJ 2009                                              */
/*********************************************************************/
/* PROGRAM NAME : funciones.php                                      */
/*                                                                   */
/* PROGRAM FUNCTION : This include has the common functions          */
/*                                                                   */
/* PROGRAM LANGUAGE : PHP                                            */
/*                                                                   */
/* NOTES :                                                           */
/*                                                                   */
/*-------------------------------------------------------------------*/
/*  DATE    | ISSUE  |   NAME         | EXPLANATION OF CHANGE        */
/*-------------------------------------------------------------------*/
/*25-09-2009|        |Edgar V.        | Initial Version.             */
/*********************************************************************/



$ip_servidor_db="10.10.1.30";
#$ip_servidor_db="10.10.1.2";
$pwd_servidor_db="sqldesarrollo2014";

//============================================================================================================================  
//************************************* FUNCIONES DE BASE DE DATOS ***********************************************************
//============================================================================================================================  

//CONEXION AL SERVIDOR
function ConectarSQL()
 		{
		#$servidor="10.10.1.2";
		global $ip_servidor_db;
		global $pwd_servidor_db;
		$servidor=$ip_servidor_db;		
		$usuario="practicas";
		$clave=$pwd_servidor_db;
		//$comm = "ping -c3 10.20.5.5";
		//$output=shell_exec($comm);
		//echo $output;	
		$msjError="ERROR NO.: E-01<br><BR><B>!PROBLEMA CON SERVIDOR DE BASE DE DATOS!</B><br> Si continua problema reportar al Tecnico de guardia: 044(312)302-8092<BR<br>";	
		$dbhandle = mssql_connect($servidor, $usuario, $clave) or die("$msjError");
		return $dbhandle; 	
		mssql_close($dbhandle);		
 		}
		

    
	

	
	
//CONEXION CERRAR  

   
   



 

  
  
  
   
   
   
//VALIDA USUARIO 
function Permiso($cual)
   	{
   	$reg=-1;
	if(isset($_SESSION['id_administrativo']))
		{ 		
		$reg=1;
		if(!$reg>0)
			{$reg=-1; }
		
		/*
		while($registro = mssql_fetch_array($result)) 
		{	
			$reg=$registro['id_permiso'];
		}
		*/
		//DesconectarPersonal(); 
    	//mssql_close($dbPermiso);
		}		
	return $reg;
   	}    
  

//FUNCION PERRONA DE MERAZ PA: BUSCAR DATO EN nTabla de nDb
function Busca_x_Dato($dBs, $tAbla, $seleCcionar, $doNde, $critErio, $valoR)
{  
	$dbPerrona=ConectarSQL();
    $selected_perron = mssql_select_db("$dBs", $dbPerrona) or die("NO SE PUEDE ABRIR dB $dbPerrona");
	$query_perron = "SELECT $seleCcionar FROM $tAbla ";
	if(strlen($doNde)>1)
		$query_perron .= " WHERE $doNde$critErio".$valoR;	
	$result_perron = mssql_query($query_perron);
	$entro_perron=0;	$dato_regresr='';	
	while($registro_perron = mssql_fetch_array($result_perron)) 
	{	
		$dato_regresr.= $registro_perron[0];
		for($i=1;$i<=10;$i++)
			{
			if( isset($registro_perron[$i]) )
				$dato_regresr .= ' ' . $registro_perron[$i];
			}
		$entro_perron=1;
	}
    //mssql_close($dbPerrona);
	//echo "{".$dato_regresr."}";
	//if($dBs=="ActasAps2")
	//	$dato_regresr=$query_perron;	
		
	return $dato_regresr; 
}


//////////////////////////////////////////////////////////////////////////////////


function Formulario_List($dBs, $tAbla, $id_valor,$id_texto, $doNde, $critErio, $valoR,$idSeleccionado)
	{
	$dbPerrona=ConectarSQL();
    $selected_perron = mssql_select_db("$dBs", $dbPerrona) or die("NO SE PUEDE ABRIR dB $dbPerrona");
	$query_perron = "SELECT $id_valor,$id_texto FROM $tAbla ";
	if(strlen($doNde)>1)
		$query_perron .= " WHERE $doNde$critErio$valoR ";
	//echo $query;
	$result_perron = mssql_query($query_perron);
	$entro_perron=0;		
	while($registro_perron = mssql_fetch_array($result_perron)) 
		{	
		echo "<option value='".$registro_perron[0]."'";
		if($idSeleccionado == $registro_perron[0]) 
			echo " selected ";  
		echo ">";
/*		for($i=1;$i<=count($registro_perron);$i++)
			{
			echo utf8_encode($registro_perron[$i])." ";	}*/
			echo utf8_encode($registro_perron[1])." ";
		
		echo "</option>";
		}
	}






function agregar(){
	mysqli_query($con,"INSERT INTO Persons (FirstName, LastName, Age)
VALUES ('Peter', 'Griffin',35)");
	
	
	}










?>

<html>
	<head></head>
    <body>datos subidos</body>	

</html>



	
	?>

</body>
</html>