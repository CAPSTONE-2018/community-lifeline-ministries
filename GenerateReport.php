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
	
	<body onload="onLoad()">
		<form align="right" name="form" action="menu.php" method="POST">
			<label class="home">
			<input name="submit" type="submit" id="home" value="Home">
			</label>
		</form>
		
		<img src="Lifeline.png" alt="Community Lifeline" align="middle">
		
		<?php
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
			
			//Determine which report to generate
			$id = $_POST['id'];
			
			switch($id) {
				case "classroomList":
					GenerateClassroomListReport();
					break;
				case "studentsEnrolled":
					GenerateStudentsEnrolledReport();
					break;
				default: 
					break; 
			}
			
			function GenerateClassroomListReport() {
				$teacherFirstName = $_POST['teacherFirstName'];
				$teacherLastName = $_POST['teacherLastName'];
				
				if ($stmt = $db->prepare("SELECT * FROM Schedule Where teacher_f=? AND teacher_l=?")) {
					$stmt->bind_param('ss', $teacherFirstName, $teacherLastName); 
					$stmt->execute(); 
					$stmt->bind_result($className, $teacherID, $teacherFName, $teacherLName, $studentID, $studentFName, $studentLName, $roomNumber, $classTime); 
					
					while ($stmt->fetch()) {
						echo "<h2>$roomNumber</h2>";
					}
					$stmt->close(); 
				}
			}
			
			function GenerateStudentsEnrolledReport() {
				$schoolYear = $_POST['schoolYear']; 
				
				if ($stmt = $db->prepare("SELECT * FROM Students Where school_year=?")) {
					$stmt->bind_param('s', $schoolYear);
					$stmt->execute(); 
					$stmt->bind_result($studentID, $studentLast, $studentFirst, $age, $gender, $birthDate, $address, $zipCode,
										$city, $school, $program, $ethnicity, $permissionSlip, $birthCertificate, $schoolYr, 
										$reducedLunchEligible, $preTest, $postTest);
					
					while ($stmt->fetch()) {
						echo "<h2>$studentID</h2>";
					}
					$stmt->close(); 
				}
			}
			
		?>
	</body>

</html>