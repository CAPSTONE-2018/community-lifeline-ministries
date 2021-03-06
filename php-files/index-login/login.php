<?php
$enteredUsername = $_POST['username'];
$enteredPassword = $_POST['password'];

if (!isset($enteredUsername) && !isset($enteredPassword)) {
    header("Location: ../../index.html");
} else {
    $encryptPass = md5($enteredPassword);
    //Retrieve database credentials and connect to database
    include("../../db/config.php");
    if ($stmt = $db->prepare("SELECT Username, Password, Account_Type FROM Account_Login WHERE Username = ? AND Password = ?")) {
        $stmt->bind_param('ss', $enteredUsername, $encryptPass);
        $stmt->execute();
        $stmt->bind_result($foundUsername, $foundPassword, $account);
        $stmt->fetch();
        $stmt->close();

        //check if the credentials match an account in the database
        if ($foundUsername === $enteredUsername && $foundPassword === $encryptPass) {
            session_start();
            $_SESSION['loggedIn'] = "$enteredUsername";
            $_SESSION['account'] = "$account";

            header("Location: Main-Menu.php");
        } else {
            header("Location: ../../index.html");
        }
    }
}
?>
