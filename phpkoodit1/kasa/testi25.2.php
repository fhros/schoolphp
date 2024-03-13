<?php
    $input = $_POST["select"];
    $total = 0;
    foreach ($input as $value) {
        if ($value == "hinta1") {
            $value = "1";
            $total += $value;
        }
        elseif ($value == "hinta2") {
            $value = "1.25";
            $total += $value;
        }
       
    }
    echo "hinnaksi tulisi: {$total}€";
?>