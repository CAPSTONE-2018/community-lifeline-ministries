<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$query = "SELECT Students.First_Name, Students.Last_Name, 
            Student_To_Test_Scores.Student_Id, 
            Student_To_Test_Scores.School_Year, 
            Student_To_Test_Scores.Pre_Test,
            Student_To_Test_Scores.Term,
            Student_To_Test_Scores.Post_Test 
            FROM Student_To_Test_Scores 
            JOIN Students ON Student_To_Test_Scores.Student_Id = Students.Id;";

$result = mysqli_query($db, $query);
?>

<h1>Displaying All Test Scores:</h1>
<br />

<div id="print_div">
    <table class="table table-condensed table-striped">
        <thead>
        <tr>
            <th>Student Id</th>
            <th>School Year</th>
            <th>Term</th>
            <th>Pre Test</th>
            <th>Post Test</th>
        </tr>
        </thead>

        <tbody>
        <?php
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<tr><td>";
            echo $row['First_Name'];
            echo "</td><td>";
            echo $row['School_Year'];
            echo "</td><td>";
            echo $row['Term'];
            echo "</td><td>";
            echo $row['Pre_Test'];
            echo "</td><td>";
            echo $row['Post_Test'];
            echo "</td></tr>";

        }
        ?>
        </tbody>
    </table>
</div>

<input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print" />
<script src="../../scripts/print.js"></script>
<?php
include("../scripts/footer.php");
?>
