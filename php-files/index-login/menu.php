<?php
    include("../scripts/header.php");
?>

<div class="container-fluid">
    <div class="card text-center">
        <div class="card-header">
            Message On If Attendance Was Taken Today
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
        <div class="card-footer text-muted align-content-center">

            <div class="nav nav-pills card-header-pills align-content-center">

                <div class="nav-item col-sm-4">

                    <a class="nav-link" href="../new/NewAttendanceProgramToSelect.php">
                        <i class="glyphicon glyphicon-plus"></i> Start New Record
                    </a>
                </div>

                <div class="nav-item col-sm-4">
                    <a class="nav-link" href="#">
                        <i class="glyphicon glyphicon-search"></i> Look Up
                    </a>
                </div>

                <div class="nav-item col-sm-4">
                    <a class="nav-link disabled" href="#">
                        <i class="glyphicon glyphicon-pencil"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include("../scripts/footer.php");
?>
