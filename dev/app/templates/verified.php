<div class="bg-blue-500 w-screen block">
    <?php
        echo 'your email is verified ' . $_SESSION['email'];
//    set active = true voor toegang tot de volledige site
    //if active is true run header
        header('Location: ../templates/main.php?forum');
//    header('Location: ../templates/main.php?oke');
        ?>
</div>
