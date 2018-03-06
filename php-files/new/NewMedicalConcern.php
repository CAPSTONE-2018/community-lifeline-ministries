<?php

include("../scripts/header.php");

//connect to database
include("../../db/config.php");

?>

<div class="container">
    <div id="form_wrapper">
        <form class="form-horizontal" action="../add/AddMedicalConcern.php" method="POST" id="form2">
            <h1>Allergies:</h1>
            <br/>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <label class="control-label" for="allergyName">Allergy Name:</label>
                        <input id="allergyName" class="form-control" placeholder="Allergy Name" type="text"
                               name="allergyName">
                    </div>
                    <div class="col-lg-6">
                        <label class="control-label" for="allergyType">Type:</label>
                        <input id="allergyType" class="form-control" placeholder="Allergy Type" type="text"
                               name="allergyType">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-11">

                        <label class="control-label" for="allergyNote">Note:</label>
                        <textarea id="allergyNote" class="form-control" placeholder="Allergy Note" name="allergyNote"
                                  rows="4" cols="50">
                        </textarea>
                    </div>
                </div>
            </div>
            <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Submit"><br><br>
        </form>
    </div>
</div>
<?php include("../scripts/footer.php"); ?>
