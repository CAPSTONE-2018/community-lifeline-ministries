<?php
include("../scripts/header.php");
include("../../db/config.php");

?>
<link rel="stylesheet" href="../../css/form-styles.css"/>
<link rel="stylesheet" href="../../css/toggle-switch.css"/>

<div class="container-fluid">
    <div id = "FilterReport" class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" method="POST" name="newStudentForm"
                          id="newStudentForm">
                        <div class="form-content">
                            <div class="tab-content">
                                <button id="show-filters" style="float:right"> Show Filters</button>
                                <div class="tab-pane active " id="studentInfo">
                                    <div class="header">Student Report</div>
                                    <div id="as" class="collapse2">
                                    <h4 class="heading"><i class="glyphicon glyphicon-user"></i> New Report <button type="button" id="add-new-searchFilter-Button">Add</button></h4>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="searchInput1" class="mdl-textfield__input"
                                                       name="searchInput1" type="text" placeholder="Search Input"/>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">

                                            <p style="width:100%;">Filter Type</p>
                                            <select style="width:100%;" id="FilterType1">
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
                                    <div class="add-new-searchFilter-dropdown">

                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <!--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" value="All Students" class="mdl-textfield__input" id="Active" readonly>
                                                <input type="hidden" value="" name="Active">
                                                <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
                                                <label for="Active" class="mdl-textfield__label">Active/Inactive</label>
                                                <ul for="Active" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                    <li class="mdl-menu__item" data-val="1">All Students</li>
                                                    <li class="mdl-menu__item" data-val="2">Active Students</li>
                                                    <li class="mdl-menu__item" data-val="3">Inactive Students</li>
                                                </ul>
                                            </div>-->
                                            <p>Active/Inactive</p>
                                            <select id="Active">
                                                <option value="1">All Students</option>
                                                <option value="2">Active</option>
                                                <option value="3">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <!--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" value="All Students" class="mdl-textfield__input" id="ReduceLunch" readonly>
                                                <input type="hidden" value="" name="ReduceLunch">
                                                <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
                                                <label for="Active" class="mdl-textfield__label">Reduced Lunch Eligible</label>
                                                <ul for="ReduceLunch" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                    <li class="mdl-menu__item" data-val="1">All Students</li>
                                                    <li class="mdl-menu__item" data-val="2">Yes</li>
                                                    <li class="mdl-menu__item" data-val="3">No</li>
                                                </ul>
                                            </div>-->
                                            <p>Reduced Lunch</p>
                                            <select id="ReduceLunch">
                                                <option value="1">All Students</option>
                                                <option value="2">Active</option>
                                                <option value="3">Inactive</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-2">
                                            <!--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" value="All Students" class="mdl-textfield__input" id="Active" readonly>
                                                <input type="hidden" value="" name="Active">
                                                <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
                                                <label for="Active" class="mdl-textfield__label">Active/Inactive</label>
                                                <ul for="Active" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                    <li class="mdl-menu__item" data-val="1">All Students</li>
                                                    <li class="mdl-menu__item" data-val="2">Active Students</li>
                                                    <li class="mdl-menu__item" data-val="3">Inactive Students</li>
                                                </ul>
                                            </div>-->
                                            <p>Permission Slip</p>
                                            <select id="PermissionSlip">
                                                <option value="1">All Students</option>
                                                <option value="2">Yes</option>
                                                <option value="3">No</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-2">
                                            <!--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" value="All Students" class="mdl-textfield__input" id="BirthCertificate" readonly>
                                                <input type="hidden" value="" name="BirthCertificate">
                                                <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
                                                <label for="BirthCertificate" class="mdl-textfield__label">Birth Certificate On File</label>
                                                <ul for="BirthCertificate" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                    <li class="mdl-menu__item" data-val="1">All Students</li>
                                                    <li class="mdl-menu__item" data-val="2">Yes</li>
                                                    <li class="mdl-menu__item" data-val="3">No</li>
                                                </ul>
                                            </div>-->
                                            <p>Birth Certificate</p>
                                            <select id="BirthCertificate">
                                                <option value="1">All Students</option>
                                                <option value="2">Yes</option>
                                                <option value="3">No</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-2">
                                            <!--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" value="All Students" class="mdl-textfield__input" id="IEP" readonly>
                                                <input type="hidden" value="" name="IEP">
                                        <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
                                        <label for="IEP" class="mdl-textfield__label">IEP</label>
                                        <ul for="IEP" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                            <li class="mdl-menu__item" data-val="1">All Students</li>
                                            <li class="mdl-menu__item" data-val="2">Yes</li>
                                            <li class="mdl-menu__item" data-val="3">No</li>
                                        </ul>-->
                                        <p>IEP</p>
                                        <select id="IEP">
                                            <option value="1">All Students</option>
                                            <option value="2">Yes</option>
                                            <option value="3">No</option>
                                        </select>
                                    </div>
                                        <div class="col-sm-2">
                                            <!--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" value="All Students" class="mdl-textfield__input" id="IEP" readonly>
                                                <input type="hidden" value="" name="IEP">
                                        <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
                                        <label for="IEP" class="mdl-textfield__label">IEP</label>
                                        <ul for="IEP" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                            <li class="mdl-menu__item" data-val="1">All Students</li>
                                            <li class="mdl-menu__item" data-val="2">Yes</li>
                                            <li class="mdl-menu__item" data-val="3">No</li>
                                        </ul>-->
                                            <p>Gender</p>
                                            <select id="Gender">
                                                <option value="1">All Students</option>
                                                <option value="2">M</option>
                                                <option value="3">F</option>
                                            </select>
                                        </div>
                                </div>
                                    </div>
                                </div>

                            </div>
                    </form>

                    <div class="card-footer">
                        <div class="right-align">
                            <!--   Button trigger modal -->
                            <button id="generateReport"  type="button" class="btn btn-right btn-primary">
                                Generate Report
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="add-new-report">

    </div>
