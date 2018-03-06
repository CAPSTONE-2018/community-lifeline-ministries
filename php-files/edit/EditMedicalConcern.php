<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$query = "SELECT * FROM Medical_Concerns ORDER BY Name;";
$result = mysqli_query($db, $query);
?>
<div class="row">
    <div class="form-group">
        <div class="col-lg-4">
            <label class="control-label" for="classId">Select Allergy To Update:</label>

            <select id="medicalConcernId" class="form-control" name="id">
                <option value="">Please Select Medical Concern</option>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "<option value='" . $row['Id'] . "'>" . $row['Name'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
</div>

<div id="showMedicalConcernInfo"></div>

<?php
include("../scripts/footer.php");
?>

<script>
    $(document).ready(function () {
        $('#medicalConcernId').change(function () {
            var medicalConcernId = $(this).val();
            $.ajax({
                url:"../scripts/AjaxUpdateAllergies.php",
                method:"POST",
                data:{medicalConcernId:medicalConcernId},
                success:function (output) {
                    $('#showMedicalConcernInfo').html(output);
                }
            });
        });
    });
</script>
