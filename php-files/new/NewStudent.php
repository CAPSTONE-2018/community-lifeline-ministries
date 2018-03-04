<?php
include("../scripts/header.php");
?>

<div id="form_wrapper">

    <form class="form-horizontal" action="../add/AddStudent.php" method="POST" id="newStudentForm">

        <h1>Add Student Information:</h1>
        <br/>

        <div class="row">

            <div class="form-group">
                <div class="col-lg-6">
                    <label class="control-label" for="firstName">First Name:</label>
                    <input id="firstName" class="form-control" placeholder="First" type="text" name="firstName">
                </div>
                <div class="col-lg-6">
                    <label class="control-label" for="lastName">Last Name:</label>
                    <input id="lastName" class="form-control" placeholder="Last" type="text" name="lastName">
                </div>
            </div>
        </div>
        <div class="row">

            <div class="form-group">
                <div class="col-lg-6">
                    <label class="control-label" for="middleName">Middle Name:</label>
                    <input id="middleName" class="form-control" placeholder="Middle Name" type="text" name="middleName">
                </div>
                <div class="col-lg-6">
                    <label class="control-label" for="suffix">Suffix:</label>
                    <input id="suffix" class="form-control" placeholder="Suffix" type="text" name="suffix">
                </div>
            </div>
        </div>


        <div class="row">

            <div class="form-group">
                <div class="col-lg-4">
                    <label class="control-label" for="dob">Date of Birth:</label>
                    <input id="dob" class="form-control" placeholder="YYYY/MM/DD" type="text" name="dob">
                </div>
                <div class="col-lg-4">
                    <label class="control-label" for="ethnic">Ethnicity:</label>
                    <input id="ethnic" class="form-control" placeholder="Ethnicity" type="text" name="ethnicity">
                </div>
                <div class="col-lg-4">
                    <label class="control-label" for="gender">Gender:</label>
                    <select id="gender" class="form-control" name="gender">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-3">
                    <label class="control-label" for="studentAddress">Address:</label>
                    <input id="studentAddress" class="form-control" placeholder="Address" type="text" name="address">
                </div>
                <div class="col-lg-3">
                    <label class="control-label" for="studentCity">City:</label>
                    <input id="studentCity" class="form-control" placeholder="City" type="text" name="city">
                </div>
                <div class="col-lg-3">
                    <!--<label class="control-label" for="sstate">State:</label>
                    <input id="sstate" class="form-control" placeholder="State" type="text" name="state">-->
                    <label class="control-label" for="state">State:</label>
                    <?php
                    include("../scripts/States.php");
                    echo stateDropdown()
                    ?>

                </div>
                <div class="col-lg-3">
                    <label class="control-label" for="studentZip">Zip Code:</label>
                    <input id="studentZip" class="form-control" placeholder="Zip Code" type="text" name="zip">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-8">
                    <label class="control-label" for="studentSchool">School:</label>
                    <input id="studentSchool" class="form-control" placeholder="School" type="text" name="school">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-3">
                    <label class="control-label" for="permissionSlip">Permission Slip on File:</label>
                    <select id="permissionSlip" class="form-control" name="permissionSlip">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="col-lg-3">
                    <label class="control-label" for="birthCertificate">Birth Certificate on File:</label>
                    <select id="birthCertificate" class="form-control" name="birthCertificate">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="col-lg-3">
                    <label class="control-label" for="reducedLunchEligibility">Reduced Lunch Eligible:</label>
                    <select id="reducedLunchEligibility" class="form-control" name="reducedLunchEligibility">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="col-lg-3">
                    <label class="control-label" for="siep">Immediate Emotional Problem:</label>
                    <select id="siep" class="form-control" name="iep">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
        </div>
        <br/>
        <h1>Allergies:</h1>
        <br/>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <label class="control-label" for="allergyName">Allergy Name:</label>
                    <input id="allergyName" class="form-control" placeholder="Allergy Name" type="text" name="allergyName">
                </div>
                <div class="col-lg-6">
                    <label class="control-label" for="allergyType">Type:</label>
                    <input id="allergyType" class="form-control" placeholder="Allergy Type" type="text" name="allergyType">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-11">
                    <label class="control-label" for="allergyNote">Note:</label>
                    <input id="allergyNote" class="form-control" placeholder="Allergy Note" type="text" name="allergyNote">
                </div>
            </div>
        </div>





        <!-- Button trigger modal -->
        <button id="buttonTrigger" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="modalBody" class="modal-body">

                    </div>
                    <div class="modal-footer">
<!--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                        <button type="button" class="btn btn-primary">Save changes</button>-->
                        <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Submit"><br><br>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
include("../scripts/footer.php");
?>

<script>
    $(document).ready(function () {
        $('#buttonTrigger').click(function () {
            var x = document.getElementById("newStudentForm");
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



//            $.ajax({
//                url:"../scripts/AjaxUpdateAllergies.php",
//                method:"POST",
//                data:{allergyId:allergyId},
//                success:function (output) {
//                    $('#showAllergyInfo').html(output);
//                }
//            });


        });
    });
</script>
