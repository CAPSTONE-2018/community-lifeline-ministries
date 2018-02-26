<?php

include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$query = "SELECT * FROM Students ORDER BY Last_Name, First_Name;";
$result = mysqli_query($db, $query);

$query2 = "SELECT * FROM Programs ORDER BY Program_Name";
$result2 = mysqli_query($db, $query2);
?>

<div id="form_wrapper">
    <form class="form-horizontal" action="../add/AddStudentToProgram.php" method="POST" id="form2">

        <h1>Add Student and Program Information:</h1>
        <br/>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <label class="control-label" for="studentId">Student Name:</label>
                    <select id="studentId" class="form-control" name="studentId">
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
                    <select id="programId" class="form-control" name="programId">
                        <?php
                        if (mysqli_num_rows($result2) > 0) {
                            while ($row = mysqli_fetch_assoc($result2)) {
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
