<?php
include("../../../db/config.php");
$medicalConcernId = $_POST['medicalConcernId'];
$queryForMedicalConcerns = "SELECT * FROM Medical_Concerns WHERE Id = '$medicalConcernId'";
$medicalConcernsResults = mysqli_query($db, $queryForMedicalConcerns);
$dynamicRowId = 0;
while ($medicalConcernRow = mysqli_fetch_assoc($medicalConcernsResults)) {
    $dynamicRowId++;
    $medicalConcernName = $medicalConcernRow['Name'];
    $medicalConcernType = $medicalConcernRow['Type'];
    $medicalConcernNote = $medicalConcernRow['Note'];

    ?>
    <div class="card text-center">
        <div class="card-body">
            <form action="#" method="POST" id="newMedicalConcernForm">
                <h4 class="heading text-left"><i class="fa fa-bullhorn"></i> General Info</h4>
                <div class="blue-line-color"></div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="medicalConcernName" class="mdl-textfield__input"
                                   value="<?php echo $medicalConcernName; ?>" name="name" type="text"/>
                            <label class="mdl-textfield__label" for="medicalConcernName">Name</label>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="medicalConcernType" class="mdl-textfield__input"
                                   value="<?php echo $medicalConcernType; ?>" name="type" type="text"/>
                            <label class="mdl-textfield__label" for="medicalConcernType">Type</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <textarea id="medicalConcernNote" class="mdl-textfield__input" name="note" type="text">
                                <?php echo $medicalConcernNote; ?>
                            </textarea>
                            <label class="mdl-textfield__label" for="medicalConcernNote">Notes</label>
                        </div>
                    </div>
                </div>

                <div class="row col-sm-12">
                    <input id="submitButton" class="btn large-action-buttons edit-button"
                           form="newMedicalConcernForm" type="submit" value="Enter"><br><br>
                </div>
            </form>
        </div>
    </div>

<?php } ?>