<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="$_GET">
        <input type="text" name="input">
    </form>
    <?php
        $luku = $_GET["input"];

        if($luku % 400 === 0) {
            echo "karkaa loooll";
        }
        elseif($luku % 100 === 0) {
            echo "ei karkaa :/";
        }
        elseif($luku % 4 === 0) {
            echo "karkaa juoksee";
        }
        else {
            echo "ei kearkaa";
        }  
    ?>
</body>
</html>