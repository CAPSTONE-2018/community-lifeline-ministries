<?php

include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$query = "SELECT * FROM Students ORDER BY Last_Name, First_Name;";
$result = mysqli_query($db, $query);

$query2 = "SELECT * FROM Classes ORDER BY Class_Name";
$result2 = mysqli_query($db, $query2);
?>

<div id="form_wrapper">
    <form class="form-horizontal" action="../php-files/add/AddStudentToClass.php" method="POST" id="form2">

        <h1>Add Student and Class Information:</h1>
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
                    <label class="control-label" for="contactId">Class:</label>
                    <select id="contactId" class="form-control" name="classId">
                        <?php
                        if (mysqli_num_rows($result2) > 0) {
                            while ($row = mysqli_fetch_assoc($result2)) {
                                echo "<option value='" . $row['Id'] . "'>" . $row['Class_Name'] . "</option>";
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
