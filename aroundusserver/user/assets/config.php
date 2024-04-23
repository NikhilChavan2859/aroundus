<?php
define('DB_SERVER', 'sql102.ultimatefreehost.in');
define('DB_USERNAME', 'ltm_34029829');
define('DB_PASSWORD', 'Rr240053');
define('DB_NAME', 'ltm_34029829_aroundus');
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>