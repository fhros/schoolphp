<?php
session_start();
$url = "https://www.swapi.tech/api/films";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$result = json_decode($result, true);
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
                        <h2>Tähtien sota elokuvat</h2>
                    </div>
                </div>
            </div>
            <?php
            if(isset($result)) {
                ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Opening crawl</th>
                                <th>Director</th>
                                <th>Release Date</th>
                                <th>Starships</th>
                                <th>Characters</th>
                                <th>Planets</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($result['result'] as $film) {
                                $filmData = $film['properties'];
                                $uid = $film['uid'];
                            ?>
                                <tr>
                                    <td><?php echo $filmData['title'] ?></td>
                                    <td type="button" data-bs-toggle="modal" data-bs-target="#Modal<?php echo $uid ?>"><?php echo substr($filmData['opening_crawl'], 0, 50) . "..."; ?></td>
                                    <div class="modal fade" id="Modal<?php echo $uid ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalLabel">Opening Crawl</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php echo $filmData['opening_crawl'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <td><?php echo $filmData['director'] ?></td>
                                    <td><?php echo $filmData['release_date'] ?></td>
                                    <td><a href="starships.php?uid=<?php echo $uid ?>">Starships</a></td>
                                    <td><a href="characters.php?uid=<?php echo $uid ?>">Characters</a></td>
                                    <td><a href="planets.php?uid=<?php echo $uid ?>">Planets</a></td>
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