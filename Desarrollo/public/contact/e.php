<?php

	require("archivosformulario/class.phpmailer.php");

	function email($Email,$Mensaje){

	    $mail = new PHPMailer();

	    $mail->FromName = "Nombre";

	    $mail->WordWrap = 50;
	    $mail->IsHTML(true);
	    $mail->Subject  =  "Contacto"; // Asunto del mensaje.
	    
	    $mail->Body =  $Mensaje; // Mensaje del usuario
	    
	    // Datos del servidor SMTP, podemos usar el de Google, Outlook, etc...
	    $mail->IsSMTP();
	    //$mail->Host = "ssl://smtp.gmail.com:465";  // Servidor de Salida. 465 es uno de los puertos que usa Google para su servidor SMTP
	    //$mail->Host = "ssl://p3plcpnl0240.prod.phx3.secureserver.net:465";
	    $mail->Host = "ssl://smtp.gmail.com:465";
	    $mail->SMTPAuth = true;
	    $mail->Username = "ingenieria@omasmplus.com";
	    $mail->Password = "dictamen@3tigO"; // Contraseña del correo
	    $mail->From     = "ingenieria@omasmplus.com";


	    $mail->AddAddress("".$Email);

	    if ($mail->Send()){
	        //return "Formulario enviado exitosamente, le responderemos lo más pronto posible.";
	        return "true";
	    }else
	        return "false";
	}

	echo "entro a email: ".email("haroldolopeziron@gmail.com","".$_POST["mensaje"]);