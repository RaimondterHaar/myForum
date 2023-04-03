<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
session_start();

$topic_name = $_POST['topic_name'];
$topic_content = $_POST['topic_content'];
$thread_id = $_SESSION['thread_id'];
$user_id = $_SESSION['user_id'];

//connect to db
include_once "../db/connect_db.php";
$conn = db_connect();

//make query
$query_add_topic = "INSERT INTO topics (title, content, thread_id, user_id) VALUES (:topic_name, :topic_content, :thread_id, :user_id)";
$result_add_topic = $conn->prepare($query_add_topic);
try {
    $result_add_topic->execute([':topic_name' => $topic_name, ':topic_content' =>  $topic_content,':thread_id' => $thread_id, ':user_id' => $user_id]);
} catch (PDOException $e) {
    echo $query_add_topic . "<br>" . $e->getMessage();
}
$topic_added = $result_add_topic->fetch();
//show topic added oke
?>
<meta name="post_topic" content="post_topic esp diy circuit how-to hat shield pinout sensor pico">
<div class="post_topic text-black" content="esp32 esp8266 kit cam iot mqtt raspberrypi project automation arduino">
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
            echo "<button type='button' class='button inline-block rounded-full border-2 border-primary-100 px-6 pt-2 pb-[6px] text-xs font-medium uppercase leading-normal text-primary-700 hover:text-white transition duration-150 ease-in-out hover:border-primary-accent-100 hover:bg-blue-700 hover:bg-opacity-10 focus:border-primary-accent-100 focus:outline-none focus:ring-0 active:border-primary-accent-200 dark:text-primary-100 dark:hover:bg-neutral-100 dark:hover:var(--prussian-blue)' data-te-ripple-init>reply</button>";
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