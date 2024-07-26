<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link href="../../estilos/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Barra de navegación -->
    <?php include('../../componentes/navigation.php'); ?>

    <div class="container max-w-3xl py-8 mx-auto">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Listado de Productos</h1>
            <a href="../producto/addProduct.php" class="px-4 py-2 font-bold text-white bg-purple-500 rounded hover:bg-purple-700">Agregar Producto</a>
        </div>

        <input type="text" id="search-bar" placeholder="Buscar productos..." class="p-2 mb-4 border border-gray-300 rounded">
        <button id="search-button" class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">Buscar</button>

        <div class="my-6 bg-white rounded shadow-md">
            <table class="min-w-full bg-white" id="table-product">
                <thead class="text-black bg-gray-800">
                    <tr>
                        <th class="px-6 py-2 text-left">ID</th>
                        <th class="px-6 py-2 text-left">Nombre</th>
                        <th class="px-6 py-2 text-left">Descripción</th>
                        <th class="px-6 py-2 text-left">Precio</th>
                        <th class="px-6 py-2 text-left">Foto</th>
                        <th class="px-6 py-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <!-- Aquí se llenarán dinámicamente los datos de los productos -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="../../scripts/producto/main.js"></script>
</body>
</html>
