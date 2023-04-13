<div class="bg-blue-500 col-span-3 text-white w-screen">
    <?php
//    session_start();

    $email = $_SESSION['email'];

    include_once "../db/connect_db.php";
    $conn = db_connect();

    if (!$conn) {
        echo "connection failed";
    }
    ?>
    <?php
        $sql = "SELECT active FROM user WHERE email = :email";
        $isActive = $conn->prepare($sql);
        $isActive->execute([':email' => $email]);
        $isActive = $isActive->fetch();


        if ($isActive['active']  == "1") {
            echo 'your email is verified ' . $_SESSION['name'];
            echo "<br>";
            echo "<br>";
            echo "In 5s you'll be redirected to the Forum :-)";

            header('Refresh:5; ../templates/main.php?forum');
        } else {
            echo "Something went wrong :-(. Please try again.";
        }
        ?>
</div>
