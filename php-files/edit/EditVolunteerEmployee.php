<?php

//connect to database
include("../../db/config.php");

$query = "SELECT * FROM Volunteer_Employees ORDER BY Last_Name, First_Name;";
$result = mysqli_query($db, $query);

include("../scripts/header.php");
?>
<div class="row">

    <div class="form-group">
        <div class="100%">
            <label class="control-label" for="volunteerId">Select Volunteer/Employee To Update:</label>

            <select id="volunteerId" class="form-control" name="id">
                <option value="">Please Select a Volunteer/Employee</option>
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

<div id="showVolunteerInfo"></div>

<?php
include("../scripts/footer.php");
?>

<script>
    $(document).ready(function () {
        $('#volunteerId').change(function () {
            var volunteerId = $(this).val();
            $.ajax({
                url: "../scripts/AjaxUpdateVolunteerEmployee.php",
                method: "POST",
                data: {volunteerId: volunteerId},
                success: function (output) {
                    $('#showVolunteerInfo').html(output);
                }
            });
        });
    });
</script>

<script src="../../js/suppressEnter.js"></script>
