<?php
    include("AdminPermissionsTest.php");
    if($isAdmin == false){
        header("Location: login.html");
    }
    include("Header.php");
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="adding.css"/>
    </head>
    
    <body>
        
        <div id="form_wrapper">
        <form action="Registered.php" method="POST" id="form2">
			<br>
			<label><h2>Register someone for access:</h2></label><br>
			<label><h4>Username:</h4><input type="text" name="username"></label>
			<br><br>
			
			<label><h4>Password:</h4><input type="text" name="password"></label>
			<br><br>
			
            <label><h4>Account type:</h4>
                <select name="account">
                    <option value="administrator">Administrator</option>
                    <option value="teacher">Teacher</option>
                    <option value="report_user">Report User</option>
                </select>
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
