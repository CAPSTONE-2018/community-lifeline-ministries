<?php
include("../../db/config.php");
$dynamicRowId = 0;

$studentId = $_POST['studentIdToSearch'];

$queryForStudentAllergies = "SELECT Medical_Concerns.Name, Medical_Concern_Types.Type  
                              FROM (Medical_Concerns JOIN Student_To_Medical_Concerns ON Medical_Concerns.Id = Student_To_Medical_Concerns.Medical_Concern_Id)
                              JOIN Medical_Concern_Types ON Medical_Concern_Types.Id = Student_To_Medical_Concerns.Medical_Type_Id WHERE Student_Id = 1;";
$studentAllergies = mysqli_query($db, $queryForStudentAllergies);

?>

<link rel="stylesheet" href="../../css/modals/medical-concerns-modal.css"/>
<div class="container">
    <!-- Modal -->
    <div class="modal right fade" id="showMedicalConcernsModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-3">

                    </div>
                    <div class="col-6">
                        <h4 class="modal-title text-center" id="myModalLabel2"><i class="fa fa-address-card-o"></i>
                            Medical Concern Info</h4>
                    </div>
                    <div class="col-3 align-middle">
                        <div class="align-middle">
                            <button type="button" class="close modal-title" data-dismiss="modal" aria-label="Close">
                                <span class="align-middle " aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                    <?php

                    while ($medicalConcernsRow = mysqli_fetch_array($medicalConcernsResults, MYSQLI_ASSOC)) {
                        $dynamicRowId++;
                        $medicalConcernName = $medicalConcernsRow['Name'];
                        $medicalConcernType = $medicalConcernsRow['Type'];
                        ?>
                        <div class="row form-group">
                            <div class="col-2 text-center mt-auto mb-auto">
                                <i class="fa fa-bullhorn"></i>
                            </div>
                            <div class="col-10">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="contactName" class="mdl-textfield__input" readonly
                                           value="<?php echo $medicalConcernName; ?>"
                                           type="text"/>
                                    <label class="mdl-textfield__label" for="contactName">Name</label>
                                </div>
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-2 text-center mt-auto mb-auto">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="col-10">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="primaryPhone" class="mdl-textfield__input" readonly
                                           value="<?php echo $medicalConcernType; ?>"
                                           type="text"/>
                                    <label class="mdl-textfield__label" for="primaryPhone">Type</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>