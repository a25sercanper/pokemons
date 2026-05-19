<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestió de Pokémons - PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4"> Gestor de la Pokedex </h1>

        <div id="results" class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 mb-5">
            <?php include 'listar.php'; ?>
        </div>

        <hr class="my-5">

        <div class="row justify-content-center">
            <div class="col-md-8 mb-4">
                <div class="card border-success h-100">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Crear Nou Pokémon</h4>
                    </div>
                    <div class="card-body">
                        <form action="insertar.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Nom</label>
                                <input type="text" name="nom" class="form-control" placeholder="Ex: Pikachu" required>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label">Tipus</label>
                                    <input type="text" name="tipus" class="form-control" placeholder="Ex: Elèctric" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Nivell</label>
                                    <input type="number" name="nivell" class="form-control" placeholder="Ex: 5" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descripció</label>
                                <textarea name="descripcio" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">URL Imatge</label>
                                <input type="text" name="imatge_url" class="form-control" placeholder="http://...">
                            </div>
                            <button type="submit" class="btn btn-success w-100">Crear Pokémon</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/app.js"></script>
</body>
</html>