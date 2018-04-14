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
        <option value="First_Name">First_Name</option>
        <option value="Last_Name">Last_Name</option>
        <option value="Address_one">Address_One</option>
        <option value="Address_two">Address_Two</option>
        <option value="City">City</option>
        <option value="State">State</option>
        <option value="Zip">Zip</option>
        <option value="Ethnicity">Ethnicity</option>
        <option value="Birth_Date">Birth Date</option>
        <option value="School">School</option>
    </select>
</div>
</div>

