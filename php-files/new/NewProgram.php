<?php

include("../scripts/header.php");

//connect to database
include("../../db/config.php");


$query = "SELECT * FROM Volunteer_Employees ORDER BY Last_Name, First_Name;";
$result = mysqli_query($db, $query);
?>

<div class="container">
    <div id="form_wrapper">
        <form class="form-horizontal" action="../add/AddProgram.php" method="POST" id="form2">
            <h1>Add Program Information:</h1>
            <br/>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <label class="control-label" for="name">Program Name:</label>
                        <input id="name" class="form-control" placeholder="Program Name" type="text" name="name">
                    </div>

                    <div class="col-lg-6">

                        <label class="control-label" for="activeFlag">Active Contact?</label>
                        <select id="activeFlag" class="form-control" name="activeFlag">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>

                    </div>
                </div>
            </div>

            <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Submit"><br><br>
        </form>
    </div>
</div>

<?php include("../scripts/footer.php"); ?>
