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
                                    <div class="header">Medical Report</div>
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
                                                    <option value="Name">Name</option>
                                                    <option value="Type">Type</option>
                                                    <option value="Note">Note</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="add-new-searchFilter-dropdown">

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
            if(dynamicSearchFilter < 3) {
                dynamicSearchFilter++;

                $.ajax({
                    url: "../scripts/AjaxDynamicVolunteerSearchFilter.php",
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
            var searchInputs = new Array(3);
            var searchTypes = new Array(3);
            for(var i =1; i < 3; i++){
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
            var searchFilters = 'WHERE';

            for(var i =0; i < searchTypes.length; i++) {


                switch (searchTypes[i]) {
                    case "Name":
                        if(i != 0) {
                            searchFilters += " AND";
                        }
                        searchFilters += " Name LIKE '%" + searchInputs[i]+"%'";
                        break;
                    case "Type":

                        if(i != 0) {
                            searchFilters += " AND";
                        }
                        searchFilters += " Type LIKE '%" + searchInputs[i]+"%'";
                        break;
                    case "Note":

                        if(i != 0) {
                            searchFilters += " AND";
                        }
                        searchFilters += " Note LIKE '%" + searchInputs[i]+"%'";
                        break;
                    default:
                        break;
                }
            }
            $('#print_div').remove();
            $('.collapse2').collapse("hide");
            $.ajax({
                url: "../Generate/GenerateMedicalReport.php",
                method: "POST",
                data: {searchFilters: searchFilters},
                success: function (output) {
                    $('.add-new-report').slideDown().append(output);
                }
            });
        });
    });

</script>
<script type="text/javascript" src="../../js/forms/MdlSelect.js"></script>
<!--<script src="../../js/new-student-scripts/NewStudentMed.js"></script>-->