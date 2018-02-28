<?php

session_start();
unset($_SESSION['loggedIn']);
unset($_SESSION['account']);
session_destroy();
header("Location: ../index.html");

if(isset($_SERVER['HTTP_REFERER'])) {
    header('Location: '.$_SERVER['HTTP_REFERER']);
} else {
    header('Location: login.php');
}
exit;

?>

