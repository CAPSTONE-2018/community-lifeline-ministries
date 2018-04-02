<?php
$rowId = $_POST['dynamicFieldId'];

?>
<div class="blue-line-color"></div>
<div class="form-group">
    <div class="col-sm-6">
        <div id="floatingConcernName<?php echo $rowId; ?>" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input
                    id="medicalConcernName<?php echo $rowId; ?>"
                    class="mdl-textfield__input"
                    name="medicalConcernName<?php echo $rowId; ?>"
                    type="text"
                    onfocus="addMedicalConcernNameFocus(<?php echo $rowId; ?>)"
                    onblur="removeMedicalConcernNameFocus()"/>
            <label class="mdl-textfield__label" for="medicalConcernName">Name</label>
        </div>
    </div>

    <div class="col-sm-6">
        <div id="floatingConcernType<?php echo $rowId; ?>" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
            <input type="text" value="" class="mdl-textfield__input" id="medicalConcernType<?php echo $rowId; ?>" readonly onfocus="addMedicalConcernTypeFocus()" onblur="removeMedicalConcernTypeFocus()"/>
            <input type="hidden" value="" name="medicalConcernType<?php echo $rowId; ?>">
            <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
            <label for="medicalConcernType<?php echo $rowId; ?>" class="mdl-textfield__label">Type</label>
            <ul for="medicalConcernType" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                <?php
                while ($medicalConcernTypeRow = mysqli_fetch_assoc($medicalConcernTypesResult)) {
                    echo "<li class='mdl-menu__item' data-val='".$medicalConcernTypeRow['Id']."' value=" . $medicalConcernTypeRow['Id'] . ">" . $medicalConcernTypeRow['Type'] . "</li>";
                }

                ?>
            </ul>
        </div>
    </div>
    <div class="col-sm-10">
        <div id="floatingConcernNote<?php echo $rowId; ?>" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <textarea id="medicalConcernNote<?php echo $rowId; ?>" class="mdl-textfield__input" name="medicalConcernNote<?php echo $rowId; ?>" type="text" onfocus="addMedicalConcernNoteFocus()" onblur="removeMedicalConcernNoteFocus()"></textarea>
            <label class="mdl-textfield__label" for="medicalConcernNote<?php echo $rowId; ?>">Note</label>
        </div>
    </div>
</div>

<script type="text/javascript" src="../../js/new-student-scripts/AjaxNewMedicalConcernStyles.js"></script>
<script type="text/javascript" src="../../js/MdlSelect.js"></script>