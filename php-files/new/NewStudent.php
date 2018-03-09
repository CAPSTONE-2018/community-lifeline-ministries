<?php
include("../scripts/header.php");
?>
<link rel="stylesheet" href="../../css/form-styles.css"/>
<link rel="stylesheet" href="../../css/toggle-switch.css"/>
<link rel="stylesheet" href="../../css/input-stylings.css"/>
<link rel="stylesheet" href="../../css/new-toggle.css"/>

<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#1" data-toggle="tab">Student Info</a>
                            </li>
                            <li>
                                <a href="#2" data-toggle="tab">Student Allergies</a>
                            </li>
                            <li>
                                <a href="#3" data-toggle="tab">Student Contact</a>
                            </li>
                        </ul>
                    </div>

                    <form class="form-horizontal" action="../add/AddStudent.php" method="POST" name="newStudentForm"
                          id="newStudentForm">
                        <div class="form-content">
                            <div class="tab-content">
                                <div class="tab-pane active " id="1">
                                    <div class="header">Add Student Info</div>

                                    <h4 class="heading"><i class="glyphicon glyphicon-user"></i> Personal Info</h4>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="firstName" class="mdl-textfield__input" name="studentFirstName" type="text" />
                                                <label class="mdl-textfield__label" for="firstName">First Name</label>
                                                <span class="mdl-textfield__error">First Name is Required</span>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="lastName" class="mdl-textfield__input" name="studentLastName" type="text"/>
                                                <label class="mdl-textfield__label" for="lastName">Last Name</label>
                                                <span class="mdl-textfield__error">Last Name is Required</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="middleName" class="mdl-textfield__input" name="studentMiddleName" type="text"/>
                                                <label class="mdl-textfield__label" for="middleName">Middle Name</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="suffix" class="mdl-textfield__input" name="studentSuffix" type="text"/>
                                                <label class="mdl-textfield__label" for="suffix">Suffix</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-sm-4">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="dob" class="mdl-textfield__input" name="dob" type="text" />
                                                <label class="mdl-textfield__label" for="dob">D.O.B.</label>
                                                <span class="mdl-textfield__error">Input is not a date!</span>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="ethnicity" class="mdl-textfield__input" name="ethnicity" type="text"/>
                                                <label class="mdl-textfield__label" for="ethnicity">Ethnicity</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <select id="gender" class="form-control" name="gender" />
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <h4 class="heading"><i class="glyphicon glyphicon-home"></i> Address</h4>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="studentAddressOne" class="mdl-textfield__input" name="studentAddressOne" type="text"/>
                                                <label class="mdl-textfield__label" for="studentAddressOne">Address</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="studentAddressTwo" class="mdl-textfield__input" name="studentAddressTwo" type="text"/>
                                                <label class="mdl-textfield__label" for="studentAddressTwo">Apt/Suite</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">

                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="studentCity" class="mdl-textfield__input" name="studentCity" type="text"/>
                                                <label class="mdl-textfield__label" for="studentCity">City</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="control-label" for="state">State:</label>
                                            <?php
                                            include("../scripts/States.php");
                                            echo stateDropdown()
                                            ?>
                                        </div>
                                        <div class="col-sm-4">

                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="studentZip" class="mdl-textfield__input" name="studentZip" type="text"/>
                                                <label class="mdl-textfield__label" for="studentZip">Zip Code</label>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="heading"><i class="glyphicon glyphicon-file"></i> Documents</h4>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">
                                        <div class="col-lg">

                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="studentSchool" class="mdl-textfield__input" name="studentSchool" type="text"/>
                                                <label class="mdl-textfield__label" for="studentSchool">School Currently Attending</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="toggle-title">Reduced Lunch Eligible</div>
                                            <ul class="tg-list">
                                                <div class="toggle-side-label">No</div>
                                                <li class="tg-list-item">
                                                    <input class="tgl tgl-flat" id="cb1" name="reducedLunchEligibilityCheckbox"
                                                           type="checkbox"/>
                                                    <label class="tgl-btn" for="cb1"></label>
                                                </li>
                                                <div class="toggle-side-label">Yes</div>
                                            </ul>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="toggle-title">Permission Slip On File</div>
                                            <ul class="tg-list">
                                                <div class="toggle-side-label">No</div>
                                                <li class="tg-list-item">
                                                    <input class="tgl tgl-flat" id="cb2" name="permissionSlipCheckbox"
                                                           type="checkbox"/>
                                                    <label class="tgl-btn" for="cb2"></label>
                                                </li>
                                                <div class="toggle-side-label">Yes</div>
                                            </ul>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="toggle-title">Birth Certificate on
                                                File
                                            </div>
                                            <ul class="tg-list">
                                                <div class="toggle-side-label">No</div>
                                                <li class="tg-list-item">
                                                    <input class="tgl tgl-flat" id="cb3" name="birthCertificateCheckbox"
                                                           type="checkbox"/>
                                                    <label class="tgl-btn" for="cb3"></label>
                                                </li>
                                                <div class="toggle-side-label">Yes</div>
                                            </ul>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="toggle-title">Immediate Emotional Problem</div>
                                            <ul class="tg-list">
                                                <div class="toggle-side-label">No</div>
                                                <li class="tg-list-item">
                                                    <input class="tgl tgl-flat" id="cb4" value={$determinedValue}  name="iepCheckbox" type="checkbox"/>
                                                    <label class="tgl-btn" for="cb4"></label>
                                                </li>
                                                <div class="toggle-side-label">Yes</div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane" id="2">
                                    <div class="header">Add Allergy Info</div>

                                    <h4 class="heading"><i class="glyphicon glyphicon-alert"></i> Student Allergies</h4>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">


                                        <div class="col-lg-6">
                                            <label class="control-label" for="allergyName">Allergy Name:</label>
                                            <input id="allergyName" class="form-control" type="text" name="allergyName">
                                        </div>
                                        <div class="col-lg-6">
