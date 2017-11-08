<?php
session_start();
if(!isset($_SESSION['loggedIn'])){
    header("Location: login.html");
}
include("Header.php");
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="adding.css"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

<div id="form_wrapper">
    <form action="NewStudentToClassAdded.php" method="POST" id="form2">
        <br>

        <label><h2>Add Student and Class Information:</h2></label><br>
        <label><h4>Student Id:</h4>
            <input placeholder="Student Id" type="text" name="sid">
        </label>
        <br><br>
        <input placeholder="Class Id" type="text" name="cid">


        <input id="submit" type="submit" value="Submit"><br><br>
    </form>
</div>
</body>

</html>
