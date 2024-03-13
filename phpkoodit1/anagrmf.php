<?php
session_start();

if(!isset($_SESSION["wordValue"])) {
    $words = array("sieni", "porsas", "mehiläinen", "sphinx of black quartz heed my vow", "puumaja", "lintu", "lentokone", "kala", "kissa", "koira", "php koodi", "terve", "taivas");
    $word = array_rand($words);
    $_SESSION["wordValue"] = $words[$word];
}

$wordShuffle = str_shuffle($_SESSION["wordValue"]);

if (isset($_POST["input"])) {
    $input = $_POST["input"];
}

if ($input == $_SESSION["wordValue"]) {
    echo "voitit pelin 😀😀😀😀 sana oli " . $_SESSION["wordValue"];
    unset($_SESSION["wordValue"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>anagrammari</h1>
    <p>arvaa sana: <?php echo $wordShuffle . "<br>"; ?></p>

    <form method="post">
        <input type="text" id="input" name="input">
        <input type="submit">
    </form>
</body>
</html>