<?php
include("../../../db/config.php");
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$encryptPass = md5($password);
$account = $_POST['account'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];

$stmt = $db->prepare("INSERT INTO Logins VALUES (?, ?, ?, ?, ?, ?)");

$stmt->bind_param('ssssss', $username, $encryptPass, $account, $firstName, $lastName, $email);

$stmt->execute();

if ($stmt->affected_rows == -1) {
    echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>User could not be added to the database, please try again.
                      </div>";
} else {
    echo "<div class='alert alert-success'>
                        <strong>Success! </strong>User successfully added to the database.
                      </div>";
    $stmt->close();
}