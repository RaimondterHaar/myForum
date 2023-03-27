
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
//session_start();

//get thread_id
$thread_id = $_GET['thread_id'];
$_SESSION['thread_id'] = $thread_id;

//connect to db
include_once "../db/connect_db.php";
$conn = db_connect();

$query_threads = "SELECT * FROM threads WHERE id = :thread_id";
$query_topics = "SELECT * FROM topics";

$result_threads = $conn->prepare($query_threads);
$result_topics = $conn->prepare($query_topics);

//get selected thread from $thread_list
try {
    $result_threads->execute([':thread_id' => $thread_id]);
} catch (PDOException $e) {
    echo $query_threads . "<br>" . $e->getMessage();
}
$thread_list = $result_threads->fetchAll();


//get all topics in topics_list
try {
    $result_topics->execute();
} catch (PDOException $e) {
    echo $query_topics . "<br>" . $e->getMessage();
}
$topic_list = $result_topics->fetchAll();
?>
<!-- BEGIN PAGINA CONTAINER -->
<div>
    <div class="pb-4">
        <span class="">
            Thread
        </span>
    </div>
    <div class="">
        <?php
        echo "<div class='px-10 pb-10 grid grid-cols-1 justify-items-center gap-5'>";
        foreach ($thread_list as $thread) {
            $i = 0;
            //    <!--Card x-->
            echo "<div class='flex flex-wrap justify-self-center'>";
            echo "<div class='block max-w-sm rounded-lg bg-white shadow-lg dark:bg-neutral-700'>";
            echo "<img class='rounded-t-lg' src='https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg' alt='' />";
            echo "<div class='p-6'>";
            echo "<h5 class='mb-2 text-xl font-medium leading-tight text-blue-700 dark:text-blue-50'>";
            echo $thread['1'];
            echo "</h5>";
            echo "<p class='mb-4 text-base text-blue-600 dark:text-blue-200'>";
            foreach ($topic_list as $topic) {
                if ($thread['id'] === $topic['thread_id']) {
                    $i++;
                    echo $i . " ";
                    echo "<a href='../templates/main.php?topics&topic_id=" . $topic['id'] . "'>" . $topic["title"] . "</a>";
                    echo "<br>";
                }
            }
            echo "</p>";
            echo "</div>";
            echo "<div class=''>";
            echo "<p class='mb-4 text-base text-blue-600 dark:text-blue-200'>";
            echo "<a href='../templates/main.php?reply&thread_id=$thread_id'";
            echo "<button type='button' class='inline-block rounded-full border-2 border-primary-100 px-6 pt-2 pb-[6px] text-xs font-medium uppercase leading-normal text-primary-700 hover:text-white transition duration-150 ease-in-out hover:border-primary-accent-100 hover:bg-blue-700 hover:bg-opacity-10 focus:border-primary-accent-100 focus:outline-none focus:ring-0 active:border-primary-accent-200 dark:text-primary-100 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10' data-te-ripple-init>reply</button>";
            echo "</a>";
            echo "</p>";
            echo "</div>";
            echo "</div>";
            //end card tailwind
            echo "</div>";
        }
        echo "</div>";
        ?>
    </div>
</div>
<!-- EINDE PAGINA CONTAINER -->
