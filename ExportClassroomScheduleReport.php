<?php    
	$records = unserialize($_POST['Records']); 
	
	header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="Classroom_Schedule_Report.csv"');

    $csv = fopen('php://output', 'w');

    // Write records to CSV file
    foreach ($records as $record)
    {
        fputcsv($csv, $record);
    }

    fclose($csv);
    exit;
?>