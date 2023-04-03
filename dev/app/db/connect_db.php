<?php
function db_connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "forum";

    //Create connection
    $conn = new PDO(
        "mysql:dbname=$dbname;
        host=$servername;",
        "$username",
        "$password",
    );

// set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//https://www.php.net/manual/en/pdo.setattribute.php

//    echo "connect_db: " . getcwd() . "<br>";
//    die();

    return $conn;
}

$conn = db_connect();


