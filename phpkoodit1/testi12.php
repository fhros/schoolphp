<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="$_GET">
        <input type="text" name="input1" placeholder="laita numero">
        <input type="text" name="input2" placeholder="laita numero">
        <select name="operator">
            <option>none</option>
            <option>plus</option>
            <option>miinus</option>
            <option>kerto</option>
            <option>jako</option>
        </select>
        <br>
        <button type="submit" name="submit" value="submit">laske</button>
    </form>
    <p>vastaus:</p>
<?php
    if (isset($_GET["submit"])) {
        $result1 = $_GET["input1"];
        $result2 = $_GET["input2"];
        $operator = $_GET["operator"];
        switch ($operator) {
            case "none":
                echo "laita jotain RAAAAAAHHHHH";
            break;
            case "plus":
                echo $result1 + $result2;
            break;
            case "miinus":
                echo $result1 - $result2;
            break;
            case "kerto":
                echo $result1 * $result2;
            break;
            case "jako":
                echo $result1 / $result2;
            break;
            
        }
    }
?>
</body>
</html>