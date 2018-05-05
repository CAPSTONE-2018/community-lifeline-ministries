<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h1>Table of contents</h1>
                <div id="accordion">

                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="false" aria-controls="collapseOne">
                                    Adding a New User
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <p>
                                    <strong>This action can only be done by administrative users </strong></br>
                                    Click on 'Admin' in the sidebar menu</br>
                                    Click on 'New User' in the sidebar menu</br>
                                    Fill out the form on the next page with the appropriate informatio
                                    paying attention to the selection for 'Account Type'</br>
                                    Click on 'Submit User'</br>
                                    Assuming the newly entered user does not already exists in the database, you
                                    will have successfully added a new user.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                    Add Student/Contact/Volunteer/Program
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <p>
                                    Click on the Students/Contacts/Volunteers/Programs drop down on the left side menu</br>
                                    Click on 'Add New'</br>
                                    Fill out the form with the pertinent information</br>
                                    Click the verify button at the bottom right.</br>
                                    If the information in the window displayed is not correct, hit the 'X' at
                                        the top right corner of the pop up window and edit the information/reverify</br>
                                    If the information is correct, click Submit. Your new
                                        Student/Contact/Volunteer/Program was added to the database.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                    Generating Reports
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                             data-parent="#accordion">
                            <div class="card-body">
                                <p>
                                    Click on 'Reports' in the left sidebar menu</br>
                                    Select the type of report you would like to generate.</br>
                                    Fill out the form on the next page with your report criteria</br>
                                    Click the 'Generate Report' button.</br>
                                    A 'Print' Button is located on the bottom right of the screen.</br>
                                </p>
                            </div>
                        </div>
                    </div>

                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                Attendance Tracking
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                         data-parent="#accordion">
                        <div class="card-body">
                            <p>
                                The Home page contains the 'Attendance Center' section</br>
                                Choose an option in here - either to create a new record of attendance or to
                                edit attendance for a class that has already been entered for the day</br>
                                Choosing a class in the dropdown will bring you to the page for that class'
                                attendance</br>
                                Mark each student as 'Present' 'Absent' or 'Tardy</br>
                                Click the 'Submit' button to enter attendance.</br>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">
                                Past Attendance Records
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                         data-parent="#accordion">
                        <div class="card-body">
                            <p>
                                The Home page contains the 'Attendance Center' section</br>
                                Within the 'Attendance Center' you will find a calendar with a 'Search by Date' option</br>
                                The calendar on the right side of the 'Search by Date' line will allow you to choose a
                                past date to edit attendance for.</br>
                                Select your date. If attendance records exist, they will show up as class name buttons underneath
                                the date selector.</br>
                                Choose the class you would like the edit the attendance for. This brings you to the page
                                to populate the students status for the class.</br>
                            </p>
                        </div>
                    </div>
                </div>
                </div>

        </div>
    </div>
</div>

<?php
include("../app-shell/Footer.php");

