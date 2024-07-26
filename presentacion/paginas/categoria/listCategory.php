<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Categorías con Tailwind CSS</title>
    <!-- Incluye Tailwind CSS -->
    <link href="../../estilos/tailwind.css" rel="stylesheet">
    <!-- Enlace a Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Barra de navegación -->
    <?php include('../../componentes/navigation.php'); ?>

    <div class="container max-w-3xl py-8 mx-auto">
        <!-- Encabezado -->
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Gestión de Categorías</h1>
            <a href="addCategory.php" class="px-4 py-2 font-bold text-white bg-yellow-500 rounded hover:bg-yellow-700 focus:outline-none focus:shadow-outline">Crear Categoría</a>
        </div>
        <div class="flex items-center justify-center mb-4">
            <input type="text" id="search-bar" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Buscar categorias...">
            <button id="search-button" class="px-4 py-2 ml-2 text-white bg-red-500 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Buscar</button>
        </div>
        <!-- Tabla de Categorías -->
        <div class="my-6 bg-white rounded shadow-md">
            <table class="min-w-full bg-white" id="table-category">
                <thead class="text-black bg-gray-800">
                    <tr>
                        <th class="px-6 py-2 text-left">ID</th>
                        <th class="px-6 py-2 text-left">Nombre</th>
                        <th class="px-6 py-2 text-left">Descripción</th>
                        <th class="px-6 py-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <!-- Aquí se llenarán dinámicamente los datos de las categorías -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="../../scripts/categoria/main.js"></script>
</body>
</html>

