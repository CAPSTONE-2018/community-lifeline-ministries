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
    <form action="NewStudentAdded.php" method="POST" id="form2">
        <br>
        <label><h2>Add Student Information:</h2></label><br>
        <label><h4>Student Name:</h4>
            <input placeholder="First" type="text" name="fname">
            <input placeholder="Last" type="text" name="lname">
        </label>
        <br><br>


        <label><h4>Date of Birth:</h4><input placeholder="YYYY/MM/DD" type="text" name="dob"></label>
        <br><br>

        <label><h4>Ethnicity:</h4><input type="text" name="ethnicity"></label>
        <label><h4>Gender:</h4>
            Male<input type="radio" value="M" name="gender">
            Female<input type="radio" value="F" name="gender">
        </label>
        <br><br>

        <label><h4>Address:</h4><input type="text" name="address"></label>
        <label><h4>City:</h4><input type="text" name="city"></label>
        <label><h4>City:</h4><input type="text" name="State"></label>
        <label><h4>Zip Code:</h4><input type="text" name="zip"></label>
        <br><br>

        <label><h4>School:</h4><input type="text" name="school"></label>
        <label><h4>Program Name:</h4><input type="text" name="program"></label>
        <label><h4>School Year:</h4><input type="text" name="school_year"></label>
        <br><br>

        <label><h4>Permission Slip on File:</h4>
            Yes<input type="radio" value="1" name="permission_slip">
            No<input type="radio" value="0" name="permission_slip">
        </label>
        <br><br>

        <label><h4>Birth Certificate on File:</h4>
            Yes<input type="radio" value="1" name="birth_certificate">
            No<input type="radio" value="0" name="birth_certificate">
        </label>
        <br><br>

        <label><h4>Reduced Lunch Eligible:</h4>
            Yes<input type="radio" value="1" name="reduced_lunch_eligible">
            No<input type="radio" value="0" name="reduced_lunch_eligible">
        </label>
        <br><br>

        <label><h4>Immediate Emotional Problem:</h4>
            Yes<input type="radio" value="1" name="iep">
            No<input type="radio" value="0" name="iep">
        </label>
        <br><br>

        <label><h4>Allergies:</h4>
            Type:<input type="text" name="iep">
            Note:<input type="text" name="iep">
        </label>
        <br><br>

        <label><h4>Pre-Test Score:</h4><input type="text" name="pre_test"></label>
        <label><h4>Post-Test Score:</h4><input type="text" name="post_test"></label>
        <br><br>

        <input id="submit" type="submit" value="Submit"><br><br>
    </form>
</div>
</body>

</html>
