<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Completo con Tailwind CSS</title>
    <!-- Incluye Tailwind CSS -->
    <link href="../../estilos/tailwind.css" rel="stylesheet">
     <!-- Enlace a Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
     <!-- Barra de navegación -->
     <?php include ('../../componentes/navigation.php'); ?>

    <div class="container max-w-3xl py-8 mx-auto">
        <!-- Encabezado -->
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Gestión de Usuarios</h1>
            <a href="addUser.php" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Crear Usuario</a>
        </div>

        <!-- Tabla de Usuarios -->
        <div class="my-6 bg-white rounded shadow-md" >
            <table class="min-w-full bg-white" id="table-user">
                <thead class="text-black bg-gray-800">
                    <tr>
                        <th class="px-6 py-2 text-left">ID</th>
                        <th class="px-6 py-2 text-left">Nombre</th>
                        <th class="px-6 py-2 text-left">Apellido</th>
                        <th class="px-6 py-2 text-left">Correo Electrónico</th>
                        <th class="px-6 py-2 text-left">Contraseña</th>
                        <th class="px-6 py-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <!-- Aquí se llenarán dinámicamente los datos de los usuarios -->

                </tbody>
            </table>
        </div>
    </div>

    <script src="../../scripts/usuario/main.js"></script>
</body>
</html>
