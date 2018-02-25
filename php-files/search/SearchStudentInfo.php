<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$query = "SELECT * FROM Students ORDER BY Last_Name, First_Name;";
$result = mysqli_query($db, $query);


?>

<div id="form_wrapper">
    <form action="../find/FindStudentInfo.php" method="POST" id="form2">

        <h1>Search Student/Contact/Emergency Contact Information:</h1>
        <br/>

        <div class="col-lg-12">
            <label class="control-label" for="studentid">Student:</label>
            <select id="studentid" class="form-control" name="child_id">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['Id'] . "'>" . $row['First_Name'] . " " . $row['Last_Name'] . "</option>";
                    }
                }
                ?>
            </select>
            <br/>
            <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
        </div>

    </form>
</div>
<?php include("../scripts/footer.php"); ?>
