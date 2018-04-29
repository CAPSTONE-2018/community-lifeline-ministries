<?php
include("../../../db/config.php");
$studentIdToArchive = $_POST['studentIdToArchive'];
$studentName = $_POST['studentName'];
?>
<div>
    <div class="duplicate-message text-center">
        Are you sure you want to archive the Student,<br/>
        <?php echo $studentName; ?>
    </div>

    <script type="text/javascript">
        var yesButton = '<button type="button" class="btn btn-danger" onclick="archiveStudent(<?php echo $studentIdToArchive; ?>)" data-dismiss="modal">Yes, Im Sure</button>';
        var noButton = '<button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>';

        $('#custom-modal').find('#modal-button-footer-row').append(yesButton, noButton);
    </script>

    <script type="text/javascript">
        function archiveStudent(studentId) {
            $.ajax({
                url: "../archive/ArchiveStudent.php",
                method: "POST",
                data: {studentId: studentId},
                success: function (output) {
                    if (output == 0) {
                        window.location.href = "../show/ShowStudents.php"
                    } else {
                        alert("Whoops! There is an issue connecting to database");
                    }
                }
            });
        }
    </script>
</div>
