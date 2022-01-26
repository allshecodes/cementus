<?php
$dbhost = 'db.bmk-hh.de';
$dbuser = 'meg91';
$dbpass = 'meg9100xN#';
$dbname = 'meg91_a.langhans';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    echo "Fehler: konnte nicht mit MySQL verbinden." . PHP_EOL;
    echo "Debug-Fehlernummer: " . mysqli_connect_error() . PHP_EOL;
    echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
