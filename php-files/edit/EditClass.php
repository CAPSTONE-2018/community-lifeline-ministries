<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$query = "SELECT * FROM Classes ORDER BY Id;";
$result = mysqli_query($db, $query);
?>
<div class="row">
    <div class="form-group">
        <div class="100%">
            <label class="control-label" for="classId">Select Class To Update:</label>

            <select id="classId" class="form-control" name="id">
                <option value="">Please Select a Class</option>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "<option value='" . $row['Id'] . "'>" . $row['Class_Name'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
</div>

<div id="showClassInfo"></div>

<?php
include("../scripts/footer.php");
?>

<script>
    $(document).ready(function () {
        $('#classId').change(function () {
            var classId = $(this).val();
            $.ajax({
                url: "../scripts/AjaxUpdateClass.php",
                method: "POST",
                data: {classId: classId},
                success: function (output) {
                    $('#showClassInfo').html(output);
                }
            });
        });
    });
</script>
