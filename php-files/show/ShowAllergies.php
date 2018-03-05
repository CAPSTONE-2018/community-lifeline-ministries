<?php

include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$query = "SELECT * FROM Allergies;";
$result = mysqli_query($db, $query);
?>

<h1>Displaying All Allergies:</h1>
<br/>

<div id="print_div" class="table-wrapper">
    <table id="allergy-table" class="table table-condensed table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Allergy Name</th>
            <th>Allergy Type</th>
            <th>Students Affected</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $search = $row['Id'];
            $studentToAllergyQuery = ("SELECT COUNT(Allergy_Id) from Student_To_Allergies Where Allergy_Id = $search;");
            $rs = mysqli_query($db, $studentToAllergyQuery);
            $result2 = mysqli_fetch_array($rs);

            echo "<tr><td>";
            echo $row['Id'];
            echo "</td><td>";
            echo $row['Name'];
            echo "</td><td>";
            echo $row['Type'];
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

<div id="show-allergy-info"></div>
<?php
include("../scripts/footer.php");
?>


<script>
    $('#show-all-button').on('click', function(e) {
        $('.table-wrapper').slideDown();
        $('#show-all-button').hide();
        $('#show-allergy-info').slideUp();
        e.preventDefault();
    });

    $(document).ready(function () {
        $('.table-update-button').click(function () {
            var allergyId = $(this).attr('value');
            $.ajax({
                url: "../scripts/AjaxUpdateAllergies.php",
                method: "POST",
                data: {allergyId: allergyId},
                success: function (output) {
                    $('#show-allergy-info').slideDown().html(output);
                    $('#show-all-button').show();
                    $('.table-wrapper').slideUp();
                }
            })
        });
    });
</script>