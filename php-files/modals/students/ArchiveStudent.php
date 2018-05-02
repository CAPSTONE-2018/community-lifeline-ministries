<?php
include("../../../db/config.php");
$studentIdToArchive = $_POST['studentIdToArchive'];
$studentName = $_POST['studentName'];
?>

<div class="text-center">
    Are you sure you want to archive the Student,<br/>
    <?php echo $studentName; ?>
</div>

<script type="text/javascript">
    var yesButton = '<button type="button" class="btn btn-danger" onclick="archiveStudent(<?php echo $studentIdToArchive; ?>)" data-dismiss="modal">Yes, Im Sure</button>';
    var noButton = '<button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>';

    $('#customModal').find('#customFooterActions').append(yesButton, noButton);

    function archiveStudent(studentId) {
        $.ajax({
            url: "../mysql-statements/archive/ArchiveStudent.php",
            method: "POST",
            data: {studentId: studentId},
            success: function (output) {
                if (output == 0) {
                    launchSuccessfulArchive();
                    window.location.href = "../show/ShowStudents.php"
                } else {
                    alert("Whoops! There is an issue connecting to database");
                }
            }
        });
    }
</script>

