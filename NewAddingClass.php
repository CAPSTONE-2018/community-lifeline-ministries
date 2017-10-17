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
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>

<body>

<div id="form_wrapper">
    <form action="NewClassAdded.php" method="POST" id="form2">
        <br>

        <label><h2>Add Class Information:</h2></label><br>
        <label><h4>Class Name:</h4>
            <input placeholder="Class Name" type="text" name="name">
        </label>
        <br><br>

        <label><h4>Room Number:</h4><input type="text" name="rnum"></label>
        <label><h4>Day:</h4><input type="text" name="day"></label>
        <label><h4>Start Time:</h4><input type="text" name="stime"></label>
        <label><h4>End Time:</h4><input type="text" name="etime"></label>

        <input id="submit" type="submit" value="Submit"><br><br>
    </form>
</div>
</body>

</html>
