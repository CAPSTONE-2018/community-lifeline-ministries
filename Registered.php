<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: login.html");
    }
    include("Header.php");
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="add.css"/>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    
    <body>
        
        <h1>Add Information:</h1>
        <br />

        
        <?php
        
        
        $username = $_POST['username'];
		$password = $_POST['password'];
        $encryptPass = md5($password);
		$account = $_POST['account'];
        $newAccount = checkAccount($account);
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
		$email = $_POST['email'];
        
        //Setting up variable to use for mysqli function
        $server = "localhost";
        $user = "clm_user";
        $psw = "dbuser";
        $database = "community_lifeline";
        //Connecting to database
        $db = mysqli_connect($server, $user, $psw, $database);
        if (!$db) {
            print "Error - Could not connect to MySQL";
            exit;
        } 
        
        // Inserting values into prepared statment
        $stmt = $db->prepare("INSERT INTO Logins VALUES (?, ?, ?, ?, ?, ?)");
       
        $stmt->bind_param('ssssss', $username, $newAccount, $fname, $lname, $email, $encryptPass);
        
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
        
        function checkAccount($account) {
            $account = strtolower($account);
            if($account == "administrator" or $account == "admin") {
                $account = "administrator";
            }
            return $account;
        }
        ?>
    </body>
</html>
