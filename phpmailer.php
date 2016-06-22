<?php
$msg = null;
//if(isset($_POST["phpmailer"])){
    $nombre = "RED MACETA"; // htmlspecialchars($_POST["nombre"]); 
    $email =  "hugui_95@hotmail.com";   // htmlspecialchars($_POST["email"]);
   // $asunto = htmlspecialchars($_POST["asunto"]);
    $asunto= "Detalles de compra";

    $mensaje =  '
<!DOCTYPE html>
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
      
      <style>
        body {
            
    word-wrap: break-word;
            
            font-family: "Open Sans", sans-serif;}
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
    <h1><strong>¡Saludos, responsable consumidor! </strong></h1>
<p style="
    word-wrap: break-word;">
Gracias por sembrar la diferencia a través de Red Maceta. Con tu compra no sólo
consumirás productos orgánicos, saludables y de la mejor calidad, también 
apoyas la economía local y ayudas a mejorar los ingresos de los productores.

Para que no se te olvide, te dejamos una lista con las cosas que pediste: <br/><br/>
    
    <table>
        <thead>
                <tr>
                <th data-field="id">Producto</th>
                <th data-field="cantidad">Cantidad</th>
                <th data-field="cantidad">Unidad</th>
                <th data-field="importe">Importe</th>
                 </tr>
        </thead>
        <tbody id="tabla_confirmar">
             </tbody>
         </table>
	<!--  row  -->
	<tr >
		<td><span>'.$row["Nombre"].'</span></td>
		<td><span>'.$cants[$i].'</td>
		<td><span></span>'.$row["Unidad"].'(s)</td>
		<td >$ <span>'.$precio[$i]*$cants[$i].'
        </span> MXN</td>
	</tr>
    
    
Total: '.$_SESSION['total'].' (Chorroscientos mil pesos 00/100 M.N.)

Código: WTF123 
    
<br/><br/>
<span class="espan">Recuerda que debes recogerlos este próximo 5 de junio a las 10:00 a.m. en el 
Huerto Roma Verde.</span> Nuestros productores  estarán muy contentos de platicar 
contigo y entregarte tus deliciosos alimentos. Además podrás disfrutar de talleres, 
conferencias y hasta clase de Yoga.

Sabemos que tienes GPS y podrás llegar, pero de todos modos te dejamos un mapa
con la ubicación de nuestra Primera Maceta para que lo tengas a la mano: <br/>
<img src="http://redmaceta.com/prueba/PHPMailer-master/imgs/icon_locacion.png"  height="auto" width="50" style="text-align:center;">


<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7525.949528598601!2d-99.15750565403415!3d19.413496303714215!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x503f6a2225f6d130!2sHuerto+Roma+Verde!5e0!3m2!1ses!2smx!4v1464117382705" width="100%" height="auto" frameborder="0" style="border:0" allowfullscreen></iframe>
 <br/>
 Los productores y Red Maceta estamos muy felices de que formes parte de nuestra
 comunidad. Tú puedes hacerla crecer compartiendo tu experiencia con tus amigos. 

<i>P.D.: También nos preocupa el planeta, por lo que no es necesario que imprimas 
este correo, sólo muestra tu código para recibir tus productos.</i>
</p>
<img src="http://redmaceta.com/prueba/bulbasaur.jpg"  height="auto" width="420" style="text-align:center;">

</div>
    
</body>
</html>';
    $adjunto = $_FILES["adjunto"];
    
    require "PHPMailer-master/PHPMailer-master/class.phpmailer.php";
    
    $mail = new PHPMailer;
    $mail->Host ="u81005991.1and1-data.host";
    $mail->From ="aloha@redmaceta.com";
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
        $msg ="ah ocurrido un errorts";
    }
// }

?>

<html>
<head>
    <meta charset="utf-8";
    
    </head>
<body>
    
    <h1>Enviar Email con PHPMailer</h1>
    <strong><?php echo $msg; ?></php></strong>
    <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]?>"> <br/><br/>
        <input type="email" name="email" placeholder="email"><br/><br/>
        <input type="text" name="asunto" placeholder="Asunto"><br/><br/>
        <input type="file" name="adjunto"><br/><br/>
        <textarea name="mensaje" cols="30" rows="10"></textarea>    <br/><br/>
            <input type="hidden" name="phpmailer"><br/><br/>
            <input type="submit" value="Enviar email"><br/><br/>
        
    </form>
    </body>

</html>