<?php

include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$query = "SELECT * FROM Medical_Concerns;";
$result = mysqli_query($db, $query);
?>
<h1>Displaying All Medical Concerns:</h1>
<div class="col-lg">

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input id="searchInput" class="mdl-textfield__input" name="searchInput" onkeyup="FilterFields();"
               type="text"/>
        <label class="mdl-textfield__label" for="searchInput">Search Medical Conditions</label>
    </div>
</div>
<br/>

<div id="print_div" class="table-wrapper">
    <table id="allergy-table" class="table table-condensed table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Note</th>
            <th>Students Affected</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $search = $row['Id'];
            $studentToAllergyQuery = ("SELECT COUNT(Medical_Concern_Id) from Student_To_Medical_Concerns Where Medical_Concern_Id = $search;");
            $rs = mysqli_query($db, $studentToAllergyQuery);
            $result2 = mysqli_fetch_array($rs);

            echo "<tr><td>";
            echo $row['Id'];
            echo "</td><td>";
            echo $row['NAME'];
            echo "</td><td>";
            echo $row['Note'];
            echo "</td><td>";
            echo "$result2[0]";
            echo "</td><td>";
            echo "<button class='table-update-button' type='button' value='$search' >Update</button>";
        }
        ?>
        </tbody>
    </table>
</div>
<input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print"/>
<input type="button" id="show-all-button" class="btn btn-primary pull-right" value="Show All"/>

<script src="../../scripts/print.js"></script>

<div id="show-medical-info"></div>
<?php
include("../scripts/footer.php");
?>


<script>
    $('#show-all-button').on('click', function (e) {
        $('.table-wrapper').slideDown();
        $('#show-all-button').hide();
        $('#show-medical-info').slideUp();
        e.preventDefault();
    });

    $(document).ready(function () {
        $('.table-update-button').click(function () {
            var medicalConcernId = $(this).attr('value');
            $.ajax({
                url: "../scripts/AjaxUpdateMedicalConcerns.php",
                method: "POST",
                data: {medicalConcernId: medicalConcernId},
                success: function (output) {
                    $('#show-medical-info').slideDown().html(output);
                    $('#show-all-button').show();
                    $('.table-wrapper').slideUp();
                }
            })
        });
    });
</script>
