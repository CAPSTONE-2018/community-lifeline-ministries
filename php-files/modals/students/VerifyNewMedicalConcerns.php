<?php
session_start();
$medicalConcernName = $_POST['medicalConcernName'];
$medicalConcernTypeName = $_POST['medicalConcernType'];
$medicalConcernNote = $_POST['medicalConcernNote'];
?>
<div>
    Name of Medical Concern or Allergy: <?php echo $medicalConcernName; ?> <br/>
    Type of Concern:  <?php echo $medicalConcernTypeName; ?> <br/>
    Notes:  <?php echo $medicalConcernNote; ?> <br/>
</div>
