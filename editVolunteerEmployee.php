<?php

//connect to database
include("db/config.php");

$query = "SELECT * FROM Volunteer_Employee ORDER BY Last_Name, First_Name;";
$result = mysqli_query($db, $query);

include("scripts/header.php");
?>


    <div class="row">

        <div class="form-group">
            <div class="col-lg-4">
                <label class="control-label" for="vid">Select Volunteer/Employee To Update:</label>

                <select id="vid" class="form-control" name="id">
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

    <div id="showVolunteerEmployeeInfo"></div>

    <?php
      include("scripts/footer.php");
      ?>

<script>
    $(document).ready(function () {
        $('#vid').change(function () {
            var vid = $(this).val();
            $.ajax({
                url:"scripts/ajaxUpdateVolunteerEmployee.php",
                method:"POST",
                data:{vid:vid},
                success:function (output) {
                    $('#showVolunteerEmployeeInfo').html(output);
                }
            });
        });
    });
</script>
