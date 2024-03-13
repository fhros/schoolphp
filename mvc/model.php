<?php
require('db_config.php');

class Kayttaja {
    private $kayttajaid;
    private $etunimi;
    private $sukunimi;

    function __construct($kayttajaid = NULL, $etunimi = "", $sukunimi = "") {
        $this->kayttajaid = $kayttajaid;
        $this->etunimi = $etunimi;
        $this->sukunimi = $sukunimi;
    }

    public static function getAllKayttajat() {
        global $conn;
        $query = "SELECT * FROM kayttaja";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $kayttajat = array();
        foreach ($results as $row) {
            $kayttaja = new Kayttaja($row["kayttajaid"], $row["etunimi"], $row["sukunimi"]);
            $kayttajat[] = $kayttaja;
        }
    
        return $kayttajat;
    }

    public function addKayttaja() {
        global $conn;
        $etunimi = $_POST["etunimi"];
        $sukunimi = $_POST["sukunimi"];

        $query = "INSERT INTO kayttaja (`etunimi`, `sukunimi`)
                  VALUES ('$etunimi', '$sukunimi')";
        $stmt = $conn -> prepare($query);
        $stmt -> execute();
        if($stmt) {
            header("Location: index.php");
        } else {
            return "fail";
        }
    }

    public function deleteKayttaja() {
        global $conn;
        $kayttajaid = $this->kayttajaid;

        $query = "DELETE FROM kayttaja
                  WHERE kayttajaid = $kayttajaid LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $rowsdeleted = $stmt->rowCount();
        if ($rowsdeleted == 1) {
            header("Location: index.php");
        }
    }

    public function editKayttaja() {
        global $conn;
        $kayttajaid = $this->kayttajaid;
        $etunimi = $this->etunimi;
        $sukunimi = $this->sukunimi;

        $query = "SELECT * FROM kayttaja WHERE kayttajaid = $kayttajaid LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt = $stmt->fetch();
    }

    public function updateKayttaja() {
        global $conn;
        $kayttajaid = $this->kayttajaid;
        $etunimi = $this->etunimi;
        $sukunimi = $this->sukunimi;

        $query = "UPDATE kayttaja SET etunimi=$etunimi, sukunimi=$sukunimi
                  WHERE kayttajaid=$kayttajaid";
        $stmt = $conn -> prepare($query);
        $stmt -> execute();
        if($stmt) {
            header("Location: index.php");
        } else {
            return "fail";
        }
    }

    public function get_kayttajaid() {
        return $this->kayttajaid;
    }
    public function get_etunimi() {
        return $this->etunimi;
    }
    public function get_sukunimi() {
        return $this->sukunimi;
    }

    
}
?>