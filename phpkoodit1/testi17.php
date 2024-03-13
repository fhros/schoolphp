<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $kuukaudet = array("Tammikuu", "Helmikuu", "Maaliskuu", "Huhtikuu", "Toukokuu", "Kesäkuu", "Heinäkuu", " Elokuu", "Syyskuu", "Lokakuu", "Marraskuu", "Joulukuu");
    foreach ($kuukaudet as $kuukausi) {
        echo "$kuukausi <br>";
    }
?>
</body>
</html>