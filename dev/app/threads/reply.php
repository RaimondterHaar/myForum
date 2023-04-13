<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
//session_start();

//connect to db
include_once "../db/connect_db.php";
$conn = db_connect();

//get session variables
$thread_id = $_SESSION['thread_id'];
$user_id = $_SESSION["user_id"];

//echo "thread_id: " . $_SESSION['thread_id'];
//echo "<br>";
//echo "user_id: " . $_SESSION['user_id'];

//get thread from topic
$query_threads = "SELECT * FROM threads WHERE id = :thread_id";
$result_threads = $conn->prepare($query_threads);

//get selected thread from $thread_list
try {
    $result_threads->execute([':thread_id' => $thread_id]);
} catch (PDOException $e) {
    echo $query_threads . "<br>" . $e->getMessage();
}
$thread_list = $result_threads->fetch(PDO::FETCH_ASSOC);
$_SESSION['thread_id'] = $thread_list['id'];
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
//        print_r($thread_list);
        echo "<form action='../threads/post_topic.php' method='post'>";
        echo "<input type='text' id='topic_name' name='topic_name' placeholder='topic' class='rounded-md text-center text-lg' required autofocus>";
        echo "</p>";
        echo "</h5>";
        echo "<p class='mb-4 text-base text-blue-600 dark:text-blue-200'>";
        echo "<textarea id='topic_content' name='topic_content' rows='5' cols='30' required placeholder='content here' class='border-solid rounded-t-md border-2 text-current'></textarea>";
        echo "<br>";
        echo "<input type='submit' value='submit' class='button inline-block rounded-full border-2 border-primary-100 px-6 pt-2 pb-[6px] text-xs font-medium uppercase leading-normal text-primary-700 hover:text-white transition duration-150 ease-in-out hover:border-primary-accent-100 hover:bg-blue-700 hover:bg-opacity-10 focus:border-primary-accent-100 focus:outline-none focus:ring-0 active:border-primary-accent-200 dark:text-primary-100 dark:hover:bg-neutral-100 dark:hover:var(--prussian-blue)' data-te-ripple-init>";
        echo "</form>";
        echo "<h5 class='mb-2 text-lg font-semibold leading-tight text-blue-700 dark:text-blue-50 '>";
        echo "Posted: ";
        echo date('l j F h:i');
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