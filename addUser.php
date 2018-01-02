<?php
    include("scripts/header.php");
    if($account != "administrator"){
        header("Location: index.html");
    }

?>


        <h1>Add Information:</h1>
        <br />


        <?php
        $username = $_POST['username'];
		    $password = $_POST['password'];
        $encryptPass = md5($password);
		    $account = $_POST['account'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
		    $email = $_POST['email'];

        //connect to database
        include("db/config.php");


        $stmt = $db->prepare("INSERT INTO Logins VALUES (?, ?, ?, ?, ?, ?)");

        $stmt->bind_param('ssssss', $username, $encryptPass, $account, $fname, $lname, $email);

        $stmt->execute();

        if ($stmt->affected_rows == -1) {
            echo "<div class='alert alert-danger'>
                        <strong>Failure! </strong>User could not be added to the database, please try again.
                      </div>";
        } else {
            echo "<div class='alert alert-success'>
                        <strong>Success! </strong>User successfully added to the database.
                      </div>";
            $stmt->close();
        }

        include("scripts/footer.php");
        ?>
