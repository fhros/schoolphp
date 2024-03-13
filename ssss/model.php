<?php
class Kayttaja
{
    private $kayttajaid;
    private $etunimi;
    private $sukunimi;

    public function __construct($kayttajaid = NULL, $etunimi = "", $sukunimi = "")
    {
        $this->kayttajaid = $kayttajaid;
        $this->etunimi = $etunimi;
        $this->sukunimi = $sukunimi;
    }

    public function getKayttajaid()
    {
        return $this->kayttajaid;
    }

    public function setKayttajaid($kayttajaid)
    {
        $this->kayttajaid = $kayttajaid;
    }

    public function getEtunimi()
    {
        return $this->etunimi;
    }

    public function setEtunimi($etunimi)
    {
        $this->etunimi = $etunimi;
    }

    public function getSukunimi()
    {
        return $this->sukunimi;
    }

    public function setSukunimi($sukunimi)
    {
        $this->sukunimi = $sukunimi;
    }
}

class KayttajaModel
{
    public function getAllUsers()
    {
        global $db_connection;

        $stmt = $db_connection->prepare("SELECT * FROM kayttaja");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $users = [];

        while ($row = $stmt->fetch()) {
            $user = new Kayttaja($row['kayttajaid'], $row['etunimi'], $row['sukunimi']);
            $users[] = $user;
        }

        $stmt->closeCursor();

        return $users;
    }

    public function updateUser($user)
    {
        global $db_connection;

        $etunimiValue = $user->getEtunimi();
        $sukunimiValue = $user->getSukunimi();
        $kayttajaidValue = $user->getKayttajaid();

        $stmt = $db_connection->prepare("UPDATE kayttaja SET etunimi = ?, sukunimi = ? WHERE kayttajaid = ?");
        $stmt->bindParam(1, $etunimiValue);
        $stmt->bindParam(2, $sukunimiValue);
        $stmt->bindParam(3, $kayttajaidValue, PDO::PARAM_INT);

        $stmt->execute();
        $stmt->closeCursor();
    }

    public function getUserById($userId)
    {
        global $db_connection;

        $stmt = $db_connection->prepare("SELECT * FROM kayttaja WHERE kayttajaid = ?");
        $stmt->bindParam(1, $userId, PDO::PARAM_INT);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        if ($row = $stmt->fetch()) {
            $user = new Kayttaja($row['kayttajaid'], $row['etunimi'], $row['sukunimi']);
            $stmt->closeCursor();
            return $user;
        } else {
            $stmt->closeCursor();
            return null; // User not found
        }
    }
}
?>