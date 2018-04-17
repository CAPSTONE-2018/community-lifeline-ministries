<?php
$dynamicContactId = $_POST['dynamicContactId'];
?>

<div class="col-sm-6 ">
    <div id="floatingContactLabel<?php echo $dynamicContactId; ?>"
            class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
        <input type="text"
               id="studentContact<?php echo $dynamicContactId; ?>"
               class="mdl-textfield__input"
               readonly>
        <input type="hidden" name="studentContact<?php echo $dynamicContactId; ?>">
        <i class="mdl-icon-toggle__label fa fa-caret-down"></i>
        <label for="studentContact<?php echo $dynamicContactId; ?>" class="mdl-textfield__label">Select From Existing Contact</label>
        <ul for="studentContact<?php echo $dynamicContactId; ?>" class="overflow mdl-menu mdl-menu--bottom-left mdl-js-menu">
            <?php
            while ($existingContactsRow = mysqli_fetch_assoc($existingContactsResult)) {
                $contactNameToDisplay = $existingContactsRow['First_Name'] . " " . $existingContactsRow['Last_Name'];
                echo "<li class='mdl-menu__item' value=" . $existingContactsRow['Id'] . ">" . $contactNameToDisplay . "</li>";
            }
            ?>
        </ul>
    </div>
</div>

