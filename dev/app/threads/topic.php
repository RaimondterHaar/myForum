<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>
<?php
$topic_id = $_GET['topic_id'];

//connect to db
include_once "../db/connect_db.php";
$conn = db_connect();

//get topics
$query_topics = "SELECT * FROM topics WHERE id = :topic_id";
$result_topics = $conn->prepare($query_topics);

//get all topics in $result_topics
try {
    $result_topics->execute([':topic_id' => $topic_id]);
} catch (PDOException $e) {
    echo $query_topics . "<br>" . $e->getMessage();
}
$topic_list = $result_topics->fetch(PDO::FETCH_ASSOC);

//get thread from topic
$thread_id = $topic_list['thread_id'];
$query_threads = "SELECT * FROM threads WHERE id = :thread_id";
$result_threads = $conn->prepare($query_threads);

//get selected thread from $thread_list
try {
    $result_threads->execute([':thread_id' => $thread_id]);
} catch (PDOException $e) {
    echo $query_threads . "<br>" . $e->getMessage();
}
$thread_list = $result_threads->fetch(PDO::FETCH_ASSOC);
?>

<!-- BEGIN PAGINA CONTAINER -->
<div>
    <div class="pb-4">
        <span class="">
            <?php
            echo "<a href='../templates/main.php?topics&thread_id=" . $thread_list['id'] . "'>" . $thread_list['title'] . "</a>";
//            echo $thread_list['title'];
            ?>
        </span>
    </div>
    <div class="">
        <?php
        echo "<div class='px-10 pb-10 grid grid-cols-1 justify-items-center gap-5'>";
            $i = 0;
            //    <!--Card x-->
            echo "<div class='flex flex-wrap justify-self-center'>";
            echo "<div class='block max-w-sm rounded-lg bg-white shadow-lg dark:bg-neutral-700'>";
            echo "<img class='rounded-t-lg' src='https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg' alt='' />";
            echo "<div class='p-6'>";
            echo "<h5 class='mb-2 text-2xl font-semibold leading-tight text-blue-700 dark:text-blue-50 '>";
            echo "<p class='mb-4 text-base text-blue-600 dark:text-blue-200'>";
            echo $topic_list['title'];
            echo "</p>";
            echo "</h5>";
            echo "<p class='mb-4 text-base text-blue-600 dark:text-blue-200'>";
            echo $topic_list["content"];
            echo "<h5 class='mb-2 text-lg font-semibold leading-tight text-blue-700 dark:text-blue-50 '>";
            echo "Posted: ";
            echo $topic_list['created_at'];
            echo "</p>";
            echo "</h5>";
            echo "</div>";
            echo "</div>";
            //end card tailwind
            echo "</div>";
        echo "</div>";
        ?>
    </div>
</div>