<?php

$duplicateEntryToShow = $_POST['duplicateEntryTitle'];
$submissionType = $_POST['submissionType'];

$duplicateEntryResponse = '
<div class="duplicate-entry-modal">'; ?>
    <div class="duplicate-message">
        The <?php echo $submissionType .', '. $duplicateEntryToShow; ?> Already Exists. <br/>
        Please Enter A New Program Or Go Back And Edit.
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>
<?php echo $duplicateEntryResponse; ?>