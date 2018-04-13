<?php
include("../scripts/header.php");
//connect to database
include("../../db/config.php");
$query = "SELECT DISTINCT * FROM Students WHERE Active_Student = 1 ORDER BY Last_Name, First_Name;";
$studentsResult = mysqli_query($db, $query);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#studentContactInfo" data-toggle="tab">Contact Info: </a>
                            </li>
                            <li>
                                <a href="#contactToStudent" data-toggle="tab">Guardian For: </a>
                            </li>
                    </div>

                    <form class="form-horizontal" action="../add/AddContact.php"  method="POST" name="newStudentContactForm" id="newStudentContactForm">
                        <div class="form-content">
                            <div class="tab-content">
                                <div class="tab-pane active" id="studentContactInfo">
                                    <div class="header">Guardian Info</div>

                                    <h4 class="heading"><i class="fa fa-user"></i> Personal Info</h4>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <label class="control-label" for="contactPrefix">Prefix:</label>
                                            <select id="contactPrefix" class="form-control" name="contactPrefix">
                                                <option value="Mr.">Mr.</option>
                                                <option value="Ms.">Ms.</option>
                                                <option value="Mrs.">Mrs.</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-5">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="contactFirstName" class="mdl-textfield__input"
                                                       name="contactFirstName" type="text"/>
                                                <label class="mdl-textfield__label" for="contactFirstName">First Name</label>
                                                <span class="mdl-textfield__error">First Name is Required</span>
                                            </div>
                                        </div>

                                        <div class="col-sm-5">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="contactLastName" class="mdl-textfield__input" name="contactLastName"
                                                       type="text"/>
                                                <label class="mdl-textfield__label" for="contactLastName">Last Name</label>
                                                <span class="mdl-textfield__error">Last Name is Required</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="primaryPhone" class="mdl-textfield__input"
                                                       name="primaryPhone" type="text"/>
                                                <label class="mdl-textfield__label" for="primaryPhone">Primary Phone</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="secondaryPhone" class="mdl-textfield__input" name="secondaryPhone"
                                                       type="text"/>
                                                <label class="mdl-textfield__label" for="secondaryPhone">Secondary Phone</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="contactEmail" class="mdl-textfield__input" name="contactEmail"
                                                       type="text"/>
                                                <label class="mdl-textfield__label" for="contactEmail">Email</label>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="heading"><i class="fa fa-home"></i> Address</h4>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="contactAddressOne" class="mdl-textfield__input"
                                                       name="contactAddressOne" type="text"/>
                                                <label class="mdl-textfield__label"
                                                       for="contactAddressOne">Address</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="contactAddressTwo" class="mdl-textfield__input"
                                                       name="contactAddressTwo" type="text"/>
                                                <label class="mdl-textfield__label"
                                                       for="contactAddressTwo">Apt/Suite</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">

                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="contactCity" class="mdl-textfield__input" name="contactCity"
                                                       type="text"/>
                                                <label class="mdl-textfield__label" for="contactCity">City</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" value="" class="mdl-textfield__input"
                                                       id="studentState" readonly>
                                                <input type="hidden" value="" name="studentState">
                                                <i class="mdl-icon-toggle__label fa fa-caret-down"></i>
                                                <label for="studentState" class="mdl-textfield__label">State</label>
                                                <ul id="studentState"
                                                    class="overflow mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                    <?php include("../scripts/States.php");
                                                    echo stateDropdown("contactState")
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">

                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="contactZip" class="mdl-textfield__input" name="contactZip"
                                                       type="text"/>
                                                <label class="mdl-textfield__label" for="contactZip">Zip Code</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!--Student Guardian Tab-->
                                <div class="tab-pane" id="contactToStudent">
                                    <div class="header">Student to Guardian</div>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" class="mdl-textfield__input" id="student" readonly>
                                                <input type="hidden" name="student">
                                                <i class="mdl-icon-toggle__label fa fa-sort-down"></i>
                                                <label for="student" class="mdl-textfield__label">Student</label>
                                                <ul for="medicalConcernType" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                    <?php
                                                    while ($studentsRow = mysqli_fetch_assoc($studentsResult)) {
                                                        $studentId = $studentsRow['Id'];
                                                        $studentNameInDropDown = $studentsRow['First_Name'] . ' ' . $studentsRow['Last_Name'];
                                                        echo "<li class='mdl-menu__item' data-val='" . $studentsRow['Id'] . "' value=" . $studentsRow['Id'] . ">" . $studentNameInDropDown . "</li>";
                                                    }

                                                    ?>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="relationToStudent" class="mdl-textfield__input"
                                                       name="relationToStudent" type="text"/>
                                                <label class="mdl-textfield__label"
                                                       for="relationToStudent">Relation to Student</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="new-student-contact-layer"></div>
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
            x
            <div class="modal-footer">
                <div class="right-align">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="formSubmitButton" form="newStudentContactForm" class="btn btn-primary">Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("../scripts/footer.php") ?>
