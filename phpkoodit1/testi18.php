<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$taulukko = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

for ($i = count($taulukko) - 1; $i >= 0; $i--) {
    if ($taulukko[$i] % 2 == 0) {
        echo $taulukko[$i];
    }
}
    // $taulukko = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);


    // var_dump(count($taulukko));
    // foreach ($taulukko as $taulu) {
    //     echo "$taulu <br>";
    // }


?>
</body>
</html>