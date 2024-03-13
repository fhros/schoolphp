<?php

require_once('../db_config.php');

if (isset($_POST['createClass'])) {
    $className = filter_var($_POST['className'], FILTER_UNSAFE_RAW);
    $query = "INSERT INTO classes (className)
                VALUES (:className)";
    $result = $db_connection -> prepare($query);
    $result -> execute([
        'className' => $className,
    ]);
    $rows = $result -> rowCount();
    if ($rows == 1) {
        header('Location: list-classes.php');
    } else {
        $error_message = "Adding class failed";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add class</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">schooldb or something</a>
            <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="list-classes.php">Class List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="list-students.php">Student list</a>
            </li>
            </ul>
        </div>
    </nav>

    <br>
    <div class="container">
        <?php
        if (isset($error_message)) {
            ?>
            <div class="alert alert-success">
                <strong>Error!</strong>
                <?php echo $error_message; ?>
            </div>
            <?php
        }
        ?>
        <form method="post" action="">
            <div class="form-group-row">
                <label for="className" class="col-sm-2 col-form-label">Class Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="className" name="className">
                </div>
            </div>
            
            <br>
            <button type="submit" name="createClass" class="btn btn-success">Add Class</button>
        </form>
    </div>
</body>
</html>