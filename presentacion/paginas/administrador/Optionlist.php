<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Navegación con Cardview y Íconos</title>
    <!-- Incluye Tailwind CSS -->
    <link href="../../estilos/tailwind.css" rel="stylesheet">
    <!-- Incluye FontAwesome para los íconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Barra de navegación -->
    <?php include '../../componentes/navigation.php'; ?>

    <!-- Contenido principal -->
    <div class="container grid max-w-3xl grid-cols-3 gap-4 py-8 mx-auto">
        <!-- Cardview con ícono -->
        <div class="max-w-sm overflow-hidden bg-white rounded shadow-lg">
            <div class="px-6 py-4">
                <div class="flex items-center mb-4">
                    <i class="mr-2 text-3xl text-blue-500 fas fa-user-circle"></i>
                    <div class="text-xl font-bold">Usuarios</div>
                </div>
                <p class="text-base text-justify text-gray-700">
                    La sección de administración de usuarios te permite gestionar de manera eficiente todos los usuarios registrados en tu plataforma.
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <a href="../usuario/listUser.php"
                    class="inline-block px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                    Acción
                </a>
            </div>
        </div>
    </div>
</body>

</html>
