<?php
session_start();
if(!isset($_SESSION['loggedIn'])){
    header("Location: index.html");
}
$account = $_SESSION['account'];
    if($account != "administrator"){
        header("Location: index.html");
    }
    include("scripts/header.php");
?>

        <div id="form_wrapper">
            <form class="form-horizontal" action="addUser.php" method="POST" id="form2">

                <h1>Register Someone For Access:</h1>
                <br />
                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label class="control-label" for="uname">Username:</label>
                            <input id="uname" class="form-control" placeholder="Username" type="text" name="username">
                        </div>

                        <div class="col-lg-4">
                            <label class="control-label" for="pass">Password:</label>
                            <input id="pass" class="form-control" placeholder="Password" type="text" name="password">
                        </div>
                        <div class="col-lg-4">
                            <label class="control-label" for="atype">Account type:</label>
                                <select id="atype" class="form-control" name="account">
                                    <option value="administrator">Administrator</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="report_user">Report User</option>
                                </select>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label class="control-form" for="first">First Name:</label>
                            <input id="first" class="form-control" placeholder="First Name" type="text" name="fname">
                        </div>
                        <div class="col-lg-4">
                            <label class="control-label" for="last">Last Name:</label>
                            <input id="last" class="form-control" placeholder="Last Name" type="text" name="lname">
                        </div>
                        <div class="col-lg-4">
                            <label class="control-label" for="aemail">Email:</label>
                            <input id="aemail" class="form-control" placeholder="Email" type="text" name="email">
                        </div>

                    </div>
                </div>
                <div class="row">
                  <div class="form-group">

                      <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">

                </div>
              </div>
            </form>
            </div>

      <?php include("scripts/footer.php"); ?>
