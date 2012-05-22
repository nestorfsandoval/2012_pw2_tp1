	<head>
	<title>Contacto</title>
	<link rel='stylesheet' href='estilo.css'>
	<script src='js/jquery.min.js'></script>
	<script type="text/javascript" language="Javascript" src="js/delContacto.js"></script>
	</head>
	<div id="tabs-5">
            
                <!--Esta es la secci?n de c?digo PHP del formulario -->
		<?php
			if(isset($_POST['boton'])){
                            //Vamos validando los distintos formularios y asign?ndoles un 'mensaje' al error en cada caso
                            //y lo guardamos en el array $error, en diferentes
                                
                                //En caso de estar vac?o el nombre
				if($_POST['nombre'] == ''){
					$error1 = '<span class="error">Ingrese su nombre</span>';
				
                                //En caso de estar vac?o el mail o que no corresponde a lo esperado en la expresi?n regular
                                }else if($_POST['email'] == '' or !preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$_POST['email'])){
                                        $error2 = '<span class="error">Ingrese un email correcto</span>';
				
                                //En caso de estar vac?o el asunto
                                }else if($_POST['asunto'] == ''){
					$error3 = '<span class="error">Ingrese un asunto</span>';
				
                                //En caso de estar vac?o el mensaje        
                                }else if($_POST['mensaje'] == ''){
					$error4 = '<span class="error">Ingrese un mensaje</span>';
				}else{
                                    
                                //En caso de cumplir con todo lo anterior, prepara el mail de contacto usando la funci?n mail()
                                //
					$dest = "luis.arrix@gmail.com"; //Email de destino
					$nombre = $_POST['nombre'];
					$email = $_POST['email'];
					$asunto = $_POST['asunto']; //Asunto
					$cuerpo = $_POST['mensaje']; //Cuerpo del mensaje
                                
                                //Se crean cabeceras de correo, para que los mismos no sean detectados como spam (dentro de lo posible)
				
                                        $headers = "From: $nombre $email\r\n"; //Quien envia?
					$headers .= "X-Mailer: PHP5\n";
					$headers .= 'MIME-Version: 1.0' . "\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
					
					if(mail($dest,$asunto,$cuerpo,$headers)){
				
                                //Si el envio fue exitoso en $result guardamos el aviso de 'success'
				
                                                $result = '<div class="result_ok">Email enviado correctamente</a>';	
                                                
				//Si el envio fue exitoso adem?s reseteamos lo que el usuario escribio
                                                
						$_POST['nombre'] = '';
						$_POST['email'] = '';
						$_POST['asunto'] = '';
						$_POST['mensaje'] = '';
					}else{
                                
                                //Caso contrario, en $result guardamos el aviso de error
						$result = '<div class="result_fail">Hubo un error al enviar el mensaje</a>';
					}
				}
			}
		?>
			<form class='contacto' method='POST' action=''>
                                <!--Para evitar que al validar borre lo que el usuario escribi?, guardaremos dichos datos en el atributo 'value' -->
                                
				<div><label>Tu Nombre:</label><input type='text' class='nombre' name='nombre' value='<?php echo $_POST['nombre']; ?>'><?php echo $error1 ?></div>
				<div><label>Tu Email:</label><input type='text' class='email' name='email' value='<?php echo $_POST['email']; ?>'><?php echo $error2 ?></div>
				<div><label>Asunto:</label><input type='text' class='asunto' name='asunto' value='<?php echo $_POST['asunto']; ?>'><?php echo $error3 ?></div>
				<div><label>Mensaje:</label><textarea rows='6' class='mensaje' name='mensaje'><?php echo $_POST['mensaje']; ?></textarea><?php echo $error4 ?></div>
				<div><input type='submit' value='Envia Mensaje' class='boton' name='boton'></div>
                                
                                <!--Finalmente mostramos el contenido de $result -->
				<?php echo $result; ?>
			</form>
		</body>
	</div>
	
