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

                <form class="form-horizontal" action="NewStudentAdded.php" method="POST" id="form2">

                    <h1>Add Student Information:</h1>
                    <br />

                    <div class="row">

                        <div class="form-group">
                            <div class="col-lg-6">
                                <label class="control-label" for="firstname">First Name:</label>
                                <input id="firstname" class="form-control" placeholder="First" type="text" name="fname">
                            </div>
                            <div class="col-lg-6">
                                <label class="control-label" for="lastname">Last Name:</label>
                                <input id="lastname" class="form-control" placeholder="Last" type="text" name="lname">
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="control-label" for="dob">Date of Birth:</label>
                                <input id="dob" class="form-control" placeholder="YYYY/MM/DD" type="text" name="dob">
                            </div>
                            <div class="col-lg-4">
                                <label class="control-label" for="ethnic">Ethnicity:</label>
                                <input id="ethnic" class="form-control" placeholder="Ethnicity" type="text" name="ethnicity">
                            </div>
                            <div class="col-lg-4">
                                <label class="control-label" for="gend">Gender:</label>
                                    <select id="gend" class="form-control" name="gender">
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group">
                            <div class="col-lg-3">
                                <label class="control-label" for="saddress">Address:</label>
                                <input id="saddress" class="form-control" placeholder="Address" type="text" name="address">
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label" for="scity">City:</label>
                                <input id="scity" class="form-control" placeholder="City" type="text" name="city">
                            </div>
                            <div class="col-lg-3">
                                <!--<label class="control-label" for="sstate">State:</label>
                                <input id="sstate" class="form-control" placeholder="State" type="text" name="state">-->
                                <label class="control-label" for="sstate">State:</label>
                                <select id="sstate" class="form-control" name="state">
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
                                <label class="control-label" for="szip">Zip Code:</label>
                                <input id="szip" class="form-control" placeholder="Zip Code" type="text" name="zip">
                            </div>
                        </div>


                    </div>

                    <div class="row">

                        <div class="form-group">

                            <div class="col-lg-8">
                                <label class="control-label" for="sschool">School:</label>
                                <input id="sschool" class="form-control" placeholder="School" type="text" name="school">
                            </div>

                            <div class="col-lg-4">
                                <label class="control-label" for="sprogramname">Program Name:</label>
                                <select id="sprogramname" class="form-control" name="program">
                                    <option value="G.E.M.S">G.E.M.S</option>
                                    <option value="Sons of Thunder">Sons of Thunder</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group">

                            <div class="col-lg-3">
                                <label class="control-label" for="spermission">Permission Slip on File:</label>
                                <select id="spermission" class="form-control" name="permission_slip">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="col-lg-3">
                                <label class="control-label" for="sbirthcert">Birth Certificate on File:</label>
                                <select id="sbirthcert" class="form-control" name="birth_certificate">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>


                            <div class="col-lg-3">
                                <label class="control-label" for="sreducedlunch">Reduced Lunch Eligible:</label>
                                <select id="sreducedlunch" class="form-control" name="reduced_lunch_eligible">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="col-lg-3">
                                <label class="control-label" for="siep">Immediate Emotional Problem:</label>
                                <select id="siep" class="form-control" name="iep">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                        </div>

                    </div>

                    <br />

                    <h1>Allergies:</h1>
                    <br />

                    <div class="row">

                        <div class="form-group">

                            <div class="col-lg-3">
                                <label class="control-label" for="satype">Type:</label>
                                <input id="satype" class="form-control" placeholder="Allergy Type" type="text" name="atype">
                            </div>
                            <div class="col-lg-9">
                                <label class="control-label" for="sanote">Note:</label>
                                <input id="sanote" class="form-control" placeholder="Allergy Note" type="text" name="anote">
                            </div>

                        </div>
                    </div>

                    <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Submit"><br><br>

                </form>

            </div>

        </div>

    </body>

</html>
