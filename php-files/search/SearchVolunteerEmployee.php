<?php
  include("../scripts/header.php");

  //connect to database
  include("../../db/config.php");

$query = "SELECT * FROM Volunteer_Employees ORDER BY Last_Name, First_Name;";
$result = mysqli_query($db, $query);



?>

            <div id="form_wrapper">
                <form action="../find/FindVolunteerEmployee.php" method="POST" id="form2">
                    <br>
                    <h1>Search Volunteer/Employee Information:</h1>
                    <br />

                    <div class="col-lg-12">
                        <label class="control-label" for="volunteerid">Employee/Volunteer:</label>
                        <select id="volunteerid" class="form-control" name="ID">
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['Id'] . "'>" . $row['First_Name'] . " " . $row['Last_Name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <br />
                        <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        <?php include("../scripts/footer.php"); ?>
