<?php
$student = $_POST['student'];
$program = $_POST['program'];
$contact = $_POST['contact'];
$studentContact = $_POST['studentContact'];
$studentMessage = '';
if ($student == true) {
    $studentMessage = "New Student Was Added Successfully";
} else {
    $studentMessage = "Error!  There was a problem adding new student";
}

$confirmationResponse = '
<div class="confirmation-modal">'; ?>
    <div class="confirmation-message">
        <?php echo $studentMessage; ?>
    </div>
</div>
<?php echo $confirmationResponse; ?>