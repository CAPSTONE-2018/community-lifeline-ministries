<?php
session_start();
if(!isset($_SESSION['loggedIn'])){
    header("Location: login.html");
}
include("Header.php");
?>

<?php
//Setting up variable to use for mysqli function
$server = "localhost";
$user = "clm_user";
$psw = "dbuser";
$database = "community_lifeline";

//Connecting to database
$db = mysqli_connect($server, $user, $psw, $database);
if (!$db) {
    echo "Error - Could not connect to MySQL";
    exit;
}

$query = "SELECT * FROM Student ORDER BY Last_Name, First_Name;";
$result = mysqli_query($db, $query);
?>

<html>

<head>

    <link rel="stylesheet" type="text/css" href="adding.css"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>

<div class="container">

    <div class="row">

        <div class="form-group">
            <div class="col-lg-3">
                <label class="control-label" for="sid">Select Student To Update Scores:</label>

                <select id="sid" class="form-control" name="id">
                    <option value="">Please Select a Student</option>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<option value='" . $row['Id'] . "'>" . $row['First_Name'] . " " . $row['Last_Name'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>

    <div id="showScoreInfo"></div>

</div>

</body>

</html>

<script>
    $(document).ready(function () {
        $('#sid').change(function () {
            var scoreid = $(this).val();
            $.ajax({
                url:"AjaxUpdateTestScores.php",
                method:"POST",
                data:{scoreid:scoreid},
                success:function (output) {
                    $('#showScoreInfo').html(output);
                }
            });
        });
    });
</script>

