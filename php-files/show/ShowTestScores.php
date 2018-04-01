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
<script>
function FilterFields() {
// Declare variables
var input, filter, table, tr, td, i, show = false;
input = document.getElementById("searchInput");
filter = input.value.toUpperCase();
table = document.getElementById("test_scores");
tr = table.getElementsByTagName("tr");

// Loop through all table rows, and hide those who don't match the search query
for (i = 0; i < tr.length; i++) {
show = false;
for (j = 0; j < 14; j++) {
td = tr[i].getElementsByTagName("td")[j];
if (td) {
if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
tr[i].style.display = "";
show = true;
}
}
}
if(!show){
tr[i].style.display = "none";
}
}
}
</script>
<link rel="stylesheet" href="../../css/form-styles.css"/>
    <link rel="stylesheet" href="../../css/toggle-switch.css"/>
    <link rel="stylesheet" href="../../css/input-stylings.css"/>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<h1>Displaying All Test Scores:</h1>
<div class="col-lg">

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input id="searchInput" class="mdl-textfield__input" name="searchInput" onkeyup="return FilterFields();" type="text"/>
        <label class="mdl-textfield__label" for="searchInput">Search Test Scores</label>
    </div>
</div>
<br />

<div id="print_div">
    <table id="test_scores" class="table table-condensed table-striped">
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
