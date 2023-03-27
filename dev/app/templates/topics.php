<?php
session_start();

$thread_id = null;
$topic_id = null;

$thread_id = $_GET['thread_id'];
$topic_id = $_GET['topic_id'];
?>

<meta name="forum" content="forum esp diy circuit how-to hat shield pinout sensor pico">
<div class="forum text-white justify-items-center" content="esp32 esp8266 kit cam iot mqtt raspberrypi project automation arduino">
    <?php
    if (isset($thread_id)) {
        include "../threads/thread.php";
    }
    if (isset($topic_id)) {
        include "../threads/topic.php";
    }
    ?>
</div>