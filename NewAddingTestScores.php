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
    <form action="NewTestScoresAdded.php" method="POST" id="form2">
        <br>


        <label><h4>Student ID Number:</h4><input type="text" name="id"></label>
        <br><br>

        <label><h4>Term:</h4><input type="text" name="term"></label>
        <label><h4>Year:</h4><input type="text" name="year"></label>

        <label><h4>Pre-Test Score:</h4><input type="text" name="pre_test"></label>
        <label><h4>Post-Test Score:</h4><input type="text" name="post_test"></label>
        <br><br>

        <input id="submit" type="submit" value="Submit"><br><br>
    </form>
</div>
</body>

</html>
