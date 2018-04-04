<?php
$date = new DateTime(null, new DateTimeZone(date_default_timezone_get()));
$date->setTimeZone(new DateTimeZone('America/Chicago'));
$dateToDisplay = (string)$date->format('l F jS');
$dateToSubmit = (string)$date->format("Y/m/d");

$timeToDisplay = date("g:i A", strtotime("10:20:00"));
?>