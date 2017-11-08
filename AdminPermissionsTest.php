 
<?php

    //info to access database
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
    session_start();
    $username = $_SESSION['loggedIn'];
    if ($stmt = $db->prepare("SELECT * FROM Logins WHERE username=?")) {
        
        $stmt->bind_param('s', $username);
            
        $stmt->execute();
            
        $stmt->bind_result($user_name, $account, $firstName, $lastName, $email, $pass);
        $stmt->fetch();
        
        // Can only get to this page if you are logged in as an administrator
        if(!isset($_SESSION['loggedIn']) or $account !== "administrator"){
            $isAdmin = false;
        }else{
            $isAdmin = true;
        }
        $stmt->close();
    }
?>
