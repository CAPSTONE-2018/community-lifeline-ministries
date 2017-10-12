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
            header("Location: login.html");
        }
        $stmt->close();
    }
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="adding.css"/>
    </head>
    
    <body>
        <form align="right" name="form" action="menu.php" method="POST">
            <label class="home">
            <input name="submit" type="submit" id="home" value="Home">
            </label>
        </form>
        
		<img src="Lifeline.png" alt="Community Lifeline" align="middle">
        
        <div id="form_wrapper">
        <form action="Registered.php" method="POST" id="form2">
			<br>
			<label><h2>Register someone for access:</h2></label><br>
			<label><h4>Username:</h4><input type="text" name="username"></label>
			<br><br>
			
			<label><h4>Password:</h4><input type="text" name="password"></label>
			<br><br>
			
            <label><h4>Account type:</h4>
                Administrator<input value="administrator" type="radio" name="account">
                Teacher<input value="teacher" type="radio" name="account">
            </label>
            <br><br>
            
			<label><h4>Name:</h4>
                <input placeholder="First" type="text" name="fname">
                <input placeholder="Last" type="text" name="lname">
            </label>
            <br><br>
            
			<label><h4>Email:</h4><input type="text" name="email"></label>
			<br><br>
			
			<input id="submit" type="submit" value="Submit"><br><br>
        </form>
        </div>
    </body>

</html>
