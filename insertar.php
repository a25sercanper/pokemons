<?php
// insertar.php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $tipus = $_POST['tipus'];
    $nivell = $_POST['nivell'];
    $descripcio = $_POST['descripcio'];
    $imatge_url = $_POST['imatge_url'];

    try {
        $stmt = $pdo->prepare("INSERT INTO pokemons (nom, tipus, nivell, descripcio, imatge_url) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nom, $tipus, $nivell, $descripcio, $imatge_url]);
        
        header("Location: index.php"); // Redirigeix a l'inici després de crear
        exit();
    } catch (PDOException $e) {
        die("Error en inserir: " . $e->getMessage());
    }
}
?>