<?php
include("../../../db/config.php");
$studentIdToArchive = $_POST['studentIdToArchive'];
$tableToLookUp = $_POST['tableToLookUp'];
$nameToDisplay = $_POST['nameToDisplay'];
$userType = substr(trim($tableToLookUp), 0, -1);


$archiveUserResponse = '
<div class="delete-user-modal">'; ?>
    <div class="duplicate-message">
        Are you sure you want to archive the <?php echo $userType; ?>,<br/>
        <?php echo $nameToDisplay; ?>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="archiveUser(<?php echo $studentIdToArchive; ?>)">Yes, Im Sure</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
    </div>
    </div>
<?php echo $archiveUserResponse; ?>

<script type="text/javascript">
    function archiveUser(studentId) {
        $.ajax({
            url: "../archive/ArchiveStudent.php",
            method: "POST",
            data: {studentId: studentId},
            success: function (output) {
                if (output == 0) {
                    window.location.href = "../../show/ShowStudents.php"
                } else {
                    alert("Whoops! There is an issue connecting to database");
                }
            }
        });
    }
</script>
