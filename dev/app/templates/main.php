<?php
    session_start();
?>
<?php

if( !isset($_SESSION['last_access']) || (time() - $_SESSION['last_access']) > 60 )

    $_SESSION['last_access'] = time();

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="EspDIY" content="esp8266 esp32 breadboard electronics DIY hobby">
    <title>Forum -index</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../css/default.css">
    <link rel="stylesheet" type="text/css" href="../../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../css/forum.css">
    <link rel="stylesheet" type="text/css" href="../../css/about.css">
    <link rel="stylesheet" type="text/css" href="../../css/login.css">
    <link rel="stylesheet" type="text/css" href="../../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../css/register.css">
    <link href="../../dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="container">
        <?php include('../templates/header.php'); ?>
        <br>
        <?php
            if (isset($_GET['menu'])) {
                include('../templates/menu.php');
            } elseif (isset($_GET['forum'])) {
                include('../templates/forum.php');
            } elseif (isset($_GET['about'])) {
                include('../templates/about.php');
            } elseif (isset($_GET['login'])) {
                include('../login/login.php');
            } elseif (isset($_GET['register'])) {
                include('../register.php');
            } elseif (isset($_GET['wrong'])) {
                include('../templates/wrong.php');
            } elseif (isset($_GET['oke'])) {
                include('../templates/oke.php');
            } elseif (isset($_GET['verified'])) {
                include('../templates/verified.php');
            } elseif (isset($_GET['check'])) {
                include('../templates/check_email.php');
            } elseif (isset($_GET['topic'])) {
                include('../threads/topic.php');
            }else {
                include('../templates/menu.php');
            }
        ?>
        <br>
        <?php include('../templates/footer.php'); ?>
    </div>
</body>
</html>