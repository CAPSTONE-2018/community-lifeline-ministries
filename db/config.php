<?php
// Database credentials.
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'clm_user');
define('DB_PASSWORD', 'dbuser');
define('DB_NAME', 'community_lifeline');

/* Attempt to connect to MySQL database */
$db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
    echo "Error - Could not connect to MySQL";
    exit;
}
?>
