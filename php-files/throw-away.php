<div class="container">
    <br/>
    <br/>
    <h2 align="center">Dynamically Add or Remove input fields in PHP with JQuery</h2>
    <div class="form-group">
        <form name="add_name" id="add_name">
            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <td><input type="text" name="name[]" placeholder="Enter your Name"
                                   class="form-control name_list"/></td>
                        <td>
                            <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                        </td>
                    </tr>
                </table>
                <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit"/>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        var i = 1;
        $('#add').click(function () {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
        $('#submit').click(function () {
            $.ajax({
                url: "name.php",
                method: "POST",
                data: {studentId: studentId}
                $('#add_name').serialize(),
                success
        :

            function (data) {
                alert(data);
                $('#add_name')[0].reset();
            }
        })
            ;
        });
    });
</script>

<?php
$connect = mysqli_connect("localhost", "root", "", "test_db");
$number = count($_POST["name"]);
if ($number > 0) {
    for ($i = 0; $i < $number; $i++) {
        if (trim($_POST["name"][$i] != '')) {
            $sql = "INSERT INTO tbl_name(name) VALUES('" . mysqli_real_escape_string($connect, $_POST["name"][$i]) . "')";
            mysqli_query($connect, $sql);
        }
    }
    echo "Data Inserted";
} else {
    echo "Please Enter Name";
}
?>