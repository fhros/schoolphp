<?php

require_once('../db_config.php');

if (isset($_POST['createRecord'])) {
    $nimi = filter_var($_POST['nimi'], FILTER_UNSAFE_RAW);
    $ohjaaja = filter_var($_POST['ohjaaja'], FILTER_UNSAFE_RAW);
    $paanayttelija = filter_var($_POST['paanayttelija'], FILTER_UNSAFE_RAW);
    $kesto = filter_var($_POST['kesto'], FILTER_UNSAFE_RAW);
    $hankintapaivamaara = filter_var($_POST['hankintapaivamaara'], FILTER_UNSAFE_RAW);
    $kuntoluokitus = filter_var($_POST['kuntoluokitus'], FILTER_UNSAFE_RAW);
    $query = "INSERT INTO movies (nimi, ohjaaja, paanayttelija, kesto, hankintapaivamaara, kuntoluokitus)
                VALUES (:nimi, :ohjaaja, :paanayttelija, :kesto, :hankintapaivamaara, :kuntoluokitus)";
    $result = $db_connection -> prepare($query);
    $result -> execute([
        'nimi' => $nimi,
        'ohjaaja' => $ohjaaja,
        'paanayttelija' => $paanayttelija,
        'kesto' => $kesto,
        'hankintapaivamaara' => $hankintapaivamaara,
        'kuntoluokitus' => $kuntoluokitus
    ]);
    $rows = $result -> rowCount();
    if ($rows == 1) {
        header('Location: list-movies.php');
    } else {
        $error_message = "Elokuvan lisääminen epäonnistui";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lisää elokuva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
</head>
<body>
    
    <br>
    <div class="container">
        <?php
        if (isset($error_message)) {
            ?>
            <div class="alert alert-success">
                <strong>Virhe!</strong>
                <?php echo $error_message; ?>
            </div>
            <?php
        }
        ?>
        <form method="post" action="">
            <div class="form-group-row">
                <label for="nimi" class="col-sm-2 col-form-label">Nimi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nimi" name="nimi">
                </div>
            </div>
            <div class="form-group-row">
                <label for="ohjaaja" class="col-sm-2 col-form-label">Ohjaaja</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ohjaaja" name="ohjaaja">
                </div>
            </div>
            <div class="form-group-row">
                <label for="paanayttelija" class="col-sm-2 col-form-label">Päänäyttelijä</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="paanayttelija" name="paanayttelija">
                </div>
            </div>
            <div class="form-group-row">
                <label for="kesto" class="col-sm-2 col-form-label">Kesto(minuutteina)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kesto" name="kesto">
                </div>
            </div>
            <div class="form-group-row">
                <label for="hankintapaivamaara" class="col-sm-2 col-form-label">Hankinta päivämäärä</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="hankintapaivamaara" name="hankintapaivamaara">
                </div>
            </div>
            <div class="form-group-row">
                <label for="kuntoluokitus" class="col-sm-2 col-form-label">Kuntoluokitus</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="publisher" name="kuntoluokitus">
                </div>
            </div>
            <br>
            <button type="submit" name="createRecord" class="btn btn-success">Add Record</button>
        </form>
    </div>
</body>
</html>