<?php


function email($Email,$Mensaje){

    require("archivosformulario/class.phpmailer.php"); // Requiere PHPMAILER para poder enviar el formulario desde el SMTP de google
    $mail = new PHPMailer();

    $mail->FromName = "Tigo";

    $mail->WordWrap = 50;
    $mail->IsHTML(true);
    $mail->Subject  =  "Mensaje de contacto"; // Asunto del mensaje.
    
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




if(isset($_POST["nombre"])){

    $nombre = $_POST["nombre"];
    $mensaje = $_POST["mensaje"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];

    $txtMensaje = "
        Se ha recibido el siguiente mensaje para contactarse:<br><br>
        Nombre del cliente: $nombre<br>
        Email: $email<br>
        Telefono: $telefono<br>
        Mensaje: $mensaje<br><br><br>

        Att. MWApps

    ";

    if(email($email,$txtMensaje)=="true"){
        echo "Mensaje enviado";
    }else{
        echo "Error al enviar mensaje";
    }


}else
    echo "No tiene permiso";
