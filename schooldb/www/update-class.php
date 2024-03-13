<?php

require_once('../db_config.php');

if (isset($_POST['updateClass'])) {

    $classID = filter_var($_POST['classID'], FILTER_SANITIZE_NUMBER_INT);
    $className = filter_var($_POST['className'], FILTER_UNSAFE_RAW);
    $query = "UPDATE classes SET className=:className
              WHERE classID=:classID";
    $result = $db_connection -> prepare($query);
    $result -> execute([
        'classID' => $classID,
        'className' => $className,
    ]);
    $rows = $result -> rowCount();
    if ($rows == 1) {
        header('Location: list-classes.php');
    } else {
        $error_message = "Updating class failed";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
</head>
<body>
    
    <br>
    <div class="container">
        <?php
        if(isset($error_message)) {
            ?>
            <div class="alert alert-success">
                <strong>Error!</strong>
                <?php echo $error_message; ?>
            </div>
            <?php
        }
        ?>
    </div>

</body>

</html>