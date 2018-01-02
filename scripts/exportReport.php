<?php
	$records = unserialize($_POST['Records']);
	$fileName = $_POST['filename'].".csv";
	$contentDisposition = "Content-Disposition: attachment; filename=\"$fileName\"";

	header('Content-Type: text/csv');
  header($contentDisposition);

    $csv = fopen('php://output', 'w');

    // Write records to CSV file
    foreach ($records as $record)
    {
        fputcsv($csv, $record);
    }

    fclose($csv);
    exit;
?>
