<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../../db/config.php");
include("../app-shell/TimeZoneFormat.php");
?>
    <div class="container-fluid">
        <div id="FilterReport" class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" name="newStudentForm"
                              id="newStudentForm">
                            <div class="form-content">
                                <div class="tab-content">
                                    <button id="show-filters" style="float:right"> Show Filters</button>
                                    <div class="tab-pane active " id="studentInfo">
                                        <div class="header">Contacts Report</div>
                                        <div id="as" class="collapse2">
                                            <div class="blue-line-color"></div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                            <input id="searchInput1" class="mdl-textfield__input"
                                                                   name="searchInput1" type="text"
                                                                   placeholder="Search Input"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p style="width:100%;">Search Input Type
                                                            <select style="width:100%;" id="FilterType1">
                                                                <option value="First_Name">First Name</option>
                                                                <option value="Last_Name">Last Name</option>
                                                                <option value="Address_one">Address One</option>
                                                                <option value="Address_two">Address Two</option>
                                                                <option value="City">City</option>
                                                                <option value="State">State</option>
                                                                <option value="Zip">Zip</option>
                                                                <option value="Ethnicity">Ethnicity</option>
                                                                <option value="Birth_Date">Birth Date</option>
                                                                <option value="School">School</option>
                                                            </select></p>
                                                    </div>

                                                    <div class="col-sm">
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
                                                        <p>Active/Inactive</br>
                                                            <select id="Active">
                                                                <option value="1">All Contacts</option>
                                                                <option value="2">Active</option>
                                                                <option value="3">Inactive</option>
                                                            </select></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card-footer">
        <div class="right-align">
            <!--   Button trigger modal -->
            <button id="generateReport" type="button" class="btn btn-right btn-primary">
                Generate Report
            </button>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="add-new-report">

    </div>
    </div>
    </div>


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
                if (dynamicSearchFilter >= 11) {
                    dynamicSearchFilter++;

                    $.ajax({
                        url: "../scripts/AjaxDynamicSearchFilter.php",
                        method: "POST",
                        data: {dynamicSearchFilter: dynamicSearchFilter},
                        success: function (output) {
                            $('.add-new-searchFilter-dropdown').slideDown().append(output);
                        }
                    })
                }
            });

        });

        $(document).ready(function () {
            $('#generateReport').click(function () {
                var searchInputs = new Array(12);
                var searchTypes = new Array(11);
                for (var i = 1; i < 11; i++) {
                    if (document.getElementById("FilterType" + i) != null && document.getElementById("searchInput" + i) != null) {
                        searchInputs[i - 1] = document.getElementById("searchInput" + i).value;
                        searchTypes[i - 1] = document.getElementById("FilterType" + i).value;
                    }
                    else {
                        searchInputs[i - 1] = "";
                        searchTypes[i - 1] = "";
                    }
                }
                for (var i = 0; i < searchTypes.length; i++) {
                    for (var j = 0; j < searchTypes.length; j++) {
                        if (searchTypes[i] == searchTypes[j] && searchTypes[i] != "") {
                            if (i != j) {
                                return false;
                            }
                        }
                    }
                }

                searchInputs[11] = document.getElementById("Active").value;
                var searchFilters = 'WHERE';

                for (var i = 0; i < searchTypes.length; i++) {


                    switch (searchTypes[i]) {
                        case "First_Name":
                            if (i != 0) {
                                searchFilters += " AND";
                            }
                            searchFilters += " First_Name LIKE '%" + searchInputs[i] + "%'";
                            break;
                        case "Last_Name":

                            if (i != 0) {
                                searchFilters += " AND";
                            }
                            searchFilters += " Last_Name LIKE '%" + searchInputs[i] + "%'";
                            break;
                        case "Address_one":

                            if (i != 0) {
                                searchFilters += " AND";
                            }
                            searchFilters += " Address_one LIKE '%" + searchInputs[i] + "%'";
                            break;
                        case "Address_two":

                            if (i != 0) {
                                searchFilters += " AND";
                            }
                            searchFilters += " Address_two LIKE '%" + searchInputs[i] + "%'";
                            break;
                        case "City":

                            if (i != 0) {
                                searchFilters += " AND";
                            }
                            searchFilters += " City LIKE '%" + searchInputs[i] + "%'";
                            break;
                        case "State":

                            if (i != 0) {
                                searchFilters += " AND";
                            }
                            searchFilters += " State LIKE '%" + searchInputs[i] + "%'";
                            break;
                        case "Zip":

                            if (i != 0) {
                                searchFilters += " AND";
                            }
                            searchFilters += " Zip = " + searchInputs[i];
                            break;
                        case "Email":
                            if (i != 0) {
                                searchFilters += " AND";
                            }
                            searchFilters += " Email LIKE '%" + searchInputs[i] + "%'";
                            break;
                        default:
                            break;
                    }
                }


                if (searchInputs[11] == 2) {
                    if (searchFilters != "WHERE") {
                        searchFilters += " AND";
                    }
                    searchFilters += " Active_Contact = 1"
                } else if (searchInputs[11] == 3) {
                    if (searchFilters != "WHERE") {
                        searchFilters += " AND";
                    }
                    searchFilters += " Active_Contact = 0"
                }

                if (searchFilters == "WHERE") {
                    searchFilters = "";
                }

                $('#print_div').remove();
                $('.collapse2').collapse("hide");
                $.ajax({
                    url: "../Generate/GenerateContactsReport.php",
                    method: "POST",
                    data: {searchFilters: searchFilters},
                    success: function (output) {
                        $('.add-new-report').slideDown().append(output);
                    }
                });
            });
        });

    </script>
<?php include("../app-shell/Footer.php"); ?>