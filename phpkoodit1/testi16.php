<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    echo "<table border = style='border-collapse: collapse'>";
    for ($row=1; $row <= 10; $row++) {
    echo "<tr>";
    for ($col=1; $col <= 10; $col++) {
    $p = $col * $row;
    echo "<td>$p</td>";
    }
    echo "</tr>";
    }
    echo "</table>";
?>
</body>
</html>