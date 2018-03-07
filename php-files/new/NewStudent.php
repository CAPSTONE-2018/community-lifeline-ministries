<?php
include("../scripts/header.php");
?>
<link rel="stylesheet" href="../../css/form-styles.css"/>
<link rel="stylesheet" href="../../css/toggle-switch.css"/>

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
                                            <label>
                                                <input id="firstName" class="form-control" type="text" name="firstName"
                                                       autofocus required/>
                                                <div class="label-text">First Name</div>
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>
                                                <input id="lastName" class="form-control" type="text" name="lastName"
                                                       aria-invalid="false" required/>
                                                <div class="label-text">Last Name</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label>
                                                <input id="middleName" class="form-control" type="text"
                                                       name="middleName" required/>
                                                <div class="label-text">Middle Name</div>
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>
                                                <input id="suffix" class="form-control" type="text" name="suffix"
                                                       required/>
                                                <div class="label-text">Suffix</div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>
                                                <input id="dob" class="form-control" type="text" name="dob" required/>
                                                <div class="label-text">DOB</div>
                                            </label>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>
                                                <input id="ethnic" class="form-control" type="text" name="ethnicity"
                                                       required/>
                                                <div class="label-text">Ethnicity</div>
                                            </label>
                                        </div>
                                        <div class="col-sm-4">
                                            <select id="gender" class="form-control" name="gender" required/>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <h4 class="heading"><i class="glyphicon glyphicon-home"></i> Address</h4>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label>
                                                <input id="studentAddressOne" class="form-control" type="text" name="addressOne" required/>
                                                <div class="label-text">Address</div>
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>
                                                <input id="studentAddressTwo" class="form-control" type="text" name="addressTwo" required/>
                                                <div class="label-text">Apt/Suite</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>
                                                <input id="studentCity" class="form-control" type="text" name="city" required/>
                                                <div class="label-text">City</div>
                                            </label>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="control-label" for="state">State:</label>
                                            <?php
                                            include("../scripts/States.php");
                                            echo stateDropdown()
                                            ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>
                                                <input id="studentZip" class="form-control" type="text" name="zip" required/>
                                                <div class="label-text">Zip</div>
                                            </label>
                                        </div>
                                    </div>

                                    <h4 class="heading"><i class="glyphicon glyphicon-file"></i> Documents</h4>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">
                                        <div class="col-lg">
                                            <input id="studentSchool" class="form-control" placeholder="School"
                                                   type="text"
                                                   name="school">
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
                                            <label class="control-label" for="allergyType">Type:</label>
                                            <input id="allergyType" class="form-control" type="text" name="allergyType">
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

if(isset($_POST['permissionSlipCheckbox'])) {
   $determinedValue = 1;
} else {
    $_POST['permissionSlipCheckbox'] = 0;
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
