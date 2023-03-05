<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
//connect to db
include_once "../db/connect_db.php";
$conn = db_connect();

$query_threads = "SELECT * FROM threads";
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

function show_topics($thread): void {
    echo 'show_topics()';
}
?>
<!-- BEGIN PAGINA CONTAINER -->
<!--    <div class="container main-content h-screen shadow-2xl">-->
      <div class="row first-row shadow-xl">

        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">
                        Thread Title - Topics</span>
                        <?php

                            foreach ($thread_list as $thread) {
                                echo "<br>";
                                echo "* ";
                                echo "<a href='#' onClick="show_topics($thread);">" . $thread . "</a>";
                                echo ": ";
                                $i = 0;
                                foreach ($topic_list as $topic) {
                                    if ($thread['id'] === $topic['thread_id']) {
                                            $i++;
                                    }
                                } echo " -". $i . " topics";
                            }
                        ?><br>
                    <div class="collection">
                        <!-- BEGIN TOPIC -->
                        <a href="../templates/main.php?topic" class="collection-item avatar collection-link">
                            <img src="http://www.gravatar.com/avatar/fc7d81525f7040b7e34b073f0218084d?s=50" alt="" class="square">

                            <div class="row">

                                <div class="col s8">
                                    <div class="row last-row">
                                        <div class="col s12">
                                            <span class="title">Thema &gt; PHP</span>
                                            <p>Eerste paar regels van het nieuwste bericht en door wie en wanneer</p>
                                        </div>
                                    </div>
                                    <div class="row last-row">
                                        <div class="col s12 post-timestamp">Gepost door: SMN op: 12-10-2015 11:43</div>
                                    </div>
                                </div>

                                <div class="col s2">
                                    <h6 class="title center-align">Replies</h6>
                                    <p class="center replies">8</p>
                                </div>

                                <div class="col s2">
                                    <h6 class="title center-align">Status</h6>
                                    <div class="status-wrapper">
                                        <span class="status-badge status-open">open</span>
                                    </div>
                                </div>

                            </div>
                        </a>
                        <!-- EINDE TOPIC -->

                    </div>
                </div>
            </div>
        </div>

      </div>
<!--    </div>-->
    <!-- EINDE PAGINA CONTAINER -->
