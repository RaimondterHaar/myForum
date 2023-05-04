<?php
session_start();

if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = 0;
}
?>

<meta name="header" content="header esp diy">
<!--// header-->
<span class="header">
    <a href="./main.php?menu" class="navbar-espdiy">Esp DIY</a>
    <!--//    (A) MENU WRAPPER -->
    <span id="hamnav">
        <!--//    (B) THE HAMBURGER -->
        <label for="hamburger" style="font-size: xxx-large;">&#9776;</label>
        <input type="checkbox" id="hamburger" hidden/>

        <!--//     (C) MENU ITEMS -->
        <div id="hamitems">
            <ul class="u_list_v float-right border-none">
                <li class="float-right w-full">
                    <a href="./main.php?menu">Home</a>
                </li>
                <li class="float-right w-full">
                    <a href="./main.php?forum">Forum</a>
                </li>
                <li class="float-right w-full">
                    <a href="./main.php?about">About</a>
                </li>
                <li class="float-right w-full h-8 md:bg">
                </li>
                <?php
                echo "<li class='float-right w-full shadow-inner border-solid shadow-lg rounded-lg'>";
                echo match ($_SESSION['login']) {
                    0 => "<a href='./main.php?login' class='border-5'>&#x1f511; Login</a>",
                    1 => "<a href='./main.php?logout' class='border-5'>&#x1f511; Logout</a>",
                    default => "<a href='./main.php?wrong' class='border-5'>&#x58; wrong</a>",
                };
                echo "</li>";
                ?>
            </ul>
        </div>
    </span>
    <div class="col-span-3">
        <div class="pb-6 text-center text-[#022f46]">
            <form action="../search/search.php" methode="get">
                <input type="text" name="search_topic" class="rounded-lg text-blue-800" required />
                <input type="submit" name="submit" placeholder="Search topic" class="rounded-lg px-2 button"/>
            </form>
        </div>
        <div>
            <?php
            if (!isset($_SESSION['rows'])) {
                $_SESSION['rows'] = '';
            }
            $rows = $_SESSION['rows'];

            if (isset($_SESSION['found_topics'])) {
                $topics = $_SESSION['found_topics'];
                if (is_string($topics)) {
                    //make html drop down menu
                    echo "<label for='espdiy'></label>";
                    echo "<select id='espdiy' class='no-number rounded-lg'>";
                    echo "<option value=''>";
                    print_r($topics);
                    echo "</option>";
                } else {
                    echo $rows;
                    echo " topics ";

                    echo "<label for='espdiy'></label>";
                    echo "<select onclick='go_to_topic($(this))' id='espdiy' class='no-number rounded-lg'>";
                    foreach ($topics as $topic) {
                        echo '<option value="../templates/main.php?topics&topic_id=' . $topic["id"] . '  ">'.$topic["title"].'</option>';
                    }
                }
                echo "</select>";
                //end drop down menu
            }
            $_SESSION['found_topics'] = null;
            ?>
        </div>
    </div>
</span>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    function go_to_topic(val) {
        console.log(val);
        window.open(val.val(), "_self");
    }
</script>






