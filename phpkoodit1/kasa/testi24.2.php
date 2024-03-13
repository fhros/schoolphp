<?php
    $alaraja = $_GET["input1"];
    $ylaraja = $_GET["input2"];
    for ($i = $alaraja; $i <= $ylaraja; $i++) {
        echo $i . " ";
        if ($i % 10 == 0) {
            echo "<br>";
        }
    }
   
?>        