</div>

<?php include("../scripts/footer.php"); ?>
<script src="../../js/input-styling.min.js"></script>


<script type="text/javascript">

    $(document).ready(function () {

        $('#show-filters').click(function () {
            $('.collapse2').collapse("show");
        });
    });

    var dynamicSearchFilter = 1;
    $(document).ready(function () {
        $('.collapse2').collapse("show");
        $('#add-new-searchFilter-Button').click(function () {
            dynamicSearchFilter++;

            $.ajax({
                url: "../scripts/AjaxDynamicSearchFilter.php",
                method: "POST",
                data: {dynamicSearchFilter: dynamicSearchFilter},
                success: function (output) {
                    $('.add-new-searchFilter-dropdown').slideDown().append(output);
                }
            })
        });
    });

    $(document).ready(function () {
        $('#generateReport').click(function () {
            var searchInputs = new Array(14);
            var searchTypes = new Array(8);
            for(var i =1; i < 9; i++){
                if(document.getElementById("FilterType" + i) != null && document.getElementById("searchInput" + i) != null ){
                    searchInputs[i-1] = document.getElementById("searchInput" + i).value;
                    searchTypes[i-1] = document.getElementById("FilterType" + i).value;
                }
                else{
                    searchInputs[i-1] = "";
                    searchTypes[i-1] = "";
                }
            }
            for(var i =0; i < searchTypes.length; i++)
            {
                for(var j = 0; j < searchTypes.length; j++){
                if(searchTypes[i] == searchTypes[j] && searchTypes[i] != ""){
                    if(i != j){
                        return false;
                    }
                }
            }
            }
            searchInputs[8] = document.getElementById("Active").value;
            searchInputs[9] = document.getElementById("ReduceLunch").value;
            searchInputs[10] = document.getElementById("BirthCertificate").value;
            searchInputs[11] = document.getElementById("IEP").value;
            searchInputs[12] = document.getElementById("PermissionSlip").value;
            searchInputs[13] = document.getElementById("Gender").value;

            var searchFilters = 'WHERE';

            for(var i =0; i < searchTypes.length; i++) {


                switch (searchTypes[i]) {
                    case "First_Name":
                        if(i != 0) {
                            searchFilters += " AND";
                        }
                        searchFilters += " First_Name LIKE '%" + searchInputs[i]+"%'";
                        break;
                    case "Last_Name":

                        if(i != 0) {
                            searchFilters += " AND";
                        }
                        searchFilters += " Last_Name LIKE '%" + searchInputs[i]+"%'";
                        break;
                    case "Address_one":

                        if(i != 0) {
                            searchFilters += " AND";
                        }
                        searchFilters += " Address_one LIKE '%" + searchInputs[i]+"%'";
                        break;
                    case "Address_two":

                        if(i != 0) {
                            searchFilters += " AND";
                        }
                        searchFilters += " Address_two LIKE '%" + searchInputs[i]+"%'";
                        break;
                    case "City":

                        if(i != 0) {
                            searchFilters += " AND";
                        }
                        searchFilters += " City LIKE '%" + searchInputs[i]+"%'";
                        break;
                    case "State":

                        if(i != 0) {
                            searchFilters += " AND";
                        }
                        searchFilters += " State LIKE '%" + searchInputs[i]+"%'";
                        break;
                    case "Zip":

                        if(i != 0) {
                            searchFilters += " AND";
                        }
                        searchFilters += " Zip = " + searchInputs[i];
                        break;
                    case "Ethnicity":

                        if(i != 0) {
                            searchFilters += " AND";
                        }
                        searchFilters += " Ethnicity = " + searchInputs[i];
                        break;
                    case "Birth_Date":

                        if(i != 0) {
                            searchFilters += " AND";
                        }
                        searchFilters += " Birth_Date = " + searchInputs[i];
                        break;
                    case "School":

                        if(i != 0) {
                            searchFilters += " AND";
                        }
                        searchFilters += " School LIKE '%" + searchInputs[i]+"%'";
                        break;
                    default:
                        break;
                }
            }


            if(searchInputs[8] == 2){
                if(searchFilters != "WHERE") {
                    searchFilters += " AND";
                }
                searchFilters += " Active_Student = 1"
            }else if(searchInputs[8] == 3){
                if(searchFilters != "WHERE") {
                    searchFilters += " AND";
                }
                searchFilters += " Active_Student = 0"
            }
            if(searchInputs[9] == 2){
                if(searchFilters != "WHERE") {
                    searchFilters += " AND";
                }
                searchFilters += " Reduced_Lunch_Eligible = 1"
            }else if(searchInputs[9] == 3){
                if(searchFilters != "WHERE") {
                    searchFilters += " AND";
                }
                searchFilters += " Reduced_Lunch_Eligible = 0"
            }



            if(searchInputs[10] == 2){
                if(searchFilters != "WHERE") {
                    searchFilters += " AND";
                }
                searchFilters += " BirthCertificate = 1"
            }else if(searchInputs[10] == 3){
                if(searchFilters != "WHERE") {
                    searchFilters += " AND";
                }
                searchFilters += " BirthCertificate = 0"
            }

            if(searchInputs[11] == 2){
                if(searchFilters != "WHERE") {
                    searchFilters += " AND";
                }
                searchFilters += " IEP = 1"
            }else if(searchInputs[11] == 3){
                if(searchFilters != "WHERE") {
                    searchFilters += " AND";
                }
                searchFilters += " IEP = 0"
            }

            if(searchInputs[12] == 2){
                if(searchFilters != "WHERE") {
                    searchFilters += " AND";
                }
                searchFilters += " Permission_Slip = 1"
            }else if(searchInputs[12] == 3){
                if(searchFilters != "WHERE") {
                    searchFilters += " AND";
                }
                searchFilters += " Permission_Slip = 0"
            }
            if(searchInputs[13] == 2){
                if(searchFilters != "WHERE") {
                    searchFilters += " AND";
                }
                searchFilters += " Gender = 'M'"
            }else if(searchInputs[13] == 3){
                if(searchFilters != "WHERE") {
                    searchFilters += " AND";
                }
                searchFilters += " Gender = 'F'"
            }

            if(searchFilters == "WHERE"){
                searchFilters = "";
            }
            $('#print_div').remove();
            $('.collapse2').collapse("hide");
            $.ajax({
                url: "../Generate/GenerateStudentReport.php",
                method: "POST",
                data: {searchFilters: searchFilters},
                success: function (output) {
                    $('.add-new-report').slideDown().append(output);
                }
            });
        });
    });

</script>
<script type="text/javascript" src="../../js/MdlSelect.js"></script>
<!--<script src="../../js/new-student-scripts/NewStudentMed.js"></script>-->