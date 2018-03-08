<?php

include("../scripts/header.php");

//connect to database
include("../../db/config.php");

?>

<div class="container">
    <div id="form_wrapper">
        <form class="form-horizontal" action="../add/AddMedicalConcern.php" method="POST" id="form2">
            <h1>Medical Concerns:</h1>
            <br/>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <label class="control-label" for="medicalConcernName">Name:</label>
                        <input id="medicalConcernName" class="form-control" placeholder="Name" type="text"
                               name="name">
                    </div>
                    <div class="col-lg-6">
                        <label class="control-label" for="medicalConcernType">Type:</label>
                        <input id="medicalConcernType" class="form-control" placeholder="Type" type="text"
                               name="type">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-11">

                        <label class="control-label" for="medicalConcernNote">Note:</label>
                        <textarea id="medicalConcernNote" class="form-control" placeholder="Note" name="note"
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