<?php
include("../../../db/config.php");
session_start();
$userMakingChanges = $_SESSION['loggedIn'];
$username = $_POST['username'];
$password = $_POST['password'];
$encryptPass = md5($password);
$account = $_POST['account'];
$employeeId = $_POST['volunteer'];
$isActiveFlag = 1;

$queryForAllExistingUserNames = "SELECT * FROM Account_Login WHERE Username = '".$username."';";
$existingUserNameResults = mysqli_query($db, $queryForAllExistingUserNames);
$doesUserNameExist = mysqli_num_rows($existingUserNameResults);

if (trim($username) !== '' && trim($password) !== '' && $employeeId !== '' && $account !== '') {
    if ($doesUserNameExist > 0) {
        echo "entry-exists";
    } else {
        $stmt = $db->prepare("INSERT INTO Account_Login(Author_Username, Active_Id, Username, Password, Account_Type, Employee_Id) VALUES (?, ?, ?, ?, ?, ?);");
        $stmt->bind_param('sisssi', $userMakingChanges, $isActiveFlag, $username, $encryptPass, $account, $employeeId);
        $stmt->execute();

        if (mysqli_affected_rows($db) >= 1) {
            echo "success";
            $stmt->close();
        } else {
            echo "database-error";
            $stmt->close();
        }
    }
} else {
    echo "fill-required-inputs";
}
