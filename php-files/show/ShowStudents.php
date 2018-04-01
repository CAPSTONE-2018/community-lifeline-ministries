<?php
    include("../scripts/header.php");

    //connect to database
    include("../../db/config.php");

    $query = "SELECT * FROM Students;";
    $result = mysqli_query($db, $query);
?>


<div class="container-fluid print_div">
    <div class="card">
        <div class="card-header">
            <h3>Displaying All Students:</h3>
        </div>

        <div class="card-body">
            <div class="card-content">


                <form class="form-horizontal" method="POST" action="../add/AddAttendanceRecord.php" name="newAttendanceRecordForm" id="newAttendanceRecordForm">

                    <input type='hidden' name='attendanceDate' value='<?php echo $dateToSubmit; ?>'/>
                    <table id="attendance-table" class="table table-condensed table-hover table-responsive">
                        <thead>

                        <tr>
                            <th>#</th>
                            <th class="left-column-title">Student Name</th>
                            <th class="centered-column-title">Program</th>
                            <th class="centered-column-title">Absent</th>
                            <th class="centered-column-title">Tardy</th>
                            <th class="centered-column-title">Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($currentStudentsInProgram, MYSQLI_ASSOC)) {
                            $dynamicRowId++;
                            $firstRowId = md5(uniqid(rand(), true));
                            $secondRowId = md5(uniqid(rand(), true));
                            $thirdRowId = md5(uniqid(rand(), true));

                            $programId = $row['Program_Id'];
                            $studentIdToSearch = $row['Student_Id'];
                            $studentName = $row['First_Name'] . " " . $row['Last_Name'];

                            echo "<tr class='number-row'>
                                    <td></td> 
                                    <td class='student-name-column'>
                                        $studentName
                                    </td>
                                    <td class='hidden-row'>
                                        <input type='hidden' name='studentId[$dynamicRowId]' value=$studentIdToSearch />
                                        <input type='hidden' name='programId[$dynamicRowId]' value=$programId />
                                    </td>                                    
                                    <td class='radio-input-wrapper check-mark-column'>
                                        <label class='radio-label' for='radio$firstRowId'>
                                            <input type='radio' name='attendanceCheckbox[$dynamicRowId]' value='1' id='radio$firstRowId' />
                                            <span class='custom-check-mark green-check'></span>
                                        </label>
                                    </td>
                                    
                                    <td class='radio-input-wrapper check-mark-column'>
                                        <label class='radio-label' for='radio$secondRowId'>
                                            <input class='hover-checkbox' type='radio' name='attendanceCheckbox[$dynamicRowId]' value='2' id='radio$secondRowId' />
                                            <span class='custom-check-mark red-check'></span>
                                        </label>
                                    </td>
                                    
                                    <td class='radio-input-wrapper check-mark-column'>
                                        <label class='radio-label' for='radio$thirdRowId'>
                                            <input type='radio' name='attendanceCheckbox[$dynamicRowId]' value='3' id='radio$thirdRowId' />
                                            <span class='custom-check-mark blue-check'></span>
                                        </label>
                                    </td>

                                    
                                    <td class='check-mark-column'>
                                        <button type='button' data-toggle='collapse' data-target='.collapseRow$dynamicRowId' aria-expanded='false' aria-controls='collapseRow$dynamicRowId' class='student-info-button'><i class=\"glyphicon glyphicon-earphone\"></i>Contact</button>                         
                                    </td>
                                </tr>";
                            $studentIdToSearch = $row['Student_Id'];
                            $queryForContacts = "SELECT Contacts.First_Name, Contacts.Last_Name, Contacts.Primary_Phone
                                  FROM Student_To_Contacts JOIN Contacts On Student_To_Contacts.Contact_Id = Contacts.Id WHERE Student_Id = $studentIdToSearch";
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
                                    
                                </tr>
                                
                                ";
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </form>























                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>Suffix</th>
                        <th>Gender</th>
                        <th>Birth Date</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Ethnicity</th>
                        <th>School</th>
                        <th>Permission Slip</th>
                        <th>Birth Certificate</th>
                        <th>Reduced Lunch Eligible</th>
                        <th>IEP</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<tr><td>";
                        echo $row['Id'];
                        echo "</td><td>";
                        echo $row['First_Name'];
                        echo "</td><td>";
                        echo $row['Last_Name'];
                        echo "</td><td>";
                        echo $row['Middle_Name'];
                        echo "</td><td>";
                        echo $row['Suffix'];
                        echo "</td><td>";
                        echo $row['Gender'];
                        echo "</td><td>";
                        echo $row['Birth_Date'];
                        echo "</td><td>";
                        echo $row['Address'];
                        echo "</td><td>";
                        echo $row['City'];
                        echo "</td><td>";
                        echo $row['State'];
                        echo "</td><td>";
                        echo $row['Zip'];
                        echo "</td><td>";
                        echo $row['Ethnicity'];
                        echo "</td><td>";
                        echo $row['School'];
                        echo "</td><td>";

                        if ($row['Permission_Slip'] == 1){
                            echo "Yes";
                        } else if ($row['Permission_Slip'] == 0){
                            echo "No";
                        }

                        echo "</td><td>";

                        if ($row['Birth_Certificate'] == 1){
                            echo "Yes";
                        } else if ($row['Birth_Certificate'] == 0){
                            echo "No";
                        }
                        echo "</td><td>";

                        if ($row['Reduced_Lunch_Eligible'] == 1){
                            echo "Yes";
                        } else if ($row['Reduced_Lunch_Eligible'] == 0){
                            echo "No";
                        }

                        echo "</td><td>";

                        if ($row['IEP'] == 1){
                            echo "Yes";
                        } else if ($row['IEP'] == 0){
                            echo "No";
                        }
                        echo "</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print" />
<script src="../../scripts/print.js"></script>
<?php
  include("../scripts/footer.php");
?>
