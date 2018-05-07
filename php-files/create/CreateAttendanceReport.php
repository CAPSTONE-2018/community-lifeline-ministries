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

                        <div class="form-content">
                            <div class="tab-content">
                                <button id="show-filters" style="float:right"> Show Filters</button>
                                <div class="tab-pane active " id="studentInfo">
                                    <div class="header">Attendance Report</div>
                                    <div id="as" class="collapse2">
                                        <div class="blue-line-color"></div>
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input id="searchInput1" class="mdl-textfield__input"
                                                           name="searchInput1" type="text"
                                                           placeholder="Search Input"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">

                                                <p style="width:100%;">Search Input Type
                                                    <select style="width:100%;" id="FilterType1">
                                                        <option value="Program">Date</option>
                                                    </select></p>
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

<?php include("../app-shell/Footer.php"); ?>