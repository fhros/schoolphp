<?php
$input = $_GET["number"];

$kerto = 1;

while ($kerto <= 10) {
    echo "$input x $kerto = " . $input * $kerto . "<br>";
    $kerto++;
}


?>