<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$queryForAllActiveStudents = "SELECT * FROM Students WHERE Active_Student = 1";
$queryForAllInactiveStudents = "SELECT * FROM Students WHERE Active_Student = 0";

$queryForStudentsAndEnrolledPrograms = "SELECT Students.First_Name, Students.Last_Name, Students.Id, COUNT(Student_To_Programs.Program_Id) AS Enrolled_Programs FROM
  Students JOIN Student_To_Programs ON Students.Id = Student_To_Programs.Student_Id GROUP BY Students.Id;";

$activeStudentResults = mysqli_query($db, $queryForAllActiveStudents);
$inactiveStudentResults = mysqli_query($db, $queryForAllInactiveStudents);
$enrolledProgramResults = mysqli_query($db, $queryForStudentsAndEnrolledPrograms);
$dynamicRowId = 0;
?>


<link rel="stylesheet" href="/node_modules/material-design-lite/material.min.css">
<script src="/node_modules/material-design-lite/material.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


<link rel="stylesheet" href="../../css/show-all-students-styles.css"/>
<div class="print_div">
    <div class="card">
        <div class="card-header">
            <h3>Displaying All Students:</h3>
        </div>
        <div class="card-body">
            <div class="card-content">
                <form class="form-horizontal" method="POST" action="#" name="allStudentsTable"
                      id="allStudentsTable">
                    <div class="table-responsive">
                        <table id="all-students-table" class="table table-striped table-condensed table-hover">
                            <thead>
                            <tr>
                                <th class="col-sm-1">#</th>
                                <th class="col-sm-3">Student Name</th>
                                <th class="col-sm-2 text-center">Program</th>
                                <th class="col-sm-1 text-center">All Docs On File</th>
                                <th class="col-sm-5 text-center">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            while ($activeStudentsRow = mysqli_fetch_array($activeStudentResults, MYSQLI_ASSOC)) {
                                $dynamicRowId++;
                                $studentIdToSearch = $activeStudentsRow['Id'];
                                $studentName = $activeStudentsRow['First_Name'] . " " . $activeStudentsRow['Last_Name'];

                                echo "<tr class='number-row'>
                                    <td class='col-sm-1 align-middle'></td> 
                                    <td class='col-sm-3 align-middle'>$studentName</td>
                                    <td class='hidden align-middle'>
                                        <input type='hidden' name='studentId[$dynamicRowId]' value=$studentIdToSearch />
                                        <input type='hidden' name='programId[$dynamicRowId]' value=$programId />
                                    </td>                                    
                                    <td class='col-sm-2 align-middle text-center text-align-middle'>
                                    hello
                                    </td>
                                    
                                    <td class='col-sm-1 align-middle text-center'>
                                        hello
                                    </td>
                                    
                                    <td class='col-5'>
                                        <div class='left-action-buttons-container d-inline m-auto'>
                                           <div class=' d-inline'>
                                                <button type='button' class='btn large-action-buttons edit-student-button'><i class='fa fa-pencil'></i> Edit</button>
                                            </div>
                                            
                                            <div class='d-inline'>
                                                <button type='button' class='btn large-action-buttons delete-student-button'><i class='fa fa-trash-o'></i>Delete</button>
                                            </div>
                                            </div>
                                            
                                            <div class='right-action-buttons-container d-inline'>
                                            
                                                <span title='Student Contacts' data-toggle='tooltip' class='small-action-buttons'>
                                                    <button type='button'  class='btn small-action-buttons student-contact-button' data-toggle='collapse' data-target='.collapseRow$dynamicRowId'><i class='fa fa-phone'></i></button>
                                                </span>
                                                
                                                <span title='Student Allergies' data-toggle='tooltip' class='small-action-buttons'>
                                                    <button type='button' class='btn small-action-buttons view-allergies-button'><i class='fa fa-bullhorn'></i></button>
                                                </span>
                                                
                                                <span title='Test Scores' data-toggle='tooltip' class='small-action-buttons'>
                                                    <button type='button' class='btn small-action-buttons test-scores-button'><i class='fa fa-bar-chart'></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>";
//                            $studentIdToSearch = $row['Student_Id'];
                                $queryForContacts = "SELECT Contacts.First_Name, Contacts.Last_Name, Contacts.Primary_Phone
                                  FROM Student_To_Contacts JOIN Contacts On Student_To_Contacts.Contact_Id = Contacts.Id WHERE Student_Id = $studentIdToSearch;";
                                $currentContactForStudent = mysqli_query($db, $queryForContacts);
                                while ($contactRow = mysqli_fetch_array($currentContactForStudent, MYSQLI_ASSOC)) {
                                    $contactName = $contactRow['First_Name'] . " " . $contactRow['Last_Name'];
                                    $contactPhone = $contactRow['Primary_Phone'];
                                    echo "
                                    <tr class='collapse smooth collapseRow$dynamicRowId'>
                                    <td></td>
                                    <td colspan='12'>
                                        <span class='hidden-row-width'><i class='glyphicon glyphicon-user'></i> $contactName</span>
                                        <span class='hidden-row-width'><i class='glyphicon glyphicon-earphone'></i> $contactPhone</span>
                                    </td>
                                </tr>";
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="card-footer">
            </div>
        </div>
    </div>
</div>


<input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print"/>
<script src="../../scripts/print.js"></script>

<script type="text/javascript">
    var table = document.getElementsByTagName('table')[0],
        rows = table.getElementsByClassName('number-row'),
        text = 'textContent' in document ? 'textContent' : 'innerText';
    for (var i = 0, len = rows.length; i < len; i++) {
        var numberToDisplay = i + 1;
        rows[i].children[0][text] = numberToDisplay + ".";
    }
</script>
<?php
include("../scripts/footer.php");
?>