<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>frosm input thingie</title>
</head>
<body>
    <form method="GET">
        <input type="number" name="number">
        <button>lähetä</button>
    </form>    

<?php
    $number = $_GET['number'];
    echo $number + (rand(1,10));
?>
</body>
</html>