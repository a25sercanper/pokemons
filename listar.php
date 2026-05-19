<?php
// listar.php
require_once 'conexion.php';

try {
    $stmt = $pdo->query("SELECT * FROM pokemons ORDER BY id DESC");
    $pokemons = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($pokemons) > 0) {
        foreach ($pokemons as $poke) {
            $descripcio = !empty($poke['descripcio']) ? htmlspecialchars($poke['descripcio']) : 'Sense descripció';
            $imatge = !empty($poke['imatge_url']) ? htmlspecialchars($poke['imatge_url']) : 'https://via.placeholder.com/150?text=No+Image';
            
            echo '
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="'.$imatge.'" class="card-img-top pokemon-img-card p-3" alt="'.htmlspecialchars($poke['nom']).'" onerror="this.src=\'https://via.placeholder.com/150?text=No+Image\'">
                    <div class="card-body">
                        <h5 class="card-title text-center">'.htmlspecialchars($poke['nom']).'</h5>
                        <span class="badge bg-info text-dark mb-2">'.htmlspecialchars($poke['tipus']).'</span>
                        <span class="badge bg-secondary mb-2">Nv. '.htmlspecialchars($poke['nivell']).'</span>
                        <p class="card-text small text-muted">'.$descripcio.'</p>
                    </div>
                    <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                        <small class="text-muted">ID: '.htmlspecialchars($poke['id']).'</small>
                        <div class="btn-group">
                            <a href="editar.php?id='.$poke['id'].'" class="btn btn-sm btn-outline-warning">Editar</a>
                            <form action="eliminar.php" method="POST" class="d-inline" onsubmit="confirmarEsborrat(event)">
                                <input type="hidden" name="id" value="'.$poke['id'].'">
                                <button type="submit" class="btn btn-sm btn-outline-danger">Esborrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>';
        }
    } else {
        echo '<div class="alert alert-warning w-100 text-center">No hi ha pokémons a la base de dades.</div>';
    }
} catch (PDOException $e) {
    echo '<div class="alert alert-danger w-100">Error en obtenir dades: ' . $e->getMessage() . '</div>';
}
?>