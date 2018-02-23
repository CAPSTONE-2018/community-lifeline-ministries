<?php

include("scripts/header.php");

//connect to database
include("db/config.php");

$query = "SELECT * FROM Student ORDER BY Last_Name, First_Name;";
$result = mysqli_query($db, $query);
?>



        <div id="form_wrapper">

            <form class="form-horizontal" action="addContact.php" method="POST" id="form2">


                <h1>Add Contact Information:</h1>
                <br />
                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="prefix">Prefix:</label>
                        <select id="gend" class="form-control" name="prefix">
                            <option value="Mr.">Mr.</option>
                            <option value="Ms ">Ms</option>
                            <option value="Mrs.">Mrs.</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label" for="suffix">Suffix:</label>
                        <input id="suffix" class="form-control" placeholder="Suffix" type="text" name="suffix">
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label" for="studentid">Student ID Number For:</label>

                        <select id="studentid" class="form-control" name="id">
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {

                                    echo "<option value='" . $row['Id'] . "'>" . $row['First_Name'] . " " . $row['Last_Name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">

                    <div class="form-group">
                        <div class="col-lg-4">
                            <label class="control-label" for="firstname">First Name:</label>
                            <input id="firstname" class="form-control" placeholder="First Name" type="text" name="fname">
                        </div>
                        <div class="col-lg-4">
                            <label class="control-label" for="lastname">Last Name:</label>
                            <input id="lastname" class="form-control" placeholder="Last Name" type="text" name="lname">
                        </div>
                        <div class="col-lg-4">
                            <label class="control-label" for="middlename">Middle Name:</label>
                            <input id="middlename" class="form-control" placeholder="Middle Name" type="text" name="mname">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label class="control-label" for="cellnum">Cell Number:</label>
                            <input id="cellnum" class="form-control" placeholder="Cell Number" type="text" name="cellphone">
                        </div>

                        <div class="col-lg-6">
                            <label class="control-label" for="homenum">Home Number:</label>
                            <input id="homenum" class="form-control" placeholder="Home Number" type="text" name="homephone">
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
                            <?php
                            include("scripts/states.php");
                            echo stateDropdown()
                            ?>
                        </div>

                        <div class="col-lg-3">
                            <label class="control-label" for="zip">Zip Code:</label>
                            <input id="zip" class="form-control" placeholder="Zip Code" type="text" name="zip">
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="form-group">
                        <div class="col-lg-6">
                            <label class="control-label" for="email">Email:</label>
                            <input id="email" class="form-control" placeholder="Email" type="text" name="email">
                        </div>
                        <div class="col-lg-6">
                            <label class="control-label" for="relationship">Relationship:</label>
                            <input id="relationship" class="form-control" placeholder="Relationship" type="text" name="relationship">
                        </div>
                    </div>
                </div>




                <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Submit"><br><br>
            </form>
        </div>
    <?php include("scripts/footer.php")?>
