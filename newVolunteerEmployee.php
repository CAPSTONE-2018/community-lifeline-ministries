<?php
include("scripts/header.php");
?>

            <div id="form_wrapper">
                <form class="form-horizontal" action="addVolunteerEmployee.php" method="POST" id="form2">

                    <h1>Add Volunteer/Employee Information:</h1>
                    <br />
                    <div class="row">

                        <div class="form-group">
                            <div class="col-lg-6">
                                <label class="control-label" for="first">First Name:</label>
                                <input id="first" class="form-control" placeholder="First Name" type="text" name="fname">
                            </div>
                            <div class="col-lg-6">
                                <label class="control-label" for="last">Last Name</label>
                                <input id="last" class="form-control" placeholder="Last Name" type="text" name="lname">
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
                                <?php
                                include("scripts/states.php");
                                echo stateDropdown()
                                ?>
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
                                        <option value="Both">Both</option>
                                    </select>
                            </div>


                        </div>
                    </div>

                    <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Submit"><br><br>
                </form>
            </div>
    <?php include("scripts/footer.php"); ?> 
