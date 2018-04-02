<?php
$rowId = $_POST['dynamicFieldId'];
include("../../db/config.php");
$queryForMedicalConcerns = "SELECT Id, Type, Note FROM Medical_Concern_Types;";
$medicalConcernsResults = mysqli_query($db, $queryForMedicalConcerns);
?>
<div class="blue-line-color"></div>
<div class="form-group">
    <div class="col-sm-6">
        <div id="floatingConcernName<?php echo $rowId; ?>"
             class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input type="text"
                   id="medicalConcernName<?php echo $rowId; ?>"
                   class="mdl-textfield__input"
                   name="medicalConcernName<?php echo $rowId; ?>"
                   onfocus="addMedicalConcernNameFocus(<?php echo $rowId; ?>)"
                   onblur="removeMedicalConcernNameFocus(<?php echo $rowId; ?>)"/>
            <label class="mdl-textfield__label" for="medicalConcernName">Name</label>
        </div>
    </div>

    <div class="col-sm-6">
        <div id="floatingConcernType<?php echo $rowId; ?>"
             class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
            <input type="text"
                   class="mdl-textfield__input"
                   id="medicalConcernType<?php echo $rowId; ?>"
                   readonly
                   onfocus="addMedicalConcernTypeFocus(<?php echo $rowId; ?>)"
                   onblur="removeMedicalConcernTypeFocus(<?php echo $rowId; ?>)"/>
            <input type="hidden"
                   name="medicalConcernType<?php echo $rowId; ?>"/>
            <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
            <label for="medicalConcernType<?php echo $rowId; ?>" class="mdl-textfield__label">Type</label>
            <ul for="medicalConcernType" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                <?php
                while ($medicalConcernRow = mysqli_fetch_assoc($medicalConcernsResults)) {
                    echo "<li class='mdl-menu__item' data-val='".$medicalConcernRow['Id']."' value=".$medicalConcernRow['Id'].">" . $medicalConcernRow['Type'] . "</li>";
                }

                ?>
            </ul>
        </div>
    </div>
    <div class="col-sm-10">
        <div id="floatingConcernNote<?php echo $rowId; ?>"
             class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <textarea id="medicalConcernNote<?php echo $rowId; ?>"
                      class="mdl-textfield__input"
                      name="medicalConcernNote<?php echo $rowId; ?>"
                      type="text"
                      onfocus="addMedicalConcernNoteFocus(<?php echo $rowId; ?>)"
                      onblur="removeMedicalConcernNoteFocus(<?php echo $rowId; ?>)"></textarea>
            <label class="mdl-textfield__label" for="medicalConcernNote<?php echo $rowId; ?>">Note</label>
        </div>
    </div>
</div>

<script type="text/javascript" src="../../js/new-student-scripts/AjaxNewMedicalConcernStyles.js"></script>
<script type="text/javascript" src="../../js/MdlSelect.js"></script>