
<?php
include("../../../db/config.php");
$volunteerIdToArchive = $_POST['volunteerId'];
$nameToDisplay = $_POST['volunteerName'];
?>
<div>
    <div class="duplicate-message text-center">
        Are you sure you want to archive the Employee,<br/>
        <?php echo $nameToDisplay; ?>
    </div>

    <script type="text/javascript">
        var yesButton = '<button type="button" class="btn btn-danger" onclick="archiveEmployee(<?php echo $volunteerIdToArchive; ?>)" data-dismiss="modal">Yes, Im Sure</button>';
        var noButton = '<button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>';

        $('#custom-modal').find('#modal-button-footer-row').append(yesButton, noButton);
    </script>

    <script type="text/javascript">
        function archiveEmployee(volunteerId) {
            $.ajax({
                url: "../archive/ArchiveVolunteerEmployee.php",
                method: "POST",
                data: {volunteerId: volunteerId},
                success: function (output) {
                    if (output == 0) {
                        window.location.href = "../show/ShowVolunteerEmployees.php"
                    } else {
                        alert("Whoops! There is an issue connecting to database");
                    }
                }
            });
        }
    </script>
</div>
