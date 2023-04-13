
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
//session_start();

//set button disabled
$status = "disabled";

//get thread_id
$thread_id = $_GET['thread_id'];
$_SESSION['thread_id'] = $thread_id;

//get user_id
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 0;
}
$user_id = $_SESSION['user_id'];

//connect to db
include_once "../db/connect_db.php";
$conn = db_connect();

$query_threads = "SELECT * FROM threads WHERE id = :thread_id";
$query_topics = "SELECT * FROM topics";
$query_user = "SELECT * FROM user WHERE id = :user_id";

//$query = "SELECT * FROM user WHERE email = :email";
//$result = $conn->prepare($query);
//$result->execute([':email' => $email]);
//$user = $result->fetchAll();

$result_threads = $conn->prepare($query_threads);
$result_topics = $conn->prepare($query_topics);
$result_user = $conn->prepare($query_user);

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

//get user
try {
    $result_user->execute([':user_id' => $user_id]);
} catch (PDOException $e) {
    echo $query_user . "<br>" . $e->getMessage();
}
$user = $result_user->fetch(PDO::FETCH_BOTH);

if (isset($user['active'])) {
    if ($user['active']) {
        $status = 'enabled';
    }
}


?>
<!-- BEGIN PAGINA CONTAINER -->
<div>
    <div class="pb-4 w-screen">
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
            echo "<a href='../templates/main.php?reply&thread_id=$thread_id'>";
            echo match ($status) {
                'enabled' => "<button type='button' class='button inline-block rounded-full border-2 border-primary-100 px-6 pt-2 pb-[6px] text-xs font-medium uppercase leading-normal text-primary-700 hover:text-white transition duration-150 ease-in-out hover:border-primary-accent-100 hover:bg-blue-700 hover:bg-opacity-10 focus:border-primary-accent-100 focus:outline-none focus:ring-0 active:border-primary-accent-200 dark:text-primary-100 dark:hover:bg-neutral-100 dark:hover:var(--prussian-blue)' title='Reply' data-title data-te-ripple-init>reply</button>",
                'disabled' => "<button type='button' disabled class='button inline-block rounded-full border-2 border-primary-100 px-6 pt-2 pb-[6px] text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:border-primary-accent-100 hover:bg-blue-700 hover:bg-opacity-10 focus:border-primary-accent-100 focus:outline-none focus:ring-0 active:border-primary-accent-200 dark:text-primary-100 dark:hover:bg-neutral-100 dark:hover:var(--prussian-blue) cursor-not-allowed' title='Reply' data-te-ripple-init>reply</button>",
                default => "<a href='./main.php?wrong' class='border-5'>&#x58; wrong</a>",
            };
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
