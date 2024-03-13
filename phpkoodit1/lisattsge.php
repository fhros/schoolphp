<?php
$cars = array(
    array(1,"Volvo",22,18),
    array(2,"BMW",15,13),
    array(3,"Saab",5,2),
    array(4,"Land Rover",17,15),
    array(5,"Ford",7,4)
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Selaa autoja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Lisää uusi auto</a>
                </li>
            </ul>
        </div>
    </nav>

    <table class="table">
        <thead>
          <tr>
            <th>AutoID</th>
            <th>Auto</th>
            <th>Varastossa</th>
            <th>Myyty</th>
            <th>Muokkaa</th>
            <th>Poista</th>
          </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($cars as $car) {
                echo "<tr>";
                foreach ($car as $value){
                    echo "<td>$value</td>";
                }
                echo '<td><a class="bi bi-pencil-square" href="edit_car.php?id=' . $car[0] . '"></a></td><td><a class="bi bi-trash" href="delete_car.php?id=' . $car[0] . '"></a></td>';
                echo "</tr>";
            }
            
            
            ?>
          
        </tbody>
      </table>
</body>
</html>