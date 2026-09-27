<?php

session_start();

<<<<<<< HEAD
// Eliminar el pedido activo
=======
header("Content-Type: application/json");

>>>>>>> 00d72c76c897646441071b940a6cf751e9d1f6ff
unset($_SESSION["pedido"]);

echo json_encode([
    "ok" => true
]);

<<<<<<< HEAD
?>
=======
?>
>>>>>>> 00d72c76c897646441071b940a6cf751e9d1f6ff
