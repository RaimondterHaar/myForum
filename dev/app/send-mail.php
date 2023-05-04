<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once './vendor/autoload.php';

//function for send mail
function SendMail($name, $email) {
//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'rh.terhaar@gmail.com';                     //SMTP username
        $mail->Password = 'mbizcxrnqrueuwuj';                //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port = 587;                                    //TCP port to connect to; use 587 (was 465) if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('rh.terhaar@gmail.com', 'Mailer');
        $mail->addAddress($email, $name);     //Add a recipient
//        $mail->addAddress($_SESSION["email"]);               //Name is optional
//        $mail->addReplyTo('rh.terhaar@icloud.com', 'Raimond');
//        $mail->addCC('cc@example.com');
//        $mail->addBCC('bcc@example.com');

//        //Attachments
//        $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
//        $mail->isHTML(true);                                  //Set email format to HTML
//        $mail->Subject = 'Email verification';
//        $mail->Body = '<b><h2>This is a verification mail</h2></b><br>Click on the button below to verify your mail. Confirm email.';
//        $mail->AltBody = 'This is a verification mail /n Click on the button below to verify your mail.';

//        $mail->send();
        echo 'Message has been sent';
        return $mail;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}