<?php
    require_once('../db_config.php');
    $classID = $_GET['id'];
    $query = "SELECT * FROM classes WHERE classID = :classID LIMIT 1";
    $result = $db_connection->prepare($query);
    $result->execute([
    'classID' => $classID
    ]);
    $result = $result->fetch();
?>
<!DOCTYPE html>
<html_lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit class</title>
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
        <form method="post" action="update-class.php">
            <div class="form-group row">
                <label for="classID" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="classID" name="classID" value="<?php echo $result['classID'] ?>">
                </div>
            </div><br>
            <div class="form-group row">
                <label for="className" class="col-sm-2 col-form-label">Class Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="className" name="className" value="<?php echo $result['className'] ?>">
                </div>
            </div>
            <br>
            <button type="submit" name="updateClass" class="btn btn-success">Update</button>

        </form>
    </div>

</body>

</html>