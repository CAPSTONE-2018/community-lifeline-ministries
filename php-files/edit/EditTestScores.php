<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$query = "SELECT Student_Test_Scores.*, 
            Students.First_Name,
            Students.Last_Name
            FROM Student_Test_Scores 
            JOIN Students ON Students.Id = Student_Test_Scores.Student_Id;";
$result = mysqli_query($db, $query);

?>
<div class="row">
    <div class="form-group">
        <div class="100%">
            <label class="control-label" for="testScoreId">Select Student To Update Scores:</label>
            <select id="testScoreId" class="form-control" name="id">
                <option value="">Please Select a Student</option>
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
</div>

<div id="showTestScoreInfo"></div>

<?php
include("../scripts/footer.php");
?>
<script>
    $(document).ready(function () {
        $('#testScoreId').change(function () {
            var testScoreId = $(this).val();
            $.ajax({
                url: "../scripts/AjaxUpdateTestScores.php",
                method: "POST",
                data: {testScoreId: testScoreId},
                success: function (output) {
                    $('#showTestScoreInfo').html(output);
                }
            });
        });
    });
</script>
