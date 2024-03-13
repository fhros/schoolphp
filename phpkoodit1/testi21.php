<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <form method="POST" action="laske1.php">
        <div class="mb-3 mt-3">
            <label for="hinta" class="form-label">Hinta</label>
            <input type="number" class="form-control" id="hinta" placeholder="Tuotteen hinta" name="hinta">
        </div>
        <div class="mb-3">
            <label for="vero" class="form-label">Verokanta</label>
            <input type="number" class="form-control" id="vero" placeholder="Tuotteen verokanta" name="vero">
        </div>
        <button type="submit" class="btn btn-primary">Laske</button>
    </form>
</body>
</html>