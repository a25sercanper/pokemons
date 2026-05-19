<?php
// eliminar.php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM pokemons WHERE id = ?");
        $stmt->execute([$id]);
        
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        die("Error en esborrar: " . $e->getMessage());
    }
} else {
    header("Location: index.php");
}
?>