<?php
    session_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: login.html");
    }
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="reports.css"/>
    </head>
	
	<body>
		<form align="right" name="form" action="menu.php" method="POST">
			<label class="home">
			<input name="submit" type="submit" id="home" value="Home">
			</label>
		</form>
		
		<img src="Lifeline.png" alt="Community Lifeline" align="middle">
	
	</body>

</html>