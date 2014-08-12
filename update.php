<html>
	

        
       <head><title>Ingreso de datos</title></head> 
       <body>
       
       
       
      
       <center>
       <!--Imanen principal-->
       		<img src="../banner-titulo-actas&aps.png" width="800" height="122" border="1px outset black" >
           
           
           
       
       
 <br> <br> <br><br><br><br>
                      
                         <!--estilo donde se contiene anuncios de el grabado de datos-->            
 		<div style=" border:2px;border-right-style:outset; border-bottom-style:outset; border-left-style:outset; width:600px;" >                                 
                         <p style=" margin:20px 20px 20px 20px; font-weight:bold; font-size:22px"  >   
                            <?php
                            
							#se incluyen los datos de la base de datos
                            include ('conexion.php');
                            
       
                                    
                            #validacion de datos los cuales son obligarotios en la pag
                     if (isset($_POST['plantilla_nombre'])&& !empty($_POST['plantilla_nombre'])&&
                                isset($_POST['categoria'])&& !empty($_POST['categoria'])&&
                                isset($_POST['subcategoria'])&& !empty($_POST['subcategoria'])&&
                                isset($_POST['id_direccion'])&& !empty($_POST['id_direccion'])
                            
                               )
							   
							   
							   
                            {
                            
								 #conexion y seleccion de tabla de la base de datos
								 $con=mssql_connect($host,$user,$pw) or die('PROBLEMAS AL CONECTAR CON EL HOST');
								mssql_select_db($bd,$con)or die('problemas al conectar con la base de datos');
									
																
									  #valores a  actualizar dentro de la dase de datos
									  
						  				mssql_query("UPDATE sdatos_db
										SET  nombre_db = '$_POST[plantilla_nombre]',direccion_db='$_POST[id_direccion]'	
										,categoria_db='$_POST[categoria]',subcategoria_db='$_POST[subcategoria]'		
										WHERE id_user = '$_POST[clave]'; ",$con);
			
			#el campo de fecha no lo agrego ya que solo quiero modificar los datos, y no cuando se io de alta
			
			
			
			
			
			
			
			#primero elimino los checkbox  anteriores ya que en caso q solo alla seleccionado  uno 
			#que no se selecciono anteriormente, no se puede actualizar, asi mejor los elimino todos y los vuelvo a cread
			

	          
                                #mandar guardar los valores de los checked
								#solo los que fueron seleccionados
                                       #
                                                mssql_query("DELETE from sdir_intereses
															WHERE din_id_user=$_POST[clave]",$con);
                                                
										
										#guardo el id de usuario al cual voy se modificaran los datos
                                      $userid=$_POST['clave'];
									  
								         
                                #mandar guardar los valores de los checked
								#solo los que fueron seleccionados
                                        for ($i=1;$i<=16;$i++)
										#i llega al 16, porque son 16 los checked  que hay como opciones
                                        {
                                            if($_POST[$i]==$i)
                                            {
                                                mssql_query("INSERT INTO sdir_intereses (din_id_user,din_id_interes) VALUES 	 													                                                                                             ($userid,$i)",$con);
                                           
                                            }
                                                
                                        }             
										

										
										#este es para actualizar los campos especiaes
										
										 mssql_query("UPDATE sspecial_field
										SET  cambiar_db = '$_POST[id_estado_guarda]',asignar_db='$_POST[asignarA]'	
										,departamento_db='$_POST[id_departamento]',destino_db='$_POST[id_direccion_destino]'
										,sit_legal_db='$_POST[situacion]',nivel_db='$_POST[nivel_dificultad]'
										,diasmax_db='$_POST[dias_maximo]',comentario_db='$_POST[mensaje_ayuda]'		
										WHERE id_user = '$_POST[clave]'; ",$con);
										
										
	
										
											#este es para actualizar los campos dehechoos
										
										 mssql_query("UPDATE sechos_db
										SET  echos1_db = '$_POST[tipo_hechos]',echos2_db='$_POST[tipo_hechos2]'
										,echos3_db='$_POST[tipo_hechos3]',echos4_db='$_POST[tipo_hechos4]'
										,echos5_db='$_POST[tipo_hechos5]',echos6_db='$_POST[tipo_hechos6]'
										,echos7_db='$_POST[tipo_hechos7]'	
											
										WHERE id_user = '$_POST[clave]'; ",$con);
										
										
                                                
											echo "Datos Actualizados----------".$_POST['clave'];
	
	
	
																?>
                                                                
 <!--Botones que te redireccionan a consultas o  a altas-->                      
                                                                
 <br> <br><br>  <input type="button" value="Consulta de usuarios" onClick=" window.location.href='http://10.10.1.31/Practicas/ulises/consultas.php' ">
																
<br><br>  <input type="button" value="Registrar otro usuario" onClick=" window.location.href='http://10.10.1.31/Practicas/ulises/alta_ejemplo.php' ">
																
																<?php
																
																	echo"<br><br><br>";
                              
                            }
                            







                            #############en caso que no se espesificaran los datos obligatorios
                            else{
                            
                                echo "Los datos obligatorios no se espesificaron ";
                            }
                            
                            
                            ?>
			                               
                                
              </p> 
 		</div>   
	</center>
    </body>

  </html>

