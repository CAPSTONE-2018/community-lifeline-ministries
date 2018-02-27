<?php

//connect to database
include("../../db/config.php");

$query = "SELECT * FROM Contacts ORDER BY Last_Name, First_Name;";
$result = mysqli_query($db, $query);

include("../scripts/header.php");
?>

<div class="row">
    <div class="form-group">
        <div class="col-lg-10">
            <label class="control-label" for="contactId">Select Contact To Update:</label>
            <select id="contactId" class="form-control" name="id">
                <option value="">Please Select a Contact</option>
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

<div id="showContactInfo"></div>

<?php
include("../scripts/footer.php");
?>

<script>
    $(document).ready(function () {
        $('#contactId').change(function () {
            var contactId = $(this).val();
            $.ajax({
                url: "../scripts/AjaxUpdateContact.php",
                method: "POST",
                data: {contactId: contactId},
                success: function (output) {
                    $('#showContactInfo').html(output);
                }
            });
        });
    });
</script>
