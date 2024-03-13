<?php

require "product.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
</head>
<body>
    <div class="container">
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["hinta"]) && !empty($_POST["hinta"])) {
                $nimi = $_POST["nimi"];
                $valmistaja = $_POST["valmistaja"];
                $hinta = $_POST["hinta"];
                $kuvaus = $_POST["kuvaus"];
            
                $tuote = new Product($nimi, $valmistaja, $hinta, $kuvaus);
            
                ?>
                <h1>Tuotteen tiedot</h1>
                <table class="table-bordered">
                    <thead>
                        <tr>
                            <?php
                                echo "<th>Tuotteen nimi</th>";
                                echo "<th>" . $tuote->get_nimi() . "</th>";
                            ?>
                        </tr>
                        <tr>
                            <?php
                                echo "<th>Tuotteen valmistaja</th>";
                                echo "<th>" . $tuote->get_valmistaja() . "</th>";
                            ?>
                        </tr>
                        <tr>
                            <?php
                                echo "<th>Tuotteen hinta (alv 0%)</th>";
                                echo "<th>" . $tuote->get_hinta() . "</th>";
                            ?>
                        </tr>
                        <tr>
                            <?php
                                echo "<th>Tuotteen verollinen hinta</th>";
                                echo "<th>" . $tuote->get_alvhinta(24) . "</th>";
                            ?>
                        </tr>
                        <tr>
                            <?php
                                echo "<th>Tuotteen kuvaus</th>";
                                echo "<th>" . $tuote->get_kuvaus() . "</th>";
                            ?>
                        </tr>
                    </thead>
                </table>
                        <?php
            } else {
                echo "Laita hinta !!!!!!!";
            }
        }
    ?>
    </div>
</body>
</html>