<?php

//saving info from text boxes
$enteredUsername = $_POST['username'];
$enteredPassword = $_POST['password'];

if($enteredUsername == '' || $enteredPassword == ''){
  header("Location: index.html");
}else{
  $encryptPass = md5($enteredPassword);

  //Retrieve database credentials and connect to database
  include("../../db/config.php");
  if ($stmt = $db->prepare("SELECT * FROM Logins WHERE username=? AND password=?")) {
      $stmt->bind_param('ss', $enteredUsername, $encryptPass);
      $stmt->execute();
      $stmt->bind_result($foundUsername, $foundPassword, $account, $firstName, $lastName, $email);
      $stmt->fetch();
      $stmt->close();

      //check if the credentials match an account in the database
     if($foundUsername == $enteredUsername and $foundPassword == $encryptPass ) {
          session_start();
          $_SESSION['loggedIn'] = "$enteredUsername";
          $_SESSION['account'] = "$account";

          header("Location: menu.php");
      }else{
        header("Location: index.html");
      }
    }
  }
?>
