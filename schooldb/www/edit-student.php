<?php
    require_once('../db_config.php');
    $studentID = $_GET['id'];
    $query = "SELECT * FROM students WHERE studentID = :studentID LIMIT 1";
    $result = $db_connection->prepare($query);
    $result->execute([
    'studentID' => $studentID
    ]);
    $result = $result->fetch();
?>
<!DOCTYPE html>
<html_lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit student</title>
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
        <form method="post" action="update-student.php">
            <div class="form-group-row">
                <label for="studentID" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="number" readonly class="form-control" id="studentID" name="studentID" value="<?php echo $result['studentID'] ?>">
                </div>
            </div>
            <div class="form-group-row">
                <label for="firstName" class="col-sm-2 col-form-label">First name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $result['firstName'] ?>">
                </div>
            </div>
            <div class="form-group-row">
                <label for="lastName" class="col-sm-2 col-form-label">Last name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $result['lastName'] ?>">
                </div>
            </div>
            <div class="form-group-row">
                <label for="dateOfBirth" class="col-sm-2 col-form-label">Date of birth</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" value="<?php echo $result['dateOfBirth'] ?>">
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

                        $currentClassID = $result['class'];

                        foreach ($classes as $class) {
                            $selected = ($class['classID'] == $currentClassID) ? 'selected' : '';
                            echo "<option value='" . $class['classID'] . "' $selected>" . $class['className'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <br>
            <button type="submit" name="updateStudent" class="btn btn-success">Update</button>

        </form>
    </div>

</body>

</html>