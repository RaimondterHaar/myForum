<?php
session_start();
?>
<div class="bg-blue-500 col-span-3 text-white h-screen w-screen">
<?php
$type = $_GET['wrong'];
//print_r($type);die();
switch ($type):
    case 'wrong_password':
        echo "Your password is wrong. Please try again!";
        header('Refresh:3; ../templates/main.php?login');
        break;
    default:
        echo "Something went wrong! Try again, please. ";
        print_r($_SESSION);
        header('Refresh:3; ../templates/main.php');
    endswitch;
?>
</div>
