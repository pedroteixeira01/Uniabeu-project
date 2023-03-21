<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/PHPMAILER/vendor/phpmailer/phpmailer/src/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/PHPMAILER/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/PHPMAILER/vendor/phpmailer/phpmailer/src/SMTP.php';
require $_SERVER['DOCUMENT_ROOT'] . '/PHPMAILER/vendor/autoload.php';

Class Mail {

    public function enviarEmail($email, $ass, $msg, $nome = "") {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {

            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            /*
              $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = 'joaosilvabld@gmail.com';                     //SMTP username
              $mail->Password   = 'senhaFacin123@';                               //SMTP password
             */
            $mail->Host = 'vega.esg.br';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'academico.esg@esg.br';                     //SMTP username
            $mail->Password = '4cd3SG21';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            // 0 = off (for production use)
            // 1 = client messages
            // 2 = client and server messages
            $mail->SMTPDebug = 0;

            //Recipients
            $mail->setFrom('academico.esg@esg.br', 'Nome do Site');
            $mail->addAddress($email, $nome);     //Add a recipient
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $ass;
            $mail->Body = $msg;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}

?>