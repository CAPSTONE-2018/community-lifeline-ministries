<?php

include("../scripts/header.php");

//connect to database
include("../../db/config.php");

$query = "SELECT * FROM Classes;";
$result = mysqli_query($db, $query);
?>

<link rel="stylesheet" href="../../css/form-styles.css"/>
<link rel="stylesheet" href="../../css/toggle-switch.css"/>
<link rel="stylesheet" href="../../css/input-styles.css"/>
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script type="text/javascript" src="../../js/FilterFields.js"></script>
<h1>Displaying All Classes:</h1>
<div class="col-lg">

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input id="searchInput" class="mdl-textfield__input" name="searchInput" onkeyup="FilterFields();" type="text"/>
        <label class="mdl-textfield__label" for="searchInput">Search Classes</label>
    </div>
</div>
<br/>

<div id="print_div" class="table-wrapper">
    <table id="searchTable" class="table table-condensed table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Class Name</th>
            <th>Actions</th>
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
            echo "<button class='table-update-button' type='button' value='$search' >Update</button>";

        }
        ?>
        </tbody>
    </table>
</div>
<input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print"/>
<input type="button" id="show-all-button" class="btn btn-primary pull-right" value="Show All"/>

<script src="../../scripts/print.js"></script>

<div id="show-class-info"></div>

<?php
include("../scripts/footer.php");
?>

<script>
    $('#show-all-button').on('click', function(e) {
        $('.table-wrapper').slideDown();
        $('#show-all-button').hide();
        $('#show-class-info').slideUp();
        e.preventDefault();
    });

    $(document).ready(function () {
        $('.table-update-button').click(function () {
            var classId = $(this).val();
            $.ajax({
                url:"../scripts/AjaxUpdateClass.php",
                method:"POST",
                data:{classId:classId},
                success:function (output) {
                    $('#show-class-info').slideDown().html(output);
                    $('#show-all-button').show();
                    $('.table-wrapper').slideUp();
                }
            });
        });
    });
</script>
