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
                <form class="form-horizontal" action="NewVolunteerEmployeeAdded.php" method="POST" id="form2">

                    <h1>Add Volunteer/Employee Information:</h1>
                    <br />
                    <div class="row">

                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="control-label" for="first">First Name:</label>
                                <input id="first" class="form-control" placeholder="First Name" type="text" name="fname">
                            </div>
                            <div class="col-lg-4">
                                <label class="control-label" for="last">Last Name</label>
                                <input id="last" class="form-control" placeholder="Last Name" type="text" name="lname">
                            </div>
                            <div class="col-lg-4">
                                <label class="control-label" for="veid">Volunteer/Employee Id:</label>
                                <input id="veid" class="form-control" placeholder="Volunteer/Employee ID" type="text" name="id">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group">
                            <div class="col-lg-6">
                                <label class="control-label" for="cell">Cell Phone:</label>
                                <input id="cell" class="form-control" placeholder="Cell Phone" type="text" name="cellphone">
                            </div>
                            <div class="col-lg-6">
                                <label class="control-label" for="homephone">Home Phone:</label>
                                <input id="homephone" class="form-control" placeholder="Home Phone" type="text" name="homephone">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group">
                            <div class="col-lg-3">
                                <label class="control-label" for="address">Address:</label>
                                <input id="address" class="form-control" placeholder="Address" type="text" name="address">
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label" for="city">City:</label>
                                <input id="city" class="form-control" placeholder="City" type="text" name="city">
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label" for="state">State:</label>
                                <select id="state" class="form-control" name="state">
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">WYoming</option>
                                </select>
                            </div>

                            <div class="col-lg-3">
                                <label class="control-label" for="zip">Zip:</label>
                                <input id="zip" class="form-control" placeholder="Zip Code" type="text" name="zip">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="control-label" for="email">Email:</label>
                                <input id="email" class="form-control" placeholder="Email" type="text" name="email">
                            </div>
                            <div class="col-lg-4">
                                <label class="control-label" for="type">Type:</label>
                                    <select id="type" class="form-control" name="type">
                                        <option value="Volunteer">Volunteer</option>
                                        <option value="Employee">Employee</option>
                                    </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="control-label" for="program">Program:</label>
                                    <select id="program" class="form-control" name="program">
                                        <option value="G.E.M.S">G.E.M.S</option>
                                        <option value="Sons of Thunder">Sons of Thunder</option>
                                    </select>
                            </div>


                        </div>
                    </div>

                    <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Submit"><br><br>
                </form>
            </div>
        </div>
    </body>
</html>
