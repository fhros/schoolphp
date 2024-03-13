<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $christmaseve = strtotime("24 December 2023");
    $left = $christmaseve - time();
    $minutesleft = floor($left / 60);
    $hoursleft = floor($left / 3600);
    $daysleft = floor($left / 86400);
    
    echo "on $left sekunttia jäljellä jouluun<br>";
    echo "on $minutesleft minuuttia jäljellä jouluun<br>";
    echo "on $hoursleft tuntia jäljellä jouluun<br>";
    echo "on $daysleft päivää jäljellä jouluun";
   
?>
</body>
</html>