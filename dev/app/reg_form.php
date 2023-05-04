<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
session_start();

//connect to db
include('./db/connect_db.php');
$conn = db_connect();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$retype_password = $_POST['retype_password'];

$_SESSION['email'] = $email;
$_SESSION['name'] = $name;

//$link = 'window.location.href=./templates/main.php?forum';

//check if email exists
$sql = "SELECT name FROM user WHERE email=:email";
$check_email = $conn->prepare($sql);
$check_email->execute([':email' => $email]);

if ($check_email -> rowCount() > 0) {
    echo nl2br("Something went wrong! Name: $email already exists.\n");
    header('Location: ./templates/main.php?login');
} else {

     // send email link
    include('./send-mail.php');
    $mail = SendMail($name, $email);
    try {
        $mail->addAddress($name, $email);

    } catch (\PHPMailer\PHPMailer\Exception $e) {
        echo 'addAddress error';
    }
    $mail->isHTML(true);                                  //Set email format to HTML

    $token = verification_hash($email);

    date_default_timezone_set('Europe/Amsterdam');
    $expire_date = strtotime("+3 Hours");

    $expire_date = date("Y-m-d h:i:s", $expire_date);

    $mail->Subject = 'Email verification';
    $mail->Body = '<h2>This is a verification mail</h2></b><br>Click on the button below to verify your mail.<br><br>
        <a href="http://localhost:8080/forum/dev/app/templates/main.php?token='.$token.'&verify">Verify email</<button>';

    $mail->AltBody = 'This is a verification mail /n Click on the button below to verify your mail.';

    try {
        $mail->send();
    } catch (\PHPMailer\PHPMailer\Exception $e) {
        echo 'send mail error';
    }

//===================================================================//
    try {
        $sql = "INSERT INTO user (name, email, password, token, expire_date) VALUES ('$name', '$email', '$password', '$token', '$expire_date')";
        $conn->exec($sql);
        echo nl2br("New record created successfully \n");
        echo "<script> window.location.href='./templates/main.php?check'; </script>";
        exit();
//===================================================================//

//        The commented code below causes the following error:
//        Warning: Cannot modify header information - headers already sent by (output started at /opt/lampp/htdocs/forum/dev/app/send-mail2.php:55) in /opt/lampp/htdocs/forum/dev/app/reg_form.php on line 57
//        header('Location: ../templates/main.php?forum');
//        exit();
//          use html -> <script> window.lo..... </script>

//===================================================================//
    } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
//===================================================================//
}

function verification_hash($email): string
{
    return hash("md5", $email);
}

$conn = null;