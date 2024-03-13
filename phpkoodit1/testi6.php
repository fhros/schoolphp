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
    $cookie = $_GET["text"];
    echo (fmod($cookie,10));

    ?>
</body>
</html>