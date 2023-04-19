<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<?php
    session_start();
    $_SESSION['found_topics'] = 'no topic found';

    include_once "../db/connect_db.php";
    $conn = db_connect();
    echo 'db connected <br><br>';

    $search_topic = $_GET['search_topic'];

    if (isset($search_topic)) {
        $search_topic = htmlspecialchars($search_topic);
        $search_topic = '%' . $search_topic . '%';
//        echo $search_topic . "<br>";

        $query = "SELECT title FROM topics WHERE title LIKE :title";
        $result = $conn->prepare($query);

        $result->execute([':title' => $search_topic]);

        $found_topics = $result->fetchAll();
        $rows = $result->rowCount();
        $_SESSION['rows'] = $rows;

        if ($rows > 0) {
            $_SESSION['found_topics'] = $found_topics;
        }
        Header('Location:'.$_SERVER['HTTP_REFERER']);
    } else echo 'Something went wrong!';

