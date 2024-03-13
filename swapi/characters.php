<?php
session_start();
if(isset($_GET['uid']) && isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    $url = "https://www.swapi.tech/api/films/$uid";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($result, true);

    $properties = $result['result']['properties'];
    $characters = $properties['characters'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>swapie free phone 2 dodlfl</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>List of Characters</h2>
                    </div>
                </div>
            </div>
            <?php
            if(isset($result)) {
                ?>
                    <table class="table table-bordered">
                        <tbody>
                        <?php foreach($characters as $character) {
                                $url = $character;
                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, $url);

                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                $result = curl_exec($ch);
                                curl_close($ch);
                                $result = json_decode($result, true);

                                $properties = $result['result']['properties'];
                                $name = $properties['name'];
                            ?>
                            <tr>
                                <td><?php echo $name ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
            <?php
            } else {
                echo "faIL!";
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>