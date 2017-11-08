<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: login.html");
    }
    include("Header.php");
?>

<html>
    
    <head>
        <link rel="stylesheet" type="text/css" href="menu.css"/>
    </head>
    
    <body>
    </body>

</html>
