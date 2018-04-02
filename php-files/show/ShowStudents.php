<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$queryForStudentsAndPrograms = "SELECT DISTINCT Students.Id, Students.First_Name, Students.Last_Name, Students.Permission_Slip, Students.Birth_Certificate,
        Students.Reduced_Lunch_Eligible, Students.IEP, Programs.Program_Name FROM
  (Students JOIN Student_To_Programs ON Students.Id = Student_To_Programs.Student_Id)
  JOIN Programs ON Programs.Id = Student_To_Programs.Program_Id;";

$query = "SELECT * FROM Students;";
$studentResults = mysqli_query($db, $queryForStudentsAndPrograms);
$dynamicRowId = 0;
?>
<link type="text/css" href="../../css/table-styles.css" />
<div class="container-fluid print_div">
    <div class="card">
        <div class="card-header">
            <h3>Displaying All Students:</h3>
        </div>
        <div class="card-body">
            <div class="card-content">
                <form class="form-horizontal" method="POST" action="#" name="allStudentsTable"
                      id="allStudentsTable">
                    <table id="attendance-table" class="table table-condensed table-hover table-responsive">
                        <thead>
                        <tr>
                            <th class="col-sm-1">#</th>
                            <th class="col-sm-3">Student Name</th>
                            <th class="col-sm-3 centered-column">Program</th>
                            <th class="col-sm-3 centered-column">All Docs On File</th>
                            <th class="col-sm-2 ">Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($studentResults, MYSQLI_ASSOC)) {
                            $dynamicRowId++;
                            $programName = $row['Program_Name'];
                            $studentIdToSearch = $row['Id'];
                            $studentName = $row['First_Name'] . " " . $row['Last_Name'];

                            echo "<tr class='number-row'>
                                    <td class='col-sm-1 align-middle'></td> 
                                    <td class='col-sm-3 align-middle'>$studentName</td>
                                    <td class='hidden align-middle'>
                                        <input type='hidden' name='studentId[$dynamicRowId]' value=$studentIdToSearch />
                                        <input type='hidden' name='programId[$dynamicRowId]' value=$programId />
                                    </td>                                    
                                    <td class='col-sm-3'>
                                    hello
                                    </td>
                                    
                                    <td class='col-sm-3'>
                                        hello
                                    </td>
                                    
                                    <td class='col-sm-2'>
                                        <button type='button' data-toggle='collapse' data-target='.collapseRow$dynamicRowId' aria-expanded='false' aria-controls='collapseRow$dynamicRowId' class='student-info-button'><i class='glyphicon glyphicon-earphone'></i>Contact</button>
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
                </form>
            </div>

            <div class="card-footer">
                <div>
                    <button id="submitAttendance" form="editAttendanceRecordForm" type="submit"
                            class="btn btn-right btn-primary">
                        Submit
                    </button>
                </div>
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
