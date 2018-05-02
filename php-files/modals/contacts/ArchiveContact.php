<?php
include("../../../db/config.php");
$contactIdToArchive = $_POST['contactId'];
$nameToDisplay = $_POST['contactName'];
?>
<div>
    <div class="duplicate-message text-center">
        Are you sure you want to archive the Contact,<br/>
        <?php echo $nameToDisplay; ?>
    </div>

    <script type="text/javascript">
        var yesButton = '<button type="button" class="btn btn-danger" onclick="archiveContact(<?php echo $contactIdToArchive; ?>)" data-dismiss="modal">Yes, Im Sure</button>';
        var noButton = '<button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>';

        $('#customModal').find('#customFooterActions').append(yesButton, noButton);
    </script>

    <script type="text/javascript">
        function archiveContact(contactId) {
            $.ajax({
                url: "../mysql-statements/archive/ArchiveContact.php",
                method: "POST",
                data: {contactId: contactId},
                success: function (output) {
                    if (output == 0) {
                        launchSuccessfulArchive();
                        window.location.href = "../show/ShowContacts.php"
                    } else {
                        alert("Whoops! There is an issue connecting to database");
                    }
                }
            });
        }
    </script>
</div>
