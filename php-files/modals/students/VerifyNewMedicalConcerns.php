<?php
session_start();
$medicalConcernName = $_POST['medicalConcernName'];
$medicalConcernTypeId = $_POST['medicalConcernType'];
$medicalConcernNote = $_POST['medicalConcernNote'];
?>
<div>
    Name of Medical Concern or Allergy: <?php echo $medicalConcernName; ?> <br/>
    Type of Concern:  <?php echo $medicalConcernTypeId; ?> <br/>
    Notes:  <?php echo $medicalConcernNote; ?> <br/>
</div>
