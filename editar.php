<?php
// editar.php
require_once 'conexion.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM pokemons WHERE id = ?");
$stmt->execute([$id]);
$poke = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$poke) {
    die("Pokémon no trobat.");
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Editar Pokémon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-warning">
                    <div class="card-header bg-warning text-dark">
                        <h4 class="mb-0">Actualitzar Pokémon ID: <?= $poke['id'] ?></h4>
                    </div>
                    <div class="card-body">
                        <form action="actualizar.php" method="POST">
                            <input type="hidden" name="id" value="<?= $poke['id'] ?>">
                            
                            <div class="mb-3">
                                <label class="form-label">Nom</label>
                                <input type="text" name="nom" class="form-control" value="<?= htmlspecialchars($poke['nom']) ?>" required>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label">Tipus</label>
                                    <input type="text" name="tipus" class="form-control" value="<?= htmlspecialchars($poke['tipus']) ?>" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Nivell</label>
                                    <input type="number" name="nivell" class="form-control" value="<?= htmlspecialchars($poke['nivell']) ?>" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descripció</label>
                                <textarea name="descripcio" class="form-control" rows="2"><?= htmlspecialchars($poke['descripcio']) ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">URL Imatge</label>
                                <input type="text" name="imatge_url" class="form-control" value="<?= htmlspecialchars($poke['imatge_url']) ?>">
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-warning w-100">Actualitzar</button>
                                <a href="index.php" class="btn btn-secondary w-100">Cancel·lar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>