<?php

session_start();
unset($_SESSION['loggedIn']);
unset($_SESSION['account']);
session_destroy();
header('Location: login.php');

exit;

?>

