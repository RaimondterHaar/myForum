<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<?php
    include_once "../db/connect_db.php";
    $conn = db_connect();
    echo 'db connected <br><br>';

    $search_topic = $_GET['search_topic'];
//    echo $search_topic . "<br>";

    if (isset($search_topic)) {
//        $search_topic = htmlspecialchars($search_topic);
        $search_topic = '%'.$search_topic.'%';
        echo $search_topic  . "<br>";

//        $query = "SELECT title FROM topics WHERE title = :title";
        $query = "SELECT title FROM topics WHERE title LIKE :title";
        $result =  $conn->prepare($query);

        $result->execute([':title' => $search_topic]);

        $found_topics = $result->fetchAll();
        $_SESSION['found_topics'] = $found_topics;
//        print_r($_SESSION['found_topics']);
//        echo '<script>window.history.go(-1)</script>';
//            <p><a href="javascript:history.go(-1)" title="Return to previous page">« Go back</a></p>';
        foreach ($found_topics as $topic) {
            print_r($topic['title']);
            echo "<br>";
        }
//        header("Location: javascript://history.go(-1)"); //after go back $_SESSION['found_topics'] is empty
        $rows = $result->rowCount();
        echo "rows: " . $rows . "<br>";
    } else echo 'Something went wrong!';

