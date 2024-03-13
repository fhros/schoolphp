<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="$_GET">
        <input type="text" name="text">
    </form>

<?php
    $luku = $_GET["text"];
    if (5 <= $luku) {
        echo "luku oli suurempi AHGJHGJHAJ";
    }
    else {
        echo "oli peienemiåii Lllll LLLL !!!!";
    }
?>
</body>
</html>