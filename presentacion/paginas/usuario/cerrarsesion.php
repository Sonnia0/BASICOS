<?php
// Mostramos la sesion
session_start();
// Destruimos la sesion
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cerrar Sesión</title>
    <link href="../../estilos/tailwind.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 text-center bg-white rounded-lg shadow-md">
        <h2 class="mb-4 text-2xl font-bold">Has cerrado sesión correctamente</h2>
        <p class="mb-4">Tu sesión ha sido cerrada.</p>
        <a href="inicio.php" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Ir al Login</a>
    </div>
</body>
</html>

