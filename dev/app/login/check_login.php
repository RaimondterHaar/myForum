<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
session_start();

include_once "../db/connect_db.php";
$conn = db_connect();

if (isset($_POST["email"]) && isset($_POST["password"])) {
    //use sessionstorage
    $_SESSION["email"] = $_POST["email"];
    $email = $_SESSION["email"];
    $password = $_POST["password"]; //password from site
    $value = 'wrong';

    //prepare statement
    $query = "SELECT * FROM user WHERE email = :email";
    $result = $conn->prepare($query);
    $result->execute([':email' => $email]);
    $user = $result->fetchAll();

    $password_db = $user[0]['password']; // password from user (db)

    if (count($user) > 0) {
        $user_id= $user[0]['id'];
        $_SESSION["user_id"] = $user_id;

        if ($password_db != $password) {
            $value = 'wrong_password';
            header("Location: ../templates/main.php?login");
            die();
        }

        //set active=1
        $sql = "UPDATE user SET active = 1 WHERE email = :email"; // wrong sql
        $set_active = $conn->prepare($sql);
        $set_active->execute([':email' => $email]);

        //set $_SESSION[login] = 1
        $_SESSION['login'] = 1;

        header('Location: ../templates/main.php?forum');
        echo "rows>0";
    } else {
        header('Location: ../templates/main.php?register');
        echo "rows=0 ";
    }
} else {
//    header('Location: ../templates/main.php?wrong');
    echo 'Password is not set! Try again, please.';
}