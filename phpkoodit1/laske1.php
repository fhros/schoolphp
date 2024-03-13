<html>
<body>
<?php
    $hinta = $_POST["hinta"];
    $verokanta = $_POST["vero"];
    $verokantaprosentti = 1 + $verokanta / 100;
    $verohinta = $hinta * $verokantaprosentti;
    echo "Veroton hinta on " . $hinta . "€<br>Verokanta on " . $verokanta . "%<br>Verollinen hinta on " . $verohinta . "€";
?>
</body>
</html>
