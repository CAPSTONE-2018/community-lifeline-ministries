<?php
include("../scripts/header.php");
?>

<div id="form_wrapper">
    <form class="form-horizontal" action="../add/AddVolunteerEmployee.php" method="POST" id="form2">

        <h1>Add Volunteer/Employee Information:</h1>
        <br/>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <label class="control-label" for="firstName">First Name:</label>
                    <input id="firstName" class="form-control" placeholder="First Name" type="text" name="firstName" />
                </div>
                <div class="col-lg-6">
                    <label class="control-label" for="lastName">Last Name</label>
                    <input id="lastName" class="form-control" placeholder="Last Name" type="text" name="lastName" />
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <label class="control-label" for="middleName">Middle Name:</label>
                <input id="middleName" class="form-control" placeholder="Middle Name" type="text" name="middleName" />
            </div>
            <div class="col-lg-4">
                <label class="control-label" for="prefix">Prefix:</label>
                <select id="prefix" class="form-control" name="prefix">
                    <option value="Mr.">Mr.</option>
                    <option value="Ms ">Ms.</option>
                    <option value="Mrs.">Mrs.</option>
                </select>
            </div>
            <div class="col-lg-4">
                <label class="control-label" for="suffix">Suffix:</label>
                <input id="suffix" class="form-control" placeholder="Suffix" type="text" name="suffix" />
            </div>
            <div class="row">

                <div class="form-group">
                    <div class="col-lg-6">
                        <label class="control-label" for="cellPhone">Cell Phone:</label>
                        <input id="cellPhone" class="form-control" placeholder="Cell Phone" type="text" name="cellPhone" />
                    </div>
                    <div class="col-lg-6">
                        <label class="control-label" for="homePhone">Home Phone:</label>
                        <input id="homePhone" class="form-control" placeholder="Home Phone" type="text" name="homePhone" />
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="form-group">
                    <div class="col-lg-3">
                        <label class="control-label" for="address">Address:</label>
                        <input id="address" class="form-control" placeholder="Address" type="text" name="address" />
                    </div>
                    <div class="col-lg-3">
                        <label class="control-label" for="city">City:</label>
                        <input id="city" class="form-control" placeholder="City" type="text" name="city" />
                    </div>
                    <div class="col-lg-3">
                        <label class="control-label" for="state">State:</label>
                        <?php
                        include("../scripts/States.php");
                        echo stateDropdown()
                        ?>
                    </div>

                    <div class="col-lg-3">
                        <label class="control-label" for="zip">Zip:</label>
                        <input id="zip" class="form-control" placeholder="Zip Code" type="text" name="zip" />
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="form-group">
                    <div class="col-lg-4">
                        <label class="control-label" for="email">Email:</label>
                        <input id="email" class="form-control" placeholder="Email" type="text" name="email" />
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
                        <select id="program" class="form-control" name="programId">
                            <option value="G.E.M.S">G.E.M.S</option>
                            <option value="Sons of Thunder">Sons of Thunder</option>
                            <option value="Both">Both</option>
                        </select>
                    </div>
                </div>
            </div>
            <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Submit" /><br><br>
    </form>
</div>
<?php include("../scripts/footer.php"); ?>
