// /js/app.js

function confirmarEsborrat(event) {
    if (!confirm("Estàs segur que vols esborrar aquest Pokémon de la teva Pokedex?")) {
        // Si l'usuari cancel·la, evitem que el formulari s'enviï a eliminar.php
        event.preventDefault();
    }
}