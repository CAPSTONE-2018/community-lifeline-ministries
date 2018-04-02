

<div class="blue-line-color"></div>
<div class="form-group">
    <div class="col-sm-6">
        <div id="floatingConcernName" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input id="medicalConcernName" class="mdl-textfield__input" name="medicalConcernName" type="text" onfocus="addMedicalConcernNameFocus()" onblur="removeMedicalConcernNameFocus()" />
            <label class="mdl-textfield__label" for="medicalConcernName">Name</label>
        </div>
    </div>

    <div class="col-sm-6">
        <div id="floatingConcernType" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
            <input type="text" value="" class="mdl-textfield__input" id="medicalConcernType" readonly>
            <input type="hidden" value="" name="medicalConcernType">
            <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
            <label for="medicalConcernType" class="mdl-textfield__label">Type</label>
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
        <div id="floatingConcernNote" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <textarea id="medicalConcernNote" class="mdl-textfield__input"
              name="medicalConcernNote" type="text">
    </textarea>
            <label class="mdl-textfield__label" for="medicalConcernNote">Note</label>
        </div>
    </div>
</div>

<script type="text/javascript" src="../../js/new-student-scripts/AjaxNewMedicalConcernStyles.js"></script>
<script type="text/javascript" src="../../js/MdlSelect.js"></script>