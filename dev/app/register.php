<meta name="register" content="register esp diy login">
<div class="register">
    <form action="../reg_form.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="" class="register-field" required pattern="[A-Za-z-,]{2,15}"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php if(isset($_SESSION['email'])) { echo $_SESSION['email']; }; ?>" class="register-field" required pattern="(\w\.?)+@[\w\.-]+\.\w{2,}"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" value="" class="register-field" required><br>
        <label for="retype_password">Retype password:</label><br>
        <input type="password" id="retype_password" name="retype_password" value="" class="register-field" required><br>
        <input type="hidden" name="form_submitted" value="1" />
        <input type="submit" name="send" value="Submit" class="submit button">
    </form>
</div>
<div>test
    <?php
            print_r($_SESSION);
      ?>
</div>
