<?php

class View
{
    public function showAll($kayttajat)
    {
        ?>
        <html>
        <head>
            <title>User List</title>
        </head>
        <body>
            <h1>User List</h1>
            <ul>
                <?php foreach ($kayttajat as $kayttaja): ?>
                    <li><?= $kayttaja->getEtunimi() ?> <?= $kayttaja->getSukunimi() ?> - 
                        <a href="index.php?action=edit&id=<?= $kayttaja->getKayttajaid() ?>">Muokkaa</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </body>
        </html>
        <?php
    }

    public function editPage($kayttaja)
    {
        ?>
        <html>
        <head>
            <title>Edit User</title>
        </head>
        <body>
            <h1>Edit User</h1>
            <form method="post" action="index.php">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="kayttajaid" value="<?= $kayttaja->getKayttajaid() ?>">
                <label for="etunimi">Etunimi:</label>
                <input type="text" name="etunimi" value="<?= $kayttaja->getEtunimi() ?>" required>
                <br>
                <label for="sukunimi">Sukunimi:</label>
                <input type="text" name="sukunimi" value="<?= $kayttaja->getSukunimi() ?>" required>
                <br>
                <input type="submit" value="Päivitä käyttäjä">
            </form>
        </body>
        </html>
        <?php
    }
}

?>