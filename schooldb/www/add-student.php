<?php

require_once('../db_config.php');

if (isset($_POST['createStudent'])) {
    $firstName = filter_var($_POST['firstName'], FILTER_UNSAFE_RAW);
    $lastName = filter_var($_POST['lastName'], FILTER_UNSAFE_RAW);
    $dateOfBirth = filter_var($_POST['dateOfBirth'], FILTER_UNSAFE_RAW);
    $classID = filter_var($_POST['class'], FILTER_UNSAFE_RAW);
    $query = "INSERT INTO students (firstName, lastName, dateOfBirth, class)
                VALUES (:firstName, :lastName, :dateOfBirth, :class)";
    $result = $db_connection -> prepare($query);
    $result -> execute([
        'firstName' => $firstName,
        'lastName' => $lastName,
        'dateOfBirth' => $dateOfBirth,
        'class' => $classID
    ]);
    $rows = $result -> rowCount();
    if ($rows == 1) {
        header('Location: list-students.php');
    } else {
        $error_message = "Adding student failed";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add student</title>
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
                <label for="firstName" class="col-sm-2 col-form-label">First name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="firstName" name="firstName">
                </div>
            </div>
            <div class="form-group-row">
                <label for="lastName" class="col-sm-2 col-form-label">Last name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lastName" name="lastName">
                </div>
            </div>
            <div class="form-group-row">
                <label for="dateOfBirth" class="col-sm-2 col-form-label">Date of birth</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth">
                </div>
            </div>

            <div class="form-group-row">
                <label for="class" class="col-sm-2 col-form-label">Class</label>
                <div class="col-sm-10">
                    <select name="class" class="form-control">
                        <?php
                        $query = "SELECT classID, className FROM classes";
                        $stmt = $db_connection->prepare($query);
                        $stmt->execute();
                        $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($classes as $class) {
                            echo "<option value='" . $class['classID'] . "'>" . $class['className'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            
            <br>
            <button type="submit" name="createStudent" class="btn btn-success">Add Student</button>
        </form>
    </div>
</body>
</html>