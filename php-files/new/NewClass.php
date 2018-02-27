<?php

include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$query = "SELECT * FROM Volunteer_Employees ORDER BY Last_Name, First_Name;";
$result = mysqli_query($db, $query);
?>

<div class="container">
    <div id="form_wrapper">
        <form class="form-horizontal" action="../add/AddClass.php" method="POST" id="form2">
            <h1>Add Class Information:</h1>
            <br/>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-4">
                        <label class="control-label" for="name">Class Name:</label>
                        <input id="name" class="form-control" placeholder="Class Name" type="text" name="name" autofocus required>
                    </div>
                </div>
            </div>

            <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Submit"><br><br>
        </form>
    </div>
</div>
<?php include("../scripts/footer.php"); ?>
