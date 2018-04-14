<?php
$dynamicSearchFilterId = $_POST['dynamicSearchFilter'];
?>
<div class="form-group">
    <div class="col-sm-6">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input id="searchInput <?php echo $dynamicSearchFilterId; ?>" class="mdl-textfield__input"
                   name="searchInput<?php echo $dynamicSearchFilterId; ?>" type="text" placeholder="Search Input"/>
        </div>
    </div>
    <div class="col-sm-6 ">

        <p style="width:100%;">Filter Type</p>
        <select style="width:100%;" id="FilterType<?php echo $dynamicSearchFilterId; ?>">
            <option value="Name">Name</option>
            <option value="Type">Type</option>
            <option value="Note">Note</option>
        </select>
    </div>
</div>

