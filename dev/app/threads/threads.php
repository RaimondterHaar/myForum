<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<script type="text/javascript">
    let screenHeight = sessionStorage.getItem('screenHeight');
    let screenWidth = sessionStorage.getItem('screenWidth');
    console.log("H " + screenHeight + ", W " + screenWidth);
</script>

<?php
//connect to db
include_once "../db/connect_db.php";
$conn = db_connect();

//get screenheight an screenWidth in PHP
$screenHeight = "<script>document.write(screenHeight)</script>";
$screenWidth = "<script>document.write(screenWidth)</script>";
//print_r($screenWidth);echo "<br>";print_r($screenHeight);die();
include "../threads/get_query_threads.php";
$query_threads = get_query_threads($screenHeight, $screenWidth);
print_r($query_threads);die();

$query_topics = "SELECT * FROM topics";

$result_threads = $conn->prepare($query_threads);
$result_topics = $conn->prepare($query_topics);

//get al threads in $thread_list
try {
    $result_threads->execute();
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
            Thread Title - Topics
        </span>
    </div>
    <div class="" >
        <?= "<div class='px-10 pb-20 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5'>";
        foreach ($thread_list as $thread) {
            $i = 0;
                //    <!--Card x-->
                echo "<div class='flex flex-wrap justify-self-center relative'>";
                echo "<div class='block max-w-sm rounded-lg bg-white shadow-lg dark:bg-neutral-700'>";
                echo "<a href='../templates/main.php?topics&thread_id=" . $thread['id'] . "'>";
                echo "<img class='rounded-t-lg' src='https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg' alt='' />";
                echo "</a>";
                echo "<div class='p-6'>";
                echo "<h5 class='mb-2 text-xl font-medium leading-tight text-blue-700 dark:text-blue-50'>";
                echo "<a href='../templates/main.php?topics&thread_id=" . $thread['id'] . "'>" . $thread['1'] . "</a>";
                echo "</h5>";
                echo "<p class='mb-4 text-base text-blue-600 dark:text-blue-200'>";
                foreach ($topic_list as $topic) {
                    if ($thread['id'] === $topic['thread_id']) {
                        $i++;
                    echo $i . " ";
                    echo "<a href='../templates/main.php?topics&topic_id=" . $topic['id'] . "'>" . $topic["title"] . "</a>";
    //                echo $topic["title"];
                    echo "<br>";
                    }
                }
                echo "</p>";
                echo "</div>";
                echo "<div class='h-4'></div>";
                echo "<div class='flex text-blue-700 bottom-0 absolute w-full'>";
                echo "<div class='w-1/2'>";
                echo "followers";
                echo "</div>";
                echo "<div class='w-1/2'>";
                echo "users";
                echo " " . $i;
                echo "</div>";
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

