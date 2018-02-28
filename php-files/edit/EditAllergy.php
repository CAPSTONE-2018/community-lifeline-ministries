<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$query = "SELECT * FROM Allergies ORDER BY Name;";
$result = mysqli_query($db, $query);
?>
<div class="row">
    <div class="form-group">
        <div class="col-lg-4">
            <label class="control-label" for="classId">Select Allergy To Update:</label>

            <select id="allergyId" class="form-control" name="id">
                <option value="">Please Select an Allergy</option>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "<option value='" . $row['Id'] . "'>" . $row['Type'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
</div>

<div id="showAllergyInfo"></div>

<?php
include("../scripts/footer.php");
?>

<script>
    $(document).ready(function () {
        $('#allergyId').change(function () {
            var allergyId = $(this).val();
            $.ajax({
                url:"../scripts/AjaxUpdateAllergies.php",
                method:"POST",
                data:{allergyId:allergyId},
                success:function (output) {
                    $('#showAllergyInfo').html(output);
                }
            });
        });
    });
</script>
