<?php

class View
{

    public function showAll($kayttajat) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Käyttäjä lista</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
        </head>
        <body>
            <div class="container">
                <h1>Käyttäjä lista</h1>
                <a href="index.php?action=addPage">Lisää uusi</a>
                <table class="table">
                    <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Etunimi</th>
                          <th scope="col">Sukunimi</th>
                          <th scope="col">Muokkaa</th>
                          <th scope="col">Poista</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($kayttajat as $kayttaja) { ?>
                        <tr>
                            <td><?php echo $kayttaja->get_kayttajaid()?></td>
                            <td><?php echo $kayttaja->get_etunimi()?></td>
                            <td><?php echo $kayttaja->get_sukunimi()?></td>
                            <td><a href="index.php?action=edit&id=<?php echo $kayttaja->get_kayttajaid() ?>"><i class="fas fa-edit"></i></a></td>
                            <td><a href="index.php?action=delete&id=<?php echo $kayttaja->get_kayttajaid() ?>"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </body>
        </html>
        <?php
    }

    public function editPage($kayttaja) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Muokkaa käyttäjää</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
        </head>
        <body>
            <div class="container"> 
                <h1>Muokkaa käyttäjää</h1>
                <form method="POST" action="index.php?action=update">
                    <div class="form-group-row">
                        <label for="etunimi" class="col-sm-2 col-form-label">Etunimi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="etunimi" name="etunimi" value="<?php echo $kayttaja->get_etunimi() ?>">
                        </div>
                    </div>
                    <div class="form-group-row">
                        <label for="sukunimi" class="col-sm-2 col-form-label">Sukunimi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sukunimi" name="sukunimi" value="<?php echo $kayttaja->get_sukunimi() ?>">
                        </div>
                    </div>
                    <br>
                    <button type="submit" name="action" class="btn btn-success">Päivitä käyttäjä</button>
                </form>
            </div>
        </body>
        </html>
        <?php
    }

    public function addPage() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Lisää käyttäjä</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
        </head>
        <body>
            <div class="container">
                <h1>Lisää käyttäjä</h1>
                <form method="POST" action="index.php?action=add">
                    <div class="form-group-row">
                        <label for="etunimi" class="col-sm-2 col-form-label">Etunimi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="etunimi" name="etunimi">
                        </div>
                    </div>
                    <div class="form-group-row">
                        <label for="sukunimi" class="col-sm-2 col-form-label">Sukunimi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sukunimi" name="sukunimi">
                        </div>
                    </div>
                    <br>
                    <button type="submit" name="action" class="btn btn-success">Lisää käyttäjä</button>
                </form>
            </div>
        </body>
        </html>
        <?php
    }
}
?>