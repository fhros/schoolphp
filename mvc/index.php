<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require ('db_config.php');
require_once("model.php");
require_once("view.php");

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        try {
            $kayttajat = Kayttaja::getAllKayttajat();
            // var_dump($kayttajat);
            if(isset($_GET['action'])) {
                $action = $_GET['action'];

                if($action == 'edit') {
                    $id = (int)$_GET['id'];
                    $kayttaja = new Kayttaja($id);
                    $kayttaja->editKayttaja($id);


                    $view = new View();
                    $view->editPage($kayttaja);
                } 

                if($action == 'delete') {
                    $id = (int)$_GET['id'];
                    $kayttaja = new Kayttaja($id);
                    $kayttaja->deleteKayttaja();
                } 

                if($action == 'addPage') {
                    $view = new View();
                    $view->addPage();
                }
            } 

            else {
                $view = new View();
                $view->showAll($kayttajat);
            }
        } catch (Exception $e) {
            echo "booty hole" . $e->getMessage();
        }
        break;
    case 'POST':
    try {
        if(isset($_POST['action'])) {
            $action = $_POST['action'];

            if($action = 'add') {
                $kayttaja = new Kayttaja();
                $kayttaja->addKayttaja();
            }
            
            if($action == 'update') {     
                $kayttaja = new Kayttaja();
                $kayttaja->updateKayttaja();
            }
        }
    } catch (Exception $e) {
        echo "lol" . $e->getMessage();
    }

        break;
    default:
}
?>
