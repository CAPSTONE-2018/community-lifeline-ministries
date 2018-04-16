<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");



	$stmt = "SELECT Students.Id, Students.First_Name, Students.Last_Name
			  FROM Students";
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

		$serialized =htmlspecialchars(serialize($records));
		?>

        <link rel="stylesheet" href="../../css/show-all-students-styles.css"/>
			<form class="form-horizontal" action="../../scripts/exportReport.php" method="POST">
				<input type="hidden" name="Records" value="<?php echo $serialized ?>"/>
				<input type="hidden" name="filename"  value="Students_Enrolled_Report"/>
				<div class="row">
						<div class="form-group">
								<div class="col-lg-12">
										<input type="button" class="btn btn-primary pull-right" onclick="printReport('print_div')" value="Print" />
								</div>
							</div>
					</div>
					<div class="row">
							<div class="form-group">
								<div class="col-lg-12">
									<input type="submit" class="btn btn-primary pull-right" name="submit" value="Export" />
								</div>
						</div>
				</div>
			</form>


	<script src="../../scripts/print.js"></script>
	<?php
	}
	else{
		echo "0 results";
	}

	mysqli_close($db);

?>
