<?php
    //rcuperando variables del html
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $mensaje = $_POST["mensaje"];

    $body = "Nombre: " . $nombre . "<br>Correo: " . $correo . "<br>Telefono: " . $telefono . "<br>Mensaje: " . $mensaje; 

    include_once('phpmailer/PHPMailer.php');
    include_once('phpmailer/SMTP.php');
    include_once('phpmailer/Exception.php');

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    //authentication SMTP enabled
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    //puerto que usa Gmail 465 or 587
    $mail->Port = 465; 
    //para acceder a la cuenta
    $mail->Username = "portafolio.jdcm@gmail.com";
    $mail->Password = "nst.DEXALRAK1995A";

    $mail->SetFrom("portafolio.jdcm@gmail.com", $nombre);
    $mail->AddAddress("ingejosedancm@gmail.com");
    $mail->Subject = "Te quieren contactar - Portafolio";
    $msj= $body;
    $mail->MsgHTML($msj); 
    $mail->CharSet='UTF-8';
    

 if(!$mail->Send()) {
    echo "ERROR: " . $mail->ErrorInfo;
 } else {
    echo "<script>
        alert('Los datos se han enviado correctament. Pronto me pondré en contacto con usted. Gracias');
        function redireccionar(){
            window.location= 'index.html';
          } 
          setTimeout ('redireccionar()', 1000); //tiempo expresado en milisegundos
        </script>";
 }
?>
