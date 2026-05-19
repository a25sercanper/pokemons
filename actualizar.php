<?php
// actualizar.php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $tipus = $_POST['tipus'];
    $nivell = $_POST['nivell'];
    $descripcio = $_POST['descripcio'];
    $imatge_url = $_POST['imatge_url'];

    try {
        $stmt = $pdo->prepare("UPDATE pokemons SET nom = ?, tipus = ?, nivell = ?, descripcio = ?, imatge_url = ? WHERE id = ?");
        $stmt->execute([$nom, $tipus, $nivell, $descripcio, $imatge_url, $id]);
        
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        die("Error en actualitzar: " . $e->getMessage());
    }
}
?>