<?php
session_start();
if(!isset($_SESSION['loggedIn'])){
    header("Location: login.html");
}
include("Header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Documentation</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Table of contents</h1>
        <hr />
        <div class="list-group">
            <a href="#addnewuser" class="list-group-item list-group-item-action">Adding a New User</a>
            <a href="#addnewobject" class="list-group-item list-group-item-action">Adding Objects to the Database</a>
            <a href="#updateobject" class="list-group-item list-group-item-action">Updating Objects in the Database</a>
            <a class="list-group-item list-group-item-action">Searching For an Object in the Database</a>
            <a class="list-group-item list-group-item-action">Displaying Objects in the Database</a>
            <a class="list-group-item list-group-item-action">Creating a Report</a>
            <a class="list-group-item list-group-item-action">Printing Reports/Lists</a>
        </div>
        <br />


        <h1 id="addnewuser">Adding a New User</h1>
        <hr />
        <ol>
            <li>Make sure you have administrator privileges.</li>
            <li>Click on the Register new user sub-tab under the administrative tools tab.</li>
            <li>Populate the input fields with the appropriate information.</li>
            <li>Click the submit button.</li>
            <li>Assuming the newly entered user does not already exists in the database, you should have successfully added a new user. </li>
        </ol>
        <br />


        <h1 id="addnewobject">Adding Objects to the Database</h1>
        <hr />
        <ol>
            <li>Click on the student/contact/volunteer/employee/class/student to class/student test score sub-tab under the New tab.</li>
            <li>Populate the fields with the appropriate information.</li>
            <li>Click the submit button.</li>
            <li>Assuming the newly entered object does not already exists in the database, you should have successfully added a new object. </li>
        </ol>
        <br />

        <h1 id="updateobject">Updating Objects in the Database</h1>
        <hr />
        <ol>
            <li>Click on the student/contact/volunteer/employee/class/student test score sub-tab under the Update tab.</li>
            <li>Select Object you want to update from the drop down list.</li>
            <li>On selection of an Object, a form will be displayed with the Object's information. Any blank fields indicate no data was entered previously for that field.</li>
            <li>Update the fields with the appropriate information.</li>
            <li>Click the submit button.</li>
            <li>You should have successfully updated the object and pushed the changes to the database. </li>
        </ol>
        <br />


    </div>

</body>
</html>
