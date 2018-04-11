<?php

$duplicateEntryToShow = $_POST['duplicateEntryTitle'];

$duplicateEntryResponse = '
<div class="duplicate-entry-modal">'; ?>
    <div class="duplicate-message">
        The Entry <?php echo $duplicateEntryToShow; ?> Already Exists. <br/>
        Please Enter A New Program Or Go Back And Edit.
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </div>
</div>
<?php echo $duplicateEntryResponse; ?>