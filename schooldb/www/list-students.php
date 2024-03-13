<?php
require_once('../db_config.php');
 
$query = "SELECT * FROM students INNER JOIN classes ON class = classID";
 
$results = $db_connection->query($query);
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
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

    <div class="container">
        <h1 class="display-1 text-center">Students</h1>
        <a href="add-student.php" class="btn btn-info">Add new student</a>
        <table class="table">
            <thead>
                <tr>
                    <th>StudentID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of birth</th>
                    <th>Class</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results as $result) {
                ?>
                    <tr>
                        <td>
                            <?php echo $result['studentID'] ?>
                        </td>
                        <td>
                            <?php echo $result['firstName'] ?>
                        </td>
                        <td>
                            <?php echo $result['lastName'] ?>
                        </td>
                        <td>
                            <?php echo $result['dateOfBirth'] ?>
                        </td>
                        <td>
                            <?php echo $result['className'] ?>
                        </td>
                        <td><a href="edit-student.php?id=<?php echo $result['studentID'] ?>"><i class="fas fa-edit"></i>
                        </a></td>
                        <td><a href="delete-student.php?id=<?php echo $result['studentID'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                <?php
                }
                ?>
 
            </tbody>
            </table>
            </div>
</body>
</html>