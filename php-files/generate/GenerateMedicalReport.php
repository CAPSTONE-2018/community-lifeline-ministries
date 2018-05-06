<?php

//connect to database
include("../../db/config.php");

$searchFilters = $_POST['searchFilters'];

echo $searchFilters;

$medicalResults = mysqli_query($db, "SELECT * FROM Medical_Concern_Types " . $searchFilters);
?>
<div id="print_div">
    <div class="card-body">
        <div class="card-content">
            <form method="POST" action="#" name="allStudentsTable"
                  id="allStudentsTable">
                <div class="table-responsive col-sm-12">
                    <thead>
                    <table id="test" class="table">
                        <thead class="thead-dark">

                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Note</th>
                            <th scope="col">Students Affects</th>
                            <?php
                            while ($row = mysqli_fetch_array($medicalResults, MYSQLI_ASSOC)) {

                                $search = $row['Id'];
                                $studentToAllergyQuery = ("SELECT COUNT(Medical_Type_Id) from Student_To_Medical_Concerns JOIN Students ON Students.Id = Student_To_Medical_Concerns.Student_Id WHERE Students.Active_Student = 1 AND Medical_Type_Id = $search;");
                                $rs = mysqli_query($db, $studentToAllergyQuery);
                                $result2 = mysqli_fetch_array($rs);

                                echo "<tr scope=\"row\"><td>";
                                echo $row['Id'];
                                echo "</td><td>";
                                echo $row['Type_Name'];
                                echo "</td><td>";
                                echo $row['Note'];
                                echo "</td><td>";
                                echo "$result2[0]";
                                echo "</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        <div class="card-footer">

        </div>
        <script type="text/javascript">
            $('#test').DataTable({
                dom: '<lf<t>iBp>',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });
        </script>
    </div>
</div>
</div>

</div>
