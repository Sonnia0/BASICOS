<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Categoría</title>
    <!-- Incluye Tailwind CSS -->
    <link href="../../estilos/tailwind.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Barra de navegación -->
    <?php include ('../../componentes/navigation.php'); ?>

    <div class="container max-w-md py-8 mx-auto">
        <!-- Encabezado -->
        <div class="flex items-center justify-between mb-4 text-justify">
            <h1 class="text-3xl font-bold text-gray-800">Actualizar Categoría</h1>
        </div>

        <form id="updateCategoryForm" class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
            <div class="mb-4">
                <label for="idCategoria" class="block mb-2 text-sm font-bold text-gray-700">ID de la Categoría:</label>
                <input type="text" id="idCategoria" name="idCategoria" placeholder="Ingrese el ID de la categoría"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="nombreCategoria" class="block mb-2 text-sm font-bold text-gray-700">Nombre de la Categoría:</label>
                <input type="text" id="nombreCategoria" name="nombreCategoria" placeholder="Ingrese el nombre de la categoría"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="descripcion" class="block mb-2 text-sm font-bold text-gray-700">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" placeholder="Ingrese la descripción de la categoría"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Actualizar</button>
            </div>
        </form>
    </div>
    <script src="../../scripts/categoria/update-category.js"></script>
</body>

</html>
