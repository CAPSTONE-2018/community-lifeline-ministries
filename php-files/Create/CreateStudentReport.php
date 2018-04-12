<?php
include("../scripts/header.php");
include("../../db/config.php");

?>
<link rel="stylesheet" href="../../css/form-styles.css"/>
<link rel="stylesheet" href="../../css/toggle-switch.css"/>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="../add/AddStudent.php" method="POST" name="newStudentForm"
                          id="newStudentForm">
                        <div class="form-content">
                            <div class="tab-content">
                                <div class="tab-pane active " id="studentInfo">
                                    <div class="header">Report Filters</div>

                                    <h4 class="heading"><i class="glyphicon glyphicon-user"></i> Search Filter <button type="button" id="add-new-searchFilter-Button">Add</button></h4>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="searchFilter" class="mdl-textfield__input"
                                                       name="searchFilter" type="text"/>
                                                <label class="mdl-textfield__label" for="searchFilter">Search Filter</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" value="First Name" class="mdl-textfield__input" id="FilterType" readonly>
                                                <input type="hidden" value="" name="FilterType">
                                                <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
                                                <label for="FilterType" class="mdl-textfield__label">Filter Type</label>
                                                <ul for="FilterType" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                    <li class="mdl-menu__item" data-val="FirstName">First Name</li>
                                                    <li class="mdl-menu__item" data-val="LastName">Last Name</li>
                                                    <li class="mdl-menu__item" data-val="Address_one">Address One</li>
                                                    <li class="mdl-menu__item" data-val="Address_two">Address Two</li>
                                                    <li class="mdl-menu__item" data-val="City">City</li>
                                                    <li class="mdl-menu__item" data-val="State">State</li>
                                                    <li class="mdl-menu__item" data-val="Zip">Zip</li>
                                                    <li class="mdl-menu__item" data-val="Ethnicity">Ethnicity</li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="add-new-searchFilter-dropdown">

                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" value="All Students" class="mdl-textfield__input" id="ReduceLunch" readonly>
                                                <input type="hidden" value="" name="ReduceLunch">
                                                <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
                                                <label for="Active" class="mdl-textfield__label">Reduced Lunch Eligible</label>
                                                <ul for="ReduceLunch" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                    <li class="mdl-menu__item" data-val="1">All Students</li>
                                                    <li class="mdl-menu__item" data-val="2">Yes</li>
                                                    <li class="mdl-menu__item" data-val="3">No</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" value="All Students" class="mdl-textfield__input" id="Active" readonly>
                                                <input type="hidden" value="" name="Active">
                                                <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
                                                <label for="Active" class="mdl-textfield__label">Active/Inactive</label>
                                                <ul for="Active" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                    <li class="mdl-menu__item" data-val="1">All Students</li>
                                                    <li class="mdl-menu__item" data-val="2">Active Students</li>
                                                    <li class="mdl-menu__item" data-val="3">Inactive Students</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" value="All Students" class="mdl-textfield__input" id="BirthCertificate" readonly>
                                                <input type="hidden" value="" name="BirthCertificate">
                                                <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
                                                <label for="BirthCertificate" class="mdl-textfield__label">Birth Certificate On File</label>
                                                <ul for="BirthCertificate" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                    <li class="mdl-menu__item" data-val="1">All Students</li>
                                                    <li class="mdl-menu__item" data-val="2">Yes</li>
                                                    <li class="mdl-menu__item" data-val="3">No</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" value="All Students" class="mdl-textfield__input" id="IEP" readonly>
                                                <input type="hidden" value="" name="IEP">
                                                <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
                                                <label for="IEP" class="mdl-textfield__label">IEP</label>
                                                <ul for="IEP" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                    <li class="mdl-menu__item" data-val="1">All Students</li>
                                                    <li class="mdl-menu__item" data-val="2">Yes</li>
                                                    <li class="mdl-menu__item" data-val="3">No</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                    <div class="card-footer">
                        <div class="right-align">
                            <!--   Button trigger modal -->
                            <button id="generateReport" onclick="return GenerateReport()" type="button" class="btn btn-right btn-primary">
                                Generate Report
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../scripts/footer.php"); ?>
<script src="../../js/input-styling.min.js"></script>


<script type="text/javascript">



    var dynamicSearchFilter = 0;
    $(document).ready(function () {
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

    function GenerateReport(){
        for(int i =0; i < dynamicSearchFilter; i++){
            $states = array(
        }
    }
</script>
<!--<script src="../../js/new-student-scripts/NewStudentMed.js"></script>-->