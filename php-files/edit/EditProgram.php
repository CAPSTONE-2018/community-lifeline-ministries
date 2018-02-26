<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$query = "SELECT * FROM Programs ORDER BY Id;";
$result = mysqli_query($db, $query);
?>



<div class="row">

    <div class="form-group">
        <div class="col-lg-4">
            <label class="control-label" for="programid">Select Program To Update:</label>

            <select id="programid" class="form-control" name="id">
                <option value="">Please Select a Program</option>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "<option value='" . $row['Id'] . "'>" . $row['Program_Name'] . "</option>";
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
        $('#programid').change(function () {
            var programid = $(this).val();
            $.ajax({
                url:"../scripts/AjaxUpdateProgram.php",
                method:"POST",
                data:{programid:programid},
                success:function (output) {
                    $('#showClassInfo').html(output);
                }
            });
        });
    });
</script>