<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $weekday = array("Sunnuntai" ,"Maanantai", "Tiistai", "Keskiviikko", "Torstai", "Perjantai", "Lauantai");
   
    echo $weekday[date("N")];
?>
</body>
</html>