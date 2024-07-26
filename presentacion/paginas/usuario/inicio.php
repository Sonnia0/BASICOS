<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link href="../../estilos/tailwind.css" rel="stylesheet">
</head>

<body class="flex items-center justify-center h-screen bg-blue-400">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md">
        <?php 
        if(isset($_SESSION["email"])){
            echo "<p class='text-xl'>Has iniciado sesión como: <span class='font-bold'>" . $_SESSION["email"] . "</span></p>";
            echo "<p class='mt-4'><a class='text-blue-500 underline' href='cerrarsesion.php'>Cerrar sesión</a></p>";
            echo "<p class='mt-2'><a class='text-blue-500 underline' href='panelcontrol.php'>Ir al panel de control</a></p>";
        } else {
        ?>    
            <h2 class="mb-4 text-2xl font-bold">Iniciar sesión</h2>
            <form action="login.php" method="post">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" placeholder="Ingrese su correo electrónico" required class="w-full p-2 mt-2 border border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Contraseña:</label>
                    <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" required class="w-full p-2 mt-2 border border-gray-300 rounded">
                </div>
                <div>
                    <a type="submit" class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600" href="../administrador/Optionlist.php">Iniciar sesión</a>
                </div>
            </form>
            <p class="mt-4">¿No tienes una cuenta? <a class="text-blue-500 underline" href="registro.php">Regístrate aquí</a></p>
        <?php 
        } 
        ?>    
    </div>
</body>
</html>
