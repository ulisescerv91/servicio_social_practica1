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
                                        
                                        
                                        #insertar valores obligatorios
                                            mssql_query("INSERT INTO sdatos_db 			 (nombre_db,categoria_db,subcategoria_db,direccion_db,fecha_db) VALUES 	 											('$_POST[plantilla_nombre]','$_POST[categoria]','$_POST[subcategoria]','$_POST[id_direccion]','$_POST[fechas]')",$con);
                                            echo "Datos insertados correctamente";
                                            echo"<br><br><br>";
                                            
                                        
                                        #query donde se obtiene el id del  registro que se acaba de ingresar a la DB
                            $sql_usuario_id=mssql_query("SELECT TOP 1  id_user FROM sdatos_db ORDER BY id_user  DESC ",$con);
                                
                                
                                        #para sacar  la id del usuario que se acaba de registrar
                                        while($row =  mssql_fetch_array ($sql_usuario_id))
                                        {
                                            $userid=$row['id_user'];
                                          
                                        }
                                        
                                        #solo informacion que se vera si se almaceno correctamente la informacion en la base de datos
                                          
                                         echo "Su ID es----> $userid";
										 
										?>
                                        
                                        <!--Botones que te redireccionan a consultas o  a altas-->
                                        
 <br> <br><br>  <input type="button" value="Registrar otro usuario" onClick=" window.location.href='http://10.10.1.31/Practicas/ulises/alta_ejemplo.php' ">


<br><br>  <input type="button" value="Consulta de usuarios" onClick=" window.location.href='http://10.10.1.31/Practicas/ulises/consultas.php' ">
										
										<?php
                                        
                                        
                                      
                                        
                                        
                            
                                        
                                        
                                        
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
                            
           
                            
                            
                                #insertar datos echos
                                mssql_query("INSERT INTO sechos_db (id_user,echos1_db,echos2_db,echos3_db,echos4_db,echos5_db,echos6_db,echos7_db) VALUES 	 													    ($userid,'$_POST[tipo_hechos]','$_POST[tipo_hechos2]','$_POST[tipo_hechos3]','$_POST[tipo_hechos4]','$_POST[tipo_hechos5]','$_POST[tipo_hechos6]','$_POST[tipo_hechos7]')",$con);
                                
                                
                                
                                
                                
                                #insertar datos especiales
                                mssql_query("INSERT INTO sspecial_field (id_user,cambiar_db,asignar_db,departamento_db,destino_db,sit_legal_db,nivel_db,diasmax_db,comentario_db) VALUES 	 													    ($userid,'$_POST[id_estado_guarda]','$_POST[asignarA]','$_POST[id_departamento]','$_POST[id_direccion_destino]',
                                     		'$_POST[situacion]','$_POST[nivel_dificultad]','$_POST[dias_maximo]','$_POST[mensaje_ayuda]')",$con);
                            }
                            







                            ###############en caso que no se espesificaran los datos obligatorios
                            else{
                            
                                echo "Los datos obligatorios no se espesificaron ";
                            }
                            
                            
                            ?>
			                               
                                
              </p> 
 		</div>   
	</center>
    </body>

  </html>

