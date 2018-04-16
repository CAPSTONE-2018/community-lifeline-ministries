<?php

$successfulEntryToShow = $_POST['successfulEntryTitle'];
$submissionType = $_POST['submissionType'];
$viewAllRoute = $_POST['viewAllRoute'];
$viewAllButtonTitle = $_POST['viewAllButtonTitle'];
$newEntryRoute = $_POST['newEntryRoute'];
$newEntryButtonTitle = $_POST['newEntryButtonTitle'];

$duplicateEntryResponse = '
<div class="successful-entry-modal">'; ?>
    <div class="success-message">
        The following <?php echo $submissionType .', '. $successfulEntryToShow; ?> Was Entered Into The Database.
    </div>
    <script type="text/javascript">
        var footer = "<div class='form-group'>" +
            "<button type='button' onclick='routeToHomePage()' class='btn btn-secondary' data-dismiss='modal'>Home Page</button>" +
            "<button type='button' onclick='<?php echo $viewAllRoute; ?>'><?php echo $viewAllButtonTitle; ?></button>" +
            "<button type='button' onclick='<?php echo $newEntryRoute; ?>'><?php echo $newEntryButtonTitle; ?></button>" +
            "</div>";

        $('.modal-footer').html(footer);
    </script>
</div>
<?php echo $duplicateEntryResponse; ?>