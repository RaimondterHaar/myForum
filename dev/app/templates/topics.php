<?php
//session_start();

if (!isset($_SESSION['topic_id'])) {
    $_SESSION['topic_id'] = '';
}

if (isset($_GET['thread_id'])) {
    $thread_id = $_GET['thread_id'];
}

if (isset($_GET['topic_id'])) {
    $topic_id = $_GET['topic_id'];
}
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