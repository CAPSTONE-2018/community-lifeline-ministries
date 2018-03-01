<?php

include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$query = "SELECT * FROM Classes;";
$result = mysqli_query($db, $query);
?>

<h1>Displaying All Classes:</h1>
<br/>

<div id="table-wrapper">
    <table class="table table-condensed table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Class Name</th>
            <th>Tools</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $search = $row['Id'];

            echo "<tr><td>";
            echo $row['Id']; //coming from Schedule table
            echo "</td><td>";
            echo $row['Class_Name']; //coming from Class table
            echo "</td><td>";
            echo "<button class='table-submit-button' type='button' value='$search' >Update</button>";

        }
        ?>
        </tbody>
    </table>
</div>
<input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print"/>
<input type="button" style="display: " id="show-all-button" class="btn btn-primary pull-right" onclick="clickHandler()" value="Show All"/>

<script src="../../scripts/print.js"></script>

<div id="show-class-info"></div>

<?php
include("../scripts/footer.php");
?>

<script>
    $('#show-all-button').on('click', function(e) {
        $('#table-wrapper').slideDown();
        $('#show-all-button').hide();
        e.preventDefault();
    });
</script>

<script>
    $(document).ready(function () {
        $("#show-all-button").css("display","none");
        $('.table-submit-button').click(function () {
            var classId = $(this).val();
            $.ajax({
                url:"../scripts/AjaxUpdateClass.php",
                method:"POST",
                data:{classId:classId},
                success:function (output) {
                    $('#show-class-info').html(output);
                    $('#show-all-button').show();
                    $('#table-wrapper').slideUp();
                }
            });
        });
    });
</script>
