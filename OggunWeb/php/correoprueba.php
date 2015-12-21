<?php

 	if(isset($_REQUEST['id']) AND isset($_REQUEST['pass']) AND isset($_REQUEST['correo'])){

 			$mail = $_REQUEST['correo'];
			$asunto = "Contraseña de Repuesto"; 
			$cuerpo = ' 
			<html> 
			<head> 
			   <title>Contraseña de Repuesto</title> 
			</head> 
			<body> 
			<h1>Gracias por pedir la contraseña de respuesto puede loguearse con esta contraseña</h1> 
			<p>'.$_REQUEST['pass'].'
			</p> 
			<h1>Tambien puede Cambiar la contraseña entrando a este link</h1>
			<p> <a href="recuperarcontrasena.php?id=".$_REQUEST[id]."&contra=".$_REQUEST[pass]."">DAR CLICK PARA RECUPERAR CONTRASEÑA</a></p>
			</body> 
			</html> 
			'; 

			//para el envío en formato HTML 
			$headers = "MIME-Version: 1.0\r\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

			//dirección del remitente 
			$headers .= "From: Oggun la red social <oggun@redsocial>\r\n";

			if(mail($mail,$asunto,$cuerpo,$headers)){
					echo "1";
				}else
				{
					echo $_REQUEST['id'].$_REQUEST['pass'].$_REQUEST['correo'];
				}
 	}
 			
	
?>