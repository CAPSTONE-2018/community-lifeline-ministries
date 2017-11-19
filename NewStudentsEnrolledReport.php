<?php
session_start();
if(!isset($_SESSION['loggedIn'])){
    header("Location: login.html");
}
include("Header.php");
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="reports.css"/>
    <script src="print.js"></script>
</head>

<body>

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

	$schoolYear = $_POST['schoolYear'];

	$stmt = "SELECT Student.Id, Student.First_Name, Student.Last_Name  
			  FROM Student JOIN School_Year ON 
			  Student.Id = School_Year.Student_Id 
			  WHERE School_Year.Year = '$schoolYear'";
	$result = mysqli_query($db, $stmt);
	$records = array(); 
	$header = array("Id","First Name","Last Name");
	array_push($records, $header); 
	
	if(mysqli_num_rows($result) > 0) {
		echo '<div class="container">
            <div id="print_div">
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
                    </thead>
                    <tbody>';
		while($row = mysqli_fetch_assoc($result)) {
			$line = array($row["Id"], $row["First_Name"], $row["Last_Name"]);
			array_push($records, $line); 
			echo "<tr><td>" . $row["Id"] . "</td><td>" . $row["First_Name"] . "</td><td>" . $row["Last_Name"] . "</td></tr>";
		}
		echo "</tbody>";
		echo "</table>";
        echo "</div>";
        echo "<br />";
        echo '<input type="button" class="btn btn-primary btn-lg btn-block" onclick="printReport(\'print_div\')" value="Print" />';
        echo "</div>";
		echo "<br />"; 
		echo "<h3>Students_Enrolled_Report.csv</h3>"; 
				
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename="Students_Enrolled_Report.csv"');
		
		$csv = fopen('php://output', 'w');
		
		// Write records to CSV file
		foreach ($records as $record)
		{
			echo "<br />";
			fputcsv($csv, $record);
		}
		
		fclose($csv);

		exit;
	}
	else{
		echo "0 results";
	}

	mysqli_close($db);
?>

</body>

</html>
