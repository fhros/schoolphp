<?php

require_once('../db_config.php');

if (!isset($_GET['id'])) {
    header('Location: list-classes.php');
    die();
} else {
    $classID = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    if (!$classID) {
        header('Location: list-classes.php');
        die();
    } else {
        $query = "DELETE FROM classes
                  WHERE classID = :classID LIMIT 1";
        $result = $db_connection -> prepare($query);
        $result -> execute([
            'classID' => $classID
        ]);
        $rowsdeleted = $result -> rowCount();
        if ($rowsdeleted == 1) {
            header("Location: list-classes.php");
        } else {
            $error_message = "Class was not deleted.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete a Class</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
</head>
<body>
    
    <div class="container">
        <?php
        if (isset($error_message)) {
            ?>
            <div class="alert alert-danger">
                <strong>Virhe!</strong>
                <?php echo $error_message; ?> Mene takaisin <a href="list-classes.php" class="alert-link">luokka listaan</a> 
            </div>
            <?php
        }
        ?>
    </div>
</body>

</html>