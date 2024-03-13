<?php
    $username = $_POST["username"];
    $password = $_POST["password"];

    if($username == "Mikko" && $password == "Miekkakala"){
        header("Location: etusivu.html");

        exit;
    }
    else {
        header("Location: login.html");

        exit;
    }
?>