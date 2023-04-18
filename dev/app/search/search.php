<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<?php
    session_start();
    $_SESSION['found_topics'] = 'no topic found';
//print_r($_SESSION['found_topics']);
    include_once "../db/connect_db.php";
    $conn = db_connect();
    echo 'db connected <br><br>';

    $search_topic = $_GET['search_topic'];
//    echo $search_topic . "<br>";

    if (isset($search_topic)) {
        $search_topic = htmlspecialchars($search_topic);
        $search_topic = '%' . $search_topic . '%';
        echo $search_topic . "<br>";

        $query = "SELECT title FROM topics WHERE title LIKE :title";
        $result = $conn->prepare($query);

        $result->execute([':title' => $search_topic]);

        $found_topics = $result->fetchAll();
        $rows = $result->rowCount();

        if ($rows > 0) {
            $_SESSION['found_topics'] = $found_topics;
//        print_r($_SESSION['found_topics']);
//        echo '<script>window.history.go(-1)</script>';
//            <p><a href="javascript:history.go(-1)" title="Return to previous page">« Go back</a></p>';
//            foreach ($found_topics as $topic) {
//                echo '-';
//                print_r($topic['title']);
//                echo "<br>";
//            }
//            header("Location: javascript://history.go(-1)");
            Header('Location:'.$_SERVER['HTTP_REFERER']);
        } else {
            Header('Location:'.$_SERVER['HTTP_REFERER']);
        }
    } else echo 'Something went wrong!';

