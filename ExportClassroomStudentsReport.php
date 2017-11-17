<?php    
	$records = unserialize($_POST['Records']); 
	
	header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="Classroom_Students_Report.csv"');

    $csv = fopen('php://output', 'w');

    // Write records to CSV file
    foreach ($records as $record)
    {
        echo "<br />";
        fputcsv($csv, $record);
    }

    fclose($csv);
    exit;
?>