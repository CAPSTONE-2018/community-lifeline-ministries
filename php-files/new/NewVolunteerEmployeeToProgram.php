<?php

include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
//connect to database
include("../../db/config.php");

$query = "SELECT * FROM Volunteer_Employees ORDER BY Last_Name, First_Name;";
$result = mysqli_query($db, $query);

$query2 = "SELECT * FROM  Programs ORDER BY Program_Name;";
$result2 = mysqli_query($db, $query2);
?>

<div id="form_wrapper">
    <form action="../mysql-statements/add/AddVolunteerEmployeeToProgram.php" method="POST" id="form2">

        <h1>Add Volunteer and Program Information:</h1>
        <br/>
        <div class="row">

            <div class="form-group">
                <div class="col-lg-6">
                    <label class="control-label" for="volunteerId">Volunteer:</label>
                    <select id="volunteerId" class="form-control" name="volunteerId">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['Id'] . "'>" . $row['First_Name'] . " " . $row['Last_Name'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label class="control-label" for="programId">Program:</label>
                    <!--<input id="cid" class="form-control" placeholder="Class ID" type="text" name="cid">-->
                    <select id="programId" class="form-control" name="programId">
                        <?php
                        if (mysqli_num_rows($result2) > 0) {
                            while ($row = mysqli_fetch_assoc($result2)) {
                                //echo "<option value='".$row['Id']."'>'".$row['First_Name']."'</option>";
                                echo "<option value='" . $row['Id'] . "'>" . $row['Program_Name'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
    </form>
</div>
<?php include("../scripts/footer.php"); ?>
