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

        <div class="container">
            <div id="form_wrapper">
                <form class="form-horizontal" action="NewStudentToClassAdded.php" method="POST" id="form2">

                    <h1>Add Student and Class Information:</h1>
                    <br />
                    <div class="row">

                        <div class="form-group">
                            <div class="col-lg-6">
                                <label class="control-label" for="sid">Student ID:</label>
                                <input id="sid" class="form-control" placeholder="Student ID" type="text" name="sid">
                            </div>
                            <div class="col-lg-6">
                                <label class="control-label" for="cid">Class ID:</label>
                                <input id="cid" class="form-control" placeholder="Class ID" type="text" name="cid">
                            </div>
                        </div>
                    </div>
                    <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </body>

</html>
