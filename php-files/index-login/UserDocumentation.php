<?php
include("../scripts/header.php");
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
                            <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <ol>
                                        <li>Make sure you have administrator privileges.</li>
                                        <li>Click on the Register new user sub-tab under the administrative tools tab.</li>
                                        <li>Populate the input fields with the appropriate information.</li>
                                        <li>Click the submit button.</li>
                                        <li>Assuming the newly entered user does not already exists in the database, you
                                            should have
                                            successfully added
                                            a new user.
                                        </li>
                                    </ol>
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
                                    <ol>
                                        <li>Click on the Students/Contacts/Volunteers/Programs drop down on the left side menu
                                        </li>
                                        <li>Click on 'Add New'</li>
                                        <li>Fill out the form with the pertinent information</li>
                                        <li>Click the verify button at the bottom right.</li>
                                        <li>If the information in the window displayed is not correct, hit the 'X' at the top right corner of the pop up window and edit the information/reverify</li>
                                        <li>If the information is correct, click Submit. Your new Student/Contact/Volunteer/Program was added to the database.</li>
                                    </ol>
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
                                    <ol>
                                        <li>Click on the Generate Reports sub-tab under the Reports tab.</li>
                                        <li>Select the type of report you would like to generate.</li>
                                        <li>Enter the requested information in the form that appears.</li>
                                        <li>Click the Generate button.</li>
                                        <li>To export the generated report as a CSV file, click the Export button.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

<!--

                    <h1 id="updateobject">Updating Objects in the Database</h1>
                    <hr/>
                    <ol>
                        <li>Click on the student/contact/volunteer/employee/class/student test score sub-tab under the
                            Update tab.
                        </li>
                        <li>Select Object you want to update from the drop down list.</li>
                        <li>On selection of an Object, a form will be displayed with the Object's information. Any blank
                            fields indicate
                            no data was entered previously for that field.
                        </li>
                        <li>Update the fields with the appropriate information.</li>
                        <li>Click the submit button.</li>
                        <li>You should have successfully updated the object and pushed the changes to the database.</li>
                    </ol>
                    <br/>

                    <h1 id="searchingobject">Searching For an Object in the Database</h1>
                    <hr/>
                    <ol>
                        <li>Click on the information/volunteer/employee/schedule sub-tab under the search tab.</li>
                        <li>Select the name of the person whose information is desired from the dropdown box.</li>
                        <li>Click the submit button.</li>
                        <li>A list of the appropreate information associated with the person whose name is selected will
                            be displayed.
                        </li>
                    </ol>
                    <br/>

                    <h1 id="displayingobject">Displaying Objects in the Database</h1>
                    <hr/>
                    <ol>
                        <li>Click on the students/volunteer/employee/classes sub-tab under the display all tab.</li>
                        <li>A list of all the entries in the database of the type specified by the sub-tab will be
                            displayed.
                        </li>
                    </ol>
                    <br/>

                    <h1 id="creatingreport">Creating a Report</h1>
                    <hr/>
                    <ol>
                        <li>Click on the Generate Reports sub-tab under the Reports tab.</li>
                        <li>Select the type of report you would like to generate.</li>
                        <li>Enter the requested information in the form that appears.</li>
                        <li>Click the Generate button.</li>
                        <li>To export the generated report as a CSV file, click the Export button.</li>
                    </ol>
                    <br/>

                    <h1 id="printobject">Printing Reports/Lists</h1>
                    <hr/>
                    <ol>
                        <li>Ensure that you are on the page of the report/list you wish to print.</li>
                        <li>Click the print button beneath the report/list.</li>
                        <li>Select the printer that you want to print the report from on the popup.</li>
                        <li>Edit the print settings as necessary.</li>
                        <li>Click the print button on the popup.</li>
                    </ol>
                    <br/>
                </div>
            </div>
        </div>
    </div>

-->

<?php
include("../scripts/footer.php");
?>