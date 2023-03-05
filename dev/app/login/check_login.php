<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
session_start();

include_once "../db/connect_db.php";
$conn = db_connect();

$_SESSION["email"] = $_POST["email"];

if (isset($_SESSION["email"])) {
    //use sessionstorage
    $email = $_SESSION["email"];

    //prepare statement
    $query = "SELECT * FROM user WHERE email = :email";
    $result = $conn->prepare($query);
    $result->execute([':email' => $email]); //add password
    $user = $result->fetchAll();

    if (count($user) > 0) {
        header('Location: ../templates/main.php?forum');
        echo "rows>0";
    } else {
        header('Location: ../templates/main.php?register');
        echo "rows=0 ";
    }
} else {
    header('Location: ../templates/main.php?wrong');
    echo 'Something went wrong! Try again, please.';
}