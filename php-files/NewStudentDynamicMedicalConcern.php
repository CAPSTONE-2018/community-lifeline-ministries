
<link rel="stylesheet" href="../css/input-styles.css"/>

<div class="blue-line-color"></div>
    <div class="form-group">
    <div class="col-sm-6">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input id="medicalConcernType" class="mdl-textfield__input"
name="medicalConcernType" type="text"/>
    <label class="mdl-textfield__label"
for="medicalConcernType">Name</label>
    </div>
    </div>

    <div class="col-sm-6">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
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
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <textarea id="medicalConcernNote" class="mdl-textfield__input"
name="medicalConcernNote" type="text">
    </textarea>
    <label class="mdl-textfield__label" for="medicalConcernNote">Note</label>
    </div>
    </div>
    </div>