<?php
if(isset($_POST['email'])) {

// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
$email_from = $_POST['email'];
$email_to = "aloha@redmaceta.com";
$email_subject = "Nuevo productor";

// Aquí se deberían validar los datos ingresados por el usuario

$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "E-mail: " . $_POST['email'] . "\n";


// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

    header('Location: http://www.redmaceta.com?email=1');
    
    $msg = null;
//if(isset($_POST["phpmailer"])){
    $nombre = "RED MACETA"; // htmlspecialchars($_POST["nombre"]); 


    //$email = $row2["email"]; ////
    $email= $_POST['email'];


    //$email =  $_POST['stripeEmail'];   // htmlspecialchars($_POST["email"]);
   // $asunto = htmlspecialchars($_POST["asunto"]);
    $asunto= "¡Saludos!";

    $mensaje =  '
    <!DOCTYPE html>
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
      
      <style>
        body {word-wrap: break-word;font-family: "Open Sans", sans-serif;}
          .contenedor{
              -webkit-border-radius: 10px;
              -moz-border-radius: 10px;
              border-radius: 10px;
              box-shadow: 2px 2px 5px #999999;
              margin: auto;
              font-size: 14px;
          }
          .head{
              background-image: url(http://redmaceta.com/prueba/PHPMailer-master/imgs/patron.png);
              background-repeat:repeat-x;
              background-position:bottom;
              background-color: #DF5D5D;
              width: 100%;
              height: 300px;
              text-align: center;
          }
          .contenedor{
              word-wrap: break-word;
              width: 80%;
              position: relative;
              left: 5%;
              top: -200px;
              z-index: 10;
              padding: 10px; 
              text-align: center;
              
          }
          .espan{
              display: block;
              background-color:limegreen;
              color: white;
              font-size: 14px;
              font-weight: bold;
          }
          h1{
              color: #DF5D5D;
          }
          img {
                max-width: 100%;
                height: auto;
            }
     </style>

</head>
<body>
<div class="head"> <img src="PHPMailer-master/imgs/logo_RM.png"> </div>
<div class="contenedor" style="
    word-wrap: break-word;">
    <img src="http://redmaceta.com/prueba/PHPMailer-master/imgs/foto_header.png" style="width:100%; height:auto;">
    <h1><strong>¡Saludos, estimado productor! </strong></h1>
<p style="
    word-wrap: break-word;">
Agradezco tu interés y te platico un poco Red Maceta: <br/><br/>

Somos una iniciativa que busca impulsar el consumo local, conectando a productores directamente con sus clientes.<br/><br/>

Este 5 de junio tuvimos nuestra primera Maceta (un evento en que los consumidores podrán recoger sus productos y conocer a los productores) y ahora estamos trabajando para realizar la segunda Maceta. Puedes encontrar a algunas de las personas que ya están colaborando con nosotros en nuestra página web. Asimismo, seguimos buscando productos únicos y auténticos de productores locales para crecer juntos.<br/><br/>

La primera fase del proceso es conocerte mejor ¿Nos podrías platicar un poco de ti y cómo haces tus productos?<br/><br/>



Gracias por registrarte. Ya tenemos tu correo y para continuar con tu registro por favor responde <a href="https://docs.google.com/forms/d/18BO9u9VnSADEhoyoHr2CgmZqnNmbUCQJxemXXYvX0kE/viewform?c=0&w=1"> este cuestionario. </a> <br/> <br/>

<a href="https://docs.google.com/forms/d/18BO9u9VnSADEhoyoHr2CgmZqnNmbUCQJxemXXYvX0kE/viewform?c=0&w=1">

<br/><br/>

    <img src="http://redmaceta.com/prueba/PHPMailer-master/imgs/Firma_fer.png" style="width:100%; height:auto;">
<br/><br/>

</div>
    
</body>
</html>';
    $adjunto = $_FILES["adjunto"];
    
    require "PHPMailer-master/PHPMailer-master/class.phpmailer.php";
    
    $mail = new PHPMailer;
    $mail->Host ="u81005991.1and1-data.host";
    $mail->From ="fernando@redmaceta.com";
    $mail->FromName =  "Red Maceta";
    $mail->Subject = $asunto;
    $mail->addAddress($email, $nombre);

    $mail->MsgHTML($mensaje);
    $mail->CharSet = 'UTF-8';
    
    if($adjunto["size"] > 0){
        $mail-> addAttachment($adjunto["tmp_name"], $adjunto["name"]);
    }
    if($mail->send()){
            $msg ="Enhorabuena mensaje enviado a $email"; 
    }else{
        $msg ="ah ocurrido un error";
    }
    
    
    
}else{
    header('Location: http://www.redmaceta.com?email=0');    
    die();
	
}
?>