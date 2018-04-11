<?php
$date = new DateTime(null, new DateTimeZone(date_default_timezone_get()));
$date->setTimeZone(new DateTimeZone('America/Chicago'));
$dateToDisplay = (string)$date->format('l F jS');
$dateToSubmit = (string)$date->format("m/d/Y");

$timeToDisplay = (string)$date->format("g:i A");
?>