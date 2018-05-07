<div class="tab-pane" role="tabpanel" id="studentMedicalConcerns">
    <form id="newStudentMedicalConcernsForm" name="newStudentMedicalConcernsForm">
        <div class="header"><i class="fa fa-warning"></i> Medical Info</div>
        <div class="blue-line-color"></div>
        <div class="row">
            <div class="col-sm-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="medicalConcernName" class="mdl-textfield__input"
                           name="medicalConcernName" type="text"
                           onkeypress="return suppressEnter()"/>
                    <label class="mdl-textfield__label"
                           for="medicalConcernName">Name</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                    <input type="text" class="mdl-textfield__input"
                           id="medicalConcernType" readonly>
                    <input type="hidden" name="medicalConcernType"/>
                    <i class="mdl-icon-toggle__label fa fa-caret-down"></i>
                    <label for="medicalConcernType"
                           class="mdl-textfield__label">Type</label>
                    <ul for="medicalConcernType"
                        class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                        <?php
                        while ($medicalConcernTypeRow = mysqli_fetch_assoc($medicalConcernTypesResult)) {
                            echo "<li class='mdl-menu__item' data-val='" . $medicalConcernTypeRow['Id'] . "' value=" . $medicalConcernTypeRow['Id'] . ">" . $medicalConcernTypeRow['Type_Name'] . "</li>";
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <textarea id="medicalConcernNote" class="mdl-textfield__input" name="medicalConcernNote"
                          type="text"></textarea>
                <label class="mdl-textfield__label" for="medicalConcernNote">Note</label>
            </div>
        </div>

        <div id="new-medical-concern-layer" class="new-medical-concern-layer"></div>
    </form>
</div>