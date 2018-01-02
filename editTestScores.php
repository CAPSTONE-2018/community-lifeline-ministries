<?php
include("scripts/header.php");

//connect to database
include("db/config.php");

$query = "SELECT * FROM Student ORDER BY Last_Name, First_Name;";
$result = mysqli_query($db, $query);
?>



    <div class="row">

        <div class="form-group">
            <div class="col-lg-3">
                <label class="control-label" for="sid">Select Student To Update Scores:</label>

                <select id="sid" class="form-control" name="id">
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

    <div id="showScoreInfo"></div>

    <?php
      include("scripts/footer.php");
      ?>
<script>
    $(document).ready(function () {
        $('#sid').change(function () {
            var scoreid = $(this).val();
            $.ajax({
                url:"scripts/ajaxUpdateTestScores.php",
                method:"POST",
                data:{scoreid:scoreid},
                success:function (output) {
                    $('#showScoreInfo').html(output);
                }
            });
        });
    });
</script>
