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
                <form class="form-horizontal" action="NewTestScoresAdded.php" method="POST" id="form2">

                    <h1>Add Student Test Scores:</h1>
                    <br />

                    <div class="row">

                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="control-label" for="sid">Student ID Number:</label>
                                <input id="sid" class="form-control" placeholder="Student ID" type="text" name="id">
                            </div>
                            <div class="col-lg-4">
                                <label class="control-label" for="term">Term:</label>
                                <select id="term" class="form-control" name="term">
                                    <option value="Spring">Spring</option>
                                    <option value="Summer">Summer</option>
                                    <option value="Fall">Fall</option>
                                    <option value="Winter">Winter</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="control-label" for="year">Year:</label>
                                <input id="year" class="form-control" placeholder="Year" type="text" name="year">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group">
                            <div class="col-lg-6">
                                <label class="control-label" for="pre">Pre-Test Score:</label>
                                <input id="pre" class="form-control" placeholder="Pre-Test Score" type="text" name="pre_test">
                            </div>
                            <div class="col-lg-6">
                                <label class="control-label" for="post">Post-Test Score:</label>
                                <input id="post" class="form-control" placeholder="Post_Test Score" type="text" name="post_test">
                            </div>
                        </div>
                    </div>


                    <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Submit"><br><br>
                </form>
            </div>
        </div>
    </body>

</html>
