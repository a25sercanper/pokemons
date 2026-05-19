<?php
// conexion.php
$host = 'localhost';
$dbname = 'a25sercanper_api'; // Canvia-ho pel nom real
$user = 'a25sercanper_a'; // El teu usuari
$pass = 'qQqQ1-1-'; // La teva contrasenya

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    // Configurem PDO perquè llanci excepcions en cas d'error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de connexió: " . $e->getMessage());
}
?>