<!--                                            <label class="control-label" for="allergyType">Type:</label>-->
<!--                                            <input id="allergyType" class="form-control" type="text" name="allergyType">-->

<!--                                            <label class="switch">-->
<!--                                                <input name="permissionSlipCheckbox" type="checkbox" checked>-->
<!--                                                <span class="slider round"></span>-->
<!--                                            </label>-->

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-11">
                                            <label class="control-label" for="allergyNote">Note:</label>
                                            <input id="allergyNote" class="form-control" type="text" name="allergyNote">
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane" id="3">

                                    <h3>add clearfix to tab-content (see the css)</h3>

                                </div>

                            </div>

                        </div>
                    </form>

                    <div class="card-footer">
                        <div class="right-align">
                            <!--   Button trigger modal -->
                            <button id="buttonTrigger" type="button" class="btn btn-right btn-primary"
                                    data-toggle="modal" data-target="#exampleModalCenter">
                                Verify Info
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card">
                    <div class="card-body" id="modalBody">

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div class="right-align">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="newStudentForm" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>



<?php


if(isset($_POST['firstName'])) {
   echo "Fill out name";
}

if(isset($_POST['reducedLunchEligibilityCheckbox'])) {
    $_POST['reducedLunchEligibilityCheckbox'] = 1;
} else {
    $_POST['reducedLunchEligibilityCheckbox'] = 0;
}

if(isset($_POST['birthCertificateCheckbox'])) {
    $_POST['birthCertificateCheckbox'] = 1;
} else {
    $_POST['birthCertificateCheckbox'] = 0;
}

if(isset($_POST['iepCheckbox'])) {
    $_POST['iepCheckbox'] = 1;
} else {
    $_POST['iepCheckbox'] = 0;
}

include("../scripts/footer.php");
?>

<script>
    $(document).ready(function () {
        $('#buttonTrigger').click(function () {
            var x = document.getElementById("newStudentForm");

            var birthCertificateCheckbox = x[13];

            if (birthCertificateCheckbox.valid){

            }

            var txt = "";
            var i;
            for (i = 0; i < x.length; i++) {
//                txt = txt + x.elements[i].value + "<br>";
                var firstName = "First Name: " + x.elements[0].value + "<br>";
                var lastName = "Last Name: " + x.elements[1].value + "<br>";
                var middleName = "Middle Name: " + x.elements[2].value + "<br>";
                var suffix = "Suffix: " + x.elements[3].value + "<br>";
                var dob = "Date of Birth: " + x.elements[4].value + "<br>";
                var ethnicity = "Ethnicity: " + x.elements[5].value + "<br>";
                var gender = "Gender: " + x.elements[6].value + "<br>";
                var address = "Address: " + x.elements[7].value + "<br>";
                var city = "City: " + x.elements[8].value + "<br>";
                var state = "State: " + x.elements[9].value + "<br>";
                var zipCode = "Zip Code: " + x.elements[10].value + "<br>";
                var school = "School: " + x.elements[11].value + "<br>";
                var permissionSlip = "Permission Slip on File: " + x.elements[12].value + "<br>";
                var birthCertificate = "Birth Certificate on File: " + x.elements[13].value + "<br>";
                var reducedLunch = "Reduced Lunch Eligible: " + x.elements[14].value + "<br>";
                var emotionalProblems = "Immediate Emotional Problem: " + x.elements[15].value + "<br>";

                txt = firstName + lastName + middleName + suffix + dob + ethnicity + gender
                    + address + city + state + zipCode + school + permissionSlip + birthCertificate
                    + reducedLunch + emotionalProblems;
            }
            document.getElementById("modalBody").innerHTML = txt;
        });
    });

    console.log("checkbox");

    var checkbox = $( "checkbox" );
    checkbox.val( checkbox[0].checked ? 1 : 0 );
</script>


<!--<div class="col-sm-6">-->
<!--    <!-- Numeric Textfield with Floating Label -->-->
<!--    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">-->
<!--        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample4">-->
<!--        <label class="mdl-textfield__label" for="sample4">Number...</label>-->
<!--        <span class="mdl-textfield__error">Input is not a number!</span>-->
<!--    </div>-->
<!--</div>-->