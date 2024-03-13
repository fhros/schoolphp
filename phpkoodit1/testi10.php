<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="$_GET">
        <input type="text" name="text1">
        <input type="text" name="text2">
        <button>mee lähetä</button>
    </form>

<?php
    if(isset($_GET["text1"]) && isset($_GET["text2"])) {
        $number1 = (int)$_GET["text1"];
        $number2 = (int)$_GET["text2"];

        if($number1 % 2 === 0 && $number2 % 2 === 0) {
            echo "prosas";
        }
        else {
            echo "iso prosasss";
        }
    }
    else {
        echo "ei numero valueit";
    }
    // $number1 = $_GET["text1"];
    // $number2 = $_GET["text2"];

    // if($number1 % 2 === 0 && $number2 % 2 === 0) {
    //     echo "parilline";
    // }
    // else {
    //     echo "ei parilline luuseri";
    // }
?>
</body>
</html>