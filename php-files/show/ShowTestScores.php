<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");

//Getting the query to search if the username and password are correct in the database
//Do not need prepared statements because there is NO user input for this query so there can be no sql injection attack
$query = "SELECT * FROM Student_To_Test_Scores;";
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
            echo $row['Student_Id'];
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
