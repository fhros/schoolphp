<?php

$db_host = 'localhost';
$db_name = 'mvc_kayttajat';
$db_username = 'root';
$db_password = '';

$dsn = "mysql:host=$db_host;dbname=$db_name";

try {
    $db_connection = new PDO($dsn, $db_username, $db_password);
} catch (Exception $e) {
    die("Virhe: " . $e->getMessage());
}
?>