<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");
$programIdToSearch = $_POST['programId'];
$queryStudentsInProgram = "SELECT DISTINCT Student_To_Programs.Program_Id, Programs.Program_Name,
                            Student_To_Programs.Student_Id, Students.First_Name, Students.Last_Name FROM
                            (Student_To_Programs JOIN Students ON Student_To_Programs.Student_Id = Students.Id)
                            JOIN Programs ON Student_To_Programs.Program_Id = Programs.Id
                            WHERE Student_To_Programs.Program_Id = $programIdToSearch;";

$currentStudentsInProgram = mysqli_query($db, $queryStudentsInProgram);
$getInfo = mysqli_fetch_array($currentStudentsInProgram, MYSQLI_ASSOC);
$programName = $getInfo['Program_Name'];
?>

<link rel="stylesheet" href="../../css/attendance-table-styles.css" />
<link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">


<div class="attendance-container">
    <div class="attendance-title">
        <?php
            echo "<h2>$programName Attendance</h2>";
        ?>
    </div>

    <div class="card">
        <div>
            <!--Table-->
            <table class="table table-hover table-responsive">
                <!--Table head-->
                <thead>
                <tr>
                    <th>#</th>
                    <th class="left-column-title">Student Name</th>
                    <th class="centered-column-title">Present</th>
                    <th class="centered-column-title">Absent</th>
                    <th class="centered-column-title">Tardy</th>
                </tr>
                </thead>

                <tbody>
                <?php
                while ($row = mysqli_fetch_array($currentStudentsInProgram, MYSQLI_ASSOC)) {
                    $studentName = $row['First_Name'] . " " . $row['Last_Name'];
                    $studentId = mysqli_fetch_array($row['Student_Id'], MYSQLI_ASSOC);

                    echo "<tr><td>";
                    echo "";
                    echo "</td><td class='student-name-column'>";
                    echo $studentName;
                    echo "</td><td class='check-mark-column'>";
                    echo "
                    <section class=\"checkbox-wrapper\">
                        <form class=\"checkbox-form ac-checkmark\" autocomplete=\"off\">
                            <ul>
                                <li><input id=\"present-check-box\" name=\"present\" type=\"checkbox\"><label for=\"cb6\"></label></li>
                            </ul>
                        </form>
                    </section>";
                    echo "</td><td class='check-mark-column'>";
                    echo "
                    <section>
				        <form class=\"checkbox-form ac-checkbox ac-checkmark\" autocomplete=\"off\">
					        <ul>
						        <li><input id=\"absent-checkbox\" name=\"absent\" type=\"checkbox\"><label for=\"cb6\"></label></li>
					        </ul>
                        </form>
			        </section>
                ";
                    echo "</td><td class='check-mark-column'>";
                    echo "
                    <section class=\"checkbox-wrapper\">
                        <form class=\"checkbox-form\" autocomplete=\"off\">
                            <ul>
                                <li><input id=\"tardy-check-box\" name=\"tardy\" type=\"checkbox\"><label for=\"cb6\"></label></li>
                            </ul>
                        </form>
                    </section>";
                    echo "</td></tr>";
                }
                ?>
                </tbody>
            </table>

        </div>

    </div>

</div>




<script type="text/javascript">
    var table = document.getElementsByTagName('table')[0],
        rows = table.getElementsByTagName('tr'),
        text = 'textContent' in document ? 'textContent' : 'innerText';
    console.log(text);

    for (var i = 1, len = rows.length; i < len; i++){
        rows[i].children[0][text] = i + ".";
    }
</script>

<div id="showProgramInfo"></div>

<?php
include("../scripts/footer.php");
?>
