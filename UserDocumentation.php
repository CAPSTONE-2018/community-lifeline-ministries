<?php
include("scripts/header.php");
?>


        <h1>Table of contents</h1>
        <hr />
        <div class="list-group">
            <a href="#addnewuser" class="list-group-item list-group-item-action">Adding a New User</a><br>
            <a href="#addnewobject" class="list-group-item list-group-item-action">Adding Objects to the Database</a><br>
            <a href="#updateobject" class="list-group-item list-group-item-action">Updating Objects in the Database</a><br>
            <a href="#searchingobject" class="list-group-item list-group-item-action">Searching For an Object in the Database</a><br>
            <a href="#displayingobject" class="list-group-item list-group-item-action">Displaying Objects in the Database</a><br>
            <a href="#creatingreport" class="list-group-item list-group-item-action">Creating a Report</a><br>
            <a href="#printobject" class="list-group-item list-group-item-action">Printing Reports/Lists</a>
        </div>
        <br />


        <h1 id="addnewuser">Adding a New User</h1>
        <hr />
        <ol>
            <li>Make sure you have administrator privileges.</li>
            <li>Click on the Register new user sub-tab under the administrative tools tab.</li>
            <li>Populate the input fields with the appropriate information.</li>
            <li>Click the submit button.</li>
            <li>Assuming the newly entered user does not already exists in the database, you should have successfully added a new user. </li>
        </ol>
        <br />


        <h1 id="addnewobject">Adding Objects to the Database</h1>
        <hr />
        <ol>
            <li>Click on the student/contact/volunteer/employee/class/student to class/student test score sub-tab under the New tab.</li>
            <li>Populate the fields with the appropriate information.</li>
            <li>Click the submit button.</li>
            <li>Assuming the newly entered object does not already exists in the database, you should have successfully added a new object. </li>
        </ol>
        <br />

        <h1 id="updateobject">Updating Objects in the Database</h1>
        <hr />
        <ol>
            <li>Click on the student/contact/volunteer/employee/class/student test score sub-tab under the Update tab.</li>
            <li>Select Object you want to update from the drop down list.</li>
            <li>On selection of an Object, a form will be displayed with the Object's information. Any blank fields indicate no data was entered previously for that field.</li>
            <li>Update the fields with the appropriate information.</li>
            <li>Click the submit button.</li>
            <li>You should have successfully updated the object and pushed the changes to the database. </li>
        </ol>
        <br />

        <h1 id="searchingobject">Searching For an Object in the Database</h1>
        <hr />
        <ol>
            <li>Click on the information/volunteer/employee/schedule sub-tab under the search tab.</li>
            <li>Select the name of the person whose information is desired from the dropdown box.</li>
            <li>Click the submit button.</li>
            <li>A list of the appropreate information associated with the person whose name is selected will be displayed.</li>
        </ol>
        <br />

        <h1 id="displayingobject">Displaying Objects in the Database</h1>
        <hr />
        <ol>
            <li>Click on the students/volunteer/employee/classes sub-tab under the display all tab.</li>
            <li>A list of all the entries in the database of the type specified by the sub-tab will be displayed.</li>
        </ol>
        <br />

        <h1 id="creatingreport">Creating a Report</h1>
        <hr />
        <ol>
            <li>Click on the Generate Reports sub-tab under the Reports tab.</li>
            <li>Select the type of report you would like to generate.</li>
            <li>Enter the requested information in the form that appears.</li>
            <li>Click the Generate button.</li>
            <li>To export the generated report as a CSV file, click the Export button.</li>
        </ol>
        <br />

        <h1 id="printobject">Printing Reports/Lists</h1>
        <hr />
        <ol>
            <li>Ensure that you are on the page of the report/list you wish to print.</li>
            <li>Click the print button beneath the report/list.</li>
            <li>Select the printer that you want to print the report from on the popup.</li>
            <li>Edit the print settings as necessary.</li>
            <li>Click the print button on the popup.</li>
        </ol>
        <br />
    </div>

</body>
</html>
