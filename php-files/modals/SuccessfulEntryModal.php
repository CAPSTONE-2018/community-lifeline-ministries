<?php

$successfulEntryToShow = $_POST['successfulEntryTitle'];
$submissionType = $_POST['submissionType'];

$duplicateEntryResponse = '
<div class="successful-entry-modal">'; ?>
    <div class="success-message">
        The following <?php echo $submissionType .', '. $successfulEntryToShow; ?> Was Entered Into The Database.
    </div>
    <div class="modal-footer">
<!--        add some send to hot buttons-->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>
<?php echo $duplicateEntryResponse; ?>