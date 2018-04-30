<?php
$dynamicMedicalConcernId = $_POST['dynamicMedicalConcernId'];
include("../../db/config.php");
$queryForMedicalConcerns = "SELECT Id, Type_Name, Note FROM Medical_Concern_Types;";
$medicalConcernsResults = mysqli_query($db, $queryForMedicalConcerns);
?>
<div id="dynamic-medical-concern<?php echo $dynamicMedicalConcernId; ?>">
    <div class="blue-line-color"></div>
    <div class="form-group">
        <div class="col-sm-6">
            <div id="floatingConcernName<?php echo $dynamicMedicalConcernId; ?>"
                 class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input type="text"
                       id="medicalConcernName<?php echo $dynamicMedicalConcernId; ?>"
                       class="mdl-textfield__input"
                       name="medicalConcernName<?php echo $dynamicMedicalConcernId; ?>"/>
                <label class="mdl-textfield__label" for="medicalConcernName">Name</label>
            </div>
        </div>

        <div class="col-sm-6">
            <div id="floatingConcernType<?php echo $dynamicMedicalConcernId; ?>"
                 class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                <input type="text"
                       class="mdl-textfield__input"
                       id="medicalConcernType<?php echo $dynamicMedicalConcernId; ?>"
                       readonly/>
                <input type="hidden"
                       name="medicalConcernType<?php echo $dynamicMedicalConcernId; ?>"/>
                <i class="mdl-icon-toggle__label fa fa-caret-down"></i>
                <label for="medicalConcernType<?php echo $dynamicMedicalConcernId; ?>"
                       class="mdl-textfield__label">Type</label>
                <ul for="medicalConcernType" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                    <?php
                    while ($medicalConcernRow = mysqli_fetch_assoc($medicalConcernsResults)) {
                        echo "<li class='mdl-menu__item' data-val='" . $medicalConcernRow['Id'] . "' value=" . $medicalConcernRow['Id'] . ">" . $medicalConcernRow['Type_Name'] . "</li>";
                    }

                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10">
            <div id="floatingConcernNote<?php echo $dynamicMedicalConcernId; ?>"
                 class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <textarea id="medicalConcernNote<?php echo $dynamicMedicalConcernId; ?>"
                      class="mdl-textfield__input"
                      name="medicalConcernNote<?php echo $dynamicMedicalConcernId; ?>"
                      type="text"
            ></textarea>
                <label class="mdl-textfield__label"
                       for="medicalConcernNote<?php echo $dynamicMedicalConcernId; ?>">Note</label>
            </div>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-danger remove-medical-concern" type="button"
                    id="<?php echo $dynamicMedicalConcernId; ?>">x Remove
            </button>
        </div>
    </div>
</div>

