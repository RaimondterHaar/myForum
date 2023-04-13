<?php
    //start the session
//    session_start();
    if (isset($_POST['email'])) {
        $_SESSION['email'] = $_POST['email'];
    } else {
        $_SESSION['email'] = '';
    }
?>
<meta name="login" content="Login esp diy how-to register">
<!--<link rel="stylesheet" type="text/css" href="../../css/default.css">-->
<div class="login bg-blue-500 w-screen">
        <form id="loginForm" action="../login/check_login.php" method="POST">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="
                <?php
                        echo $_SESSION['email'];
                ?>
            " class="login-field" autofocus required pattern="(\w\.?)+@[\w\.-]+\.\w{2,}"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" value="" class="login-field" required><br><br>
            <input type="hidden" name="form_submitted" value="1" />
            <span class="login-flex">
                <input type="submit" value="Submit" class="submit button bg-opacity-95" />
                <input type="button" value="register" class="login-register button bg-opacity-95" onclick="regButton()"/>
            </span>
        </form>
    </div>
    <script>
        function regButton() {
            location.href="../templates/main.php?register";
        }
    </script>

