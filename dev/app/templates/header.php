<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
    if (!isset($_SESSION['login'])) {
        $_SESSION['login'] = 0;
    }


?>
<meta name="header" content="header esp diy">
<!--// header-->
<span class="header text-left">
    <a href="./main.php?menu" class="navbar-espdiy">Esp DIY</a>
    <!--//    (A) MENU WRAPPER -->
    <nav id="hamnav">
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
    </nav>
</span>






