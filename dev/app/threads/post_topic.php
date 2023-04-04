<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
session_start();

$topic_name = $_POST["topic_name"];
$topic_content = $_POST["topic_content"];
$thread_id = $_SESSION["thread_id"];
$user_id = $_SESSION["user_id"];

print_r($topic_name);
echo "<br>";
print_r($topic_content);
echo "<br>";
print_r($thread_id);
echo "<br>";
print_r($user_id);
echo "<br>";

//connect to db
include_once "../db/connect_db.php";
$conn = db_connect();

//make query
$query_add_topic = "INSERT INTO topics (title, content, thread_id, user_id) VALUES (:topic_name, :topic_content, :thread_id, :user_id)";
$result_add_topic = $conn->prepare($query_add_topic);
try {
    $result_add_topic->execute([':topic_name' => $topic_name, ':topic_content' =>  $topic_content,':thread_id' => $thread_id, ':user_id' => $user_id]);
    header('Location: ../templates/main.php?topics&thread_id=' . $thread_id);
} catch (PDOException $e) {
    echo $query_add_topic . "<br>" . $e->getMessage();
}
$topic_added = $result_add_topic->fetch();
//show topic added oke
?>