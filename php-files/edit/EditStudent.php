<?php
include("../scripts/header.php");

//Connect to database
include("../../db/config.php");

$query = "SELECT * FROM Student ORDER BY Last_Name, First_Name;";
$result = mysqli_query($db, $query);
?>

    <div class="row">

        <div class="form-group">
            <div class="col-lg-3">
                <label class="control-label" for="studentid">Select Student To Update:</label>

                <select id="studentid" class="form-control" name="id">
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

    <div id="showInfo"></div>

<script>
    $(document).ready(function () {
        $('#studentid').change(function () {
            var sid = $(this).val();
            $.ajax({
                url:"../scripts/AjaxUpdateStudent.php",
                method:"POST",
                data:{sid:sid},
                success:function (output) {
                    $('#showInfo').html(output);
                }
            });
        });
    });
</script>
