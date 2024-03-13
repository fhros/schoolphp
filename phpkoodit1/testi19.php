<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="$_GET">
        <input type="text" name="input" placeholder="0">
        <button type="submit">laske ALV</button>
    </form>
<?php
    $input = $_GET["input"];
    function laskALV($input) {
        $raha = $input * 1.24;
        echo $raha;
    }
    laskALV($input);
?>
</body>
</html>