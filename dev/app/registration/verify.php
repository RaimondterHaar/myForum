<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
include_once "../db/connect_db.php";
$conn = db_connect();

if (!$conn) {
    echo "connection failed";
}

$token = $_GET['token'];
$email = $_SESSION['email'];

$query = "SELECT token FROM user WHERE email = :email";

$token_from_db = $conn->prepare($query);
$token_from_db->execute([':email' => $email]); //pdo geeft een object terug
$token_from_db = $token_from_db->fetch(); //fetch geeft een array
$token_from_db = $token_from_db["token"];

if ($token_from_db === $token) {

    echo $token_from_db . " === " . $token . "<br>";

    $sql = "UPDATE user SET active = 0x01 WHERE email = :email"; // wrong sql
    $set_active = $conn->prepare($sql);
    $set_active->execute([':email' => $email]);

    header('Location: ../templates/main.php?verified');
} else {
    echo "Wrong token <br>";
}