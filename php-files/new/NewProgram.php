<?php

include("../scripts/header.php");

//connect to database
include("../../db/config.php");


$query = "SELECT * FROM Volunteer_Employees ORDER BY Last_Name, First_Name;";
$result = mysqli_query($db, $query);
?>

<div class="container">
    <div id="form_wrapper">
        <form class="form-horizontal" id="newProgramForm">
            <h1>Add Program Information:</h1>
            <br/>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <label class="control-label" for="name">Program Name:</label>
                        <input id="programName" class="form-control" placeholder="Program Name" type="text" name="name">
                    </div>

                    <div class="col-lg-6">

                        <label class="control-label" for="activeFlag">Active Contact?</label>
                        <select id="activeFlag" class="form-control" name="activeFlag">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>

                    </div>
                </div>
            </div>
            <input id="submitButton" onclick="validateProgramName()" class="btn btn-primary btn-lg btn-block" type="button" value="Heres My Value"><br><br>
        </form>
    </div>
</div>
<script type="text/javascript" src="../../js/modals/ValidateEntriesModal.js"></script>

<script type="text/javascript">
    function validateProgramName() {
        var programName = document.getElementById("programName").value;
        var submissionType = "Program";
        $.ajax({
            url: "../add/AddProgram.php",
            method: "POST",
            data: {programName: programName},
            success: function (data) {
                if (data == 1) {
                    launchDuplicateEntryModal(programName, submissionType);
                } else if (data == 001) {
                    alert("something went wrong with the database");
                } else if (data == 0) {
                    launchSuccessfulEntryModal(programName, submissionType);
                }
            }
        });
    }
</script>

<?php include("../scripts/footer.php"); ?>
