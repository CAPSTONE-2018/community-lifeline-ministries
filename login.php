<?php
    include("db/db.php");

    //saving info from text boxes
    $username = $_POST['username'];
    $password = $_POST['password'];
    $encryptPass = md5($password);


    if ($stmt = $db->prepare("SELECT * FROM Logins WHERE username=? AND password=?")) {

        $stmt->bind_param('ss', $username, $encryptPass);

        $stmt->execute();

        $stmt->bind_result($user_name, $account, $firstName, $lastName, $email, $pass);
        $stmt->fetch();

        //checking if the credentials match an account in the database
        if($user_name == $username and $pass == $encryptPass and checkUsername($username) and checkPassword($password)) {
            session_start();
            $_SESSION['loggedIn'] = "$username";
            header("Location: menu.php");
        } else {
            unset($_SESSION['loggedIn']);
            header("Location: login.html");
        }
        $stmt->close();
        }

    //checking if the username and password are left blank
    function checkUsername($userStr) {
        if($userStr == NULL){
            return false;
        } else {
            return true;
        }
    }

    function checkPassword($passStr) {
        if($passStr == NULL){
            return false;
        } else {
            return true;
        }
    }
    ?>
