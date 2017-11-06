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
    <form action="NewStudentAdded.php" method="POST" id="form2">
        <br>
        <label><h2>Add Student Information:</h2></label><br>
        <label><h4>Student Name:</h4>
            <input placeholder="First" type="text" name="fname">
            <input placeholder="Last" type="text" name="lname">
        </label>
        <br><br>

        <label><h4>Student ID Number:</h4><input type="text" name="id"></label>
        <br><br>


        <label><h4>Date of Birth:</h4><input placeholder="YYYY/MM/DD" type="text" name="dob"></label>
        <br><br>

        <label><h4>Ethnicity:</h4><input type="text" name="ethnicity"></label>
        <label><h4>Gender:</h4>
            <select name="gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </label>
        <br><br>

        <label><h4>Address:</h4><input type="text" name="address"></label>
        <label><h4>City:</h4><input type="text" name="city"></label>
        <label><h4>State:</h4><input type="text" name="state"></label>
        <label><h4>Zip Code:</h4><input type="text" name="zip"></label>
        <br><br>

        <label><h4>School:</h4><input type="text" name="school"></label>
        <label><h4>Program Name:</h4>
            <select name="program">
                <option value="G.E.M.S">G.E.M.S</option>
                <option value="Sons of Thunder">Sons of Thunder</option>
            </select>
        </label>
        <br><br>

        <label><h4>Permission Slip on File:</h4>
            <select name="permission_slip">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>

        </label>
        <br><br>

        <label><h4>Birth Certificate on File:</h4>
            <select name="birth_certificate">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>

        </label>
        <br><br>

        <label><h4>Reduced Lunch Eligible:</h4>
            <select name="reduced_lunch_eligible">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </label>
        <br><br>

        <label><h4>Immediate Emotional Problem:</h4>
            <select name="iep">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </label>
        <br><br>

        <label><h4>Allergies:</h4>
            Type:<input type="text" name="atype">
            Note:<input type="text" name="anote">
        </label>
        <br><br>


        <input id="submit" type="submit" value="Submit"><br><br>
    </form>
</div>
</body>

</html>
