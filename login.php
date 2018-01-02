<?php

//saving info from text boxes
$username = $_POST['username'];
$password = $_POST['password'];

if($username == '' || $password == ''){
  header("Location: index.html");
}else{
  $encryptPass = md5($password);

  //Retrieve database credentials and connect to database
  include("db/config.php");
  if ($stmt = $db->prepare("SELECT * FROM Logins WHERE username=? AND password=?")) {
      $stmt->bind_param('ss', $username, $encryptPass);
      $stmt->execute();
      $stmt->bind_result($user_name, $pass, $account, $firstName, $lastName, $email);
      $stmt->fetch();
      $stmt->close();

      //check if the credentials match an account in the database
     if($user_name == $username and $pass == $encryptPass ) {
          session_start();
          $_SESSION['loggedIn'] = "$username";
          $_SESSION['account'] = "$account";

          header("Location: menu.php");
      }else{
        header("Location: index.html");
      }
    }
  }
?>
