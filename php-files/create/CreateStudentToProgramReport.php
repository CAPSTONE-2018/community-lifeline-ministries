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
                                        <div class="header"> Student/Program Report</div>
                                        <div id="as" class="collapse2">
                                            <div class="blue-line-color"></div>
                                        </div>
                                    </div>

                                </div>
                        </form>

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
                if (dynamicSearchFilter < 3) {
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
            $('#print_div').remove();
            $.ajax({
                url: "../Generate/GenerateStudentToProgramReport.php",
                method: "POST",
                success: function (output) {
                    $('.add-new-report').slideDown().append(output);
                }
            });
        });

    </script>
<?php include("../app-shell/Footer.php"); ?>