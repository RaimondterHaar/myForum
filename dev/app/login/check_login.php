<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
session_start();

include_once "../db/connect_db.php";
$conn = db_connect();

$user_id = null;

if (isset($_SESSION["email"]) && isset($_POST["password"])) {
    //use sessionstorage
    $_SESSION["email"] = $_POST["email"];

    $password = $_POST["password"];
//    print_r('1 ' . ($password));
    $email = $_SESSION["email"];
    $value = 'wrong';

    //prepare statement
    $query = "SELECT * FROM user WHERE email = :email";
    $result = $conn->prepare($query);
    $result->execute([':email' => $email]); //add password
    $user = $result->fetchAll();

    $password_db = $user[0]['password'];
//    print_r('2 ' . ($password_db));die();
    if ($password_db != $password) {
       $value = 'wrong_password';
       header("Location: ../templates/main.php?wrong=$value");
       die();
    }

    if (count($user) > 0) {
        $user_id= $user[0]['id'];
        $_SESSION["user_id"] = $user_id;
//print_r($_SESSION['user_id']);die();
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