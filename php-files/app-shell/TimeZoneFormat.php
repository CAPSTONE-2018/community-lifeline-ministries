<?php
$date = new DateTime(null, new DateTimeZone(date_default_timezone_get()));
$date->setTimeZone(new DateTimeZone("America/Chicago"));
$dateToDisplay = (string)$date->format("l F jS");
$dateToSubmit = (string)$date->format("m/d/Y");
$dayOfWeek = (string)$date->format("N");
?>

<script type="text/javascript">
    setInterval(function() {
        var currentTime = new Date ( );
        var currentHours = currentTime.getHours ( );
        var currentMinutes = currentTime.getMinutes ( );
        currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
        var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";
        currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;
        currentHours = ( currentHours == 0 ) ? 12 : currentHours;
        var currentTimeString = currentHours + ":" + currentMinutes + " " + timeOfDay;
        document.getElementById("timer").innerHTML = currentTimeString;
    }, 1000);
</script>
