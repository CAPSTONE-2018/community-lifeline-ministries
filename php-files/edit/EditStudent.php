<?php
include("../scripts/header.php");

//Connect to database
include("../../db/config.php");

$query = "SELECT * FROM Students ORDER BY Last_Name, First_Name;";
$result = mysqli_query($db, $query);
?>

<div class="row">
    <div class="form-group">
        <div class="100%">
            <label class="control-label" for="studentId">Select Student To Update:</label>
            <select id="studentId" class="form-control" name="id">
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

<div id="showStudentInfo"></div>

<script>
    $(document).ready(function () {
        $('#studentId').change(function () {
            var studentId = $(this).val();
            $.ajax({
                url: "../scripts/AjaxUpdateStudent.php",
                method: "POST",
                data: {studentId: studentId},
                success: function (output) {
                    $('#showStudentInfo').html(output);
                }
            });
        });
    });
</script>
