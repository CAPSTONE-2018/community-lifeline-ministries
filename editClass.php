<?php
include("scripts/header.php");

//connect to database
include("db/config.php");

$query = "SELECT * FROM Class ORDER BY Class_Name;";
$result = mysqli_query($db, $query);
?>



    <div class="row">

        <div class="form-group">
            <div class="col-lg-4">
                <label class="control-label" for="classid">Select Class To Update:</label>

                <select id="classid" class="form-control" name="id">
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
      include("scripts/footer.php");
      ?>

<script>
    $(document).ready(function () {
        $('#classid').change(function () {
            var classid = $(this).val();
            $.ajax({
                url:"scripts/ajaxUpdateClass.php",
                method:"POST",
                data:{classid:classid},
                success:function (output) {
                    $('#showClassInfo').html(output);
                }
            });
        });
    });
</script>
