<?php

require_once("view.php");
require_once("model.php");
require_once("db_config.php");

$view = new View();
$model = new KayttajaModel();

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ($action == 'edit') {
            $userId = isset($_GET['id']) ? $_GET['id'] : 0;
            $user = $model->getUserById($userId);
            $view->editPage($user);
        } else {
            $users = $model->getAllUsers();
            $view->showAll($users);
        }
        break;
    case 'POST':
        if ($action == 'update') {
            $userId = isset($_POST['kayttajaid']) ? $_POST['kayttajaid'] : 0;
            $etunimi = isset($_POST['etunimi']) ? $_POST['etunimi'] : '';
            $sukunimi = isset($_POST['sukunimi']) ? $_POST['sukunimi'] : '';

            if (!empty($userId) && !empty($etunimi) && !empty($sukunimi)) {
                $user = new Kayttaja($userId, $etunimi, $sukunimi);
                $model->updateUser($user);
                
                // Redirect back to the view
                header("Location: index.php");
                exit();
            } else {
                echo "Virheelliset tiedot.";
            }
        }
        break;
    default:
}

?>