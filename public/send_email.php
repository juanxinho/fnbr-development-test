<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = $_ENV['MAIL_HOST'];
    $mail->SMTPAuth = true;
    $mail->Port = $_ENV['MAIL_PORT'];
    $mail->Username = $_ENV['MAIL_USERNAME'];
    $mail->Password = $_ENV['MAIL_PASSWORD'];;


    $mail->setFrom($_ENV['MAIL_FROM_ADDRESS'], $_ENV['MAIL_FROM_NAME']);
    $mail->addAddress($email);

     //content
    $mail->isHTML(true);
    $mail->Subject = 'Registro de datos exitoso';
    $mail->Body = '<h1>Saludos! Hemos registrado Exitosamente tu solicitud</h1>';

    if($mail->send() == false){
        $sendMail = 'Error no se pudo enviar el correo '.' '.$mail->ErrorInfo;
    }else{
        $sendMail = true;
    }
?>