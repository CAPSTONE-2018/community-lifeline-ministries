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
    <form action="NewVolunteerEmployeeAdded.php" method="POST" id="form2">
        <br>
        <label><h2>Add Volunteer/Employee Information:</h2></label><br>
        <label><h4>Volunteer/Employee Name:</h4>
            <input placeholder="First" type="text" name="fname">
            <input placeholder="Last" type="text" name="lname">
        </label>
        <br><br>

        <label><h4>Volunteer/Employee Id:</h4><input type="text" name="id"></label>

        <label><h4>Cell Phone:</h4><input type="text" name="cellphone"></label>
        <label><h4>Home Phone:</h4><input type="text" name="homephone"></label>
        <br><br>

        <label><h4>Address:</h4><input type="text" name="address"></label>
        <label><h4>City:</h4><input type="text" name="city"></label>
        <label><h4>State:</h4><input type="text" name="state"></label>
        <label><h4>Zip:</h4><input type="text" name="zip"></label>
        <br><br>


        <label><h4>Email:</h4><input type="text" name="email"></label>
        <br><br>

        <label><h4>Type:</h4><input type="text" name="type"></label>
        <br><br>

        <label><h4>Program:</h4><input type="text" name="program"></label>
        <br><br>

        <input id="submit" type="submit" value="Submit"><br><br>
    </form>
</div>

</body>
</html>
