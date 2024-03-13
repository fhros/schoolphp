<?php
    require_once('../db_config.php');
    $id = $_GET['id'];
    $query = "SELECT * FROM movies WHERE id = :id LIMIT 1";
    $result = $db_connection->prepare($query);
    $result->execute([
    'id' => $id
    ]);
    $result = $result->fetch();
?>
<!DOCTYPE html>
<html_lang="en">
<head>
    <meta charset="UTF-8">
    <title>Muokkaa elokuvan tietoja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
</head>
<body>

    <br>

    <div class="container">
        <form method="post" action="update.php">
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="number" readonly class="form-control" id="id" name="id" value="<?php echo $result['id'] ?>">
                </div>
            </div><br>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Nimi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nimi" name="nimi" value="<?php echo $result['nimi'] ?>">
                </div>
            </div><br>
            <div class="form-group row">
                <label for="author" class="col-sm-2 col-form-label">Ohjaaja</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ohjaaja" name="ohjaaja" value="<?php echo $result['ohjaaja'] ?>">
                </div>
            </div><br>
            <div class="form-group row">
                <label for="genre" class="col-sm-2 col-form-label">Päänäyttelijä</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="paanayttelija" name="paanayttelija" value="<?php echo $result['paanayttelija'] ?>">
                </div>
            </div><br>
            <div class="form-group row">
                <label for="height" class="col-sm-2 col-form-label">Kesto(minuutteina)</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="kesto" name="kesto" value="<?php echo $result['kesto'] ?>">
                </div>
            </div><br>
            <div class="form-group row">
                <label for="publisher" class="col-sm-2 col-form-label">Hankintapäivämäärä</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="hankintapaivamaara" name="hankintapaivamaara" value="<?php echo $result['hankintapaivamaara'] ?>">
                </div>
            </div><br>
            <div class="form-group row">
                <label for="publisher" class="col-sm-2 col-form-label">Kuntoluokitus</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kuntoluokitus" name="kuntoluokitus" value="<?php echo $result['kuntoluokitus'] ?>">
                </div>
            </div>
            <br>
            <button type="submit" name="updateRecord" class="btn btn-success">Päivitä</button>

        </form>
    </div>

</body>

</html>