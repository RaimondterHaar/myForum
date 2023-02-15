<?php
    //start the session
    session_start();
    if ($_POST['email'] != NULL) {
        $_SESSION["email"] = $_POST["email"];
    }
?>
<div class="login">
        <form id="loginForm" action="../login/check_login.php" method="POST">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="
                <?php
                        echo $_SESSION["email"];
                ?>
            " class="login-field" required pattern="(\w\.?)+@[\w\.-]+\.\w{2,}"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" value="" class="login-field" required><br><br>
            <input type="hidden" name="form_submitted" value="1" />
            <span class="login-flex">
                <input type="submit" value="Submit" class="submit" />
                <input type="button" value="register" class="login-register" onclick="regButton()"/>
            </span>
        </form>
    </div>
    <script>
        function regButton() {
            location.href="../templates/main.php?register";
        }
    </script>
