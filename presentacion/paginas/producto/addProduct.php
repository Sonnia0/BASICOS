<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
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
            <h1 class="text-3xl font-bold text-gray-800">Ingresar Producto</h1>
        </div>

        <form id="productForm" action="agregar_producto.php" method="post" enctype="multipart/form-data" class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
            <div class="mb-4">
                <label for="nameProduct" class="block mb-2 text-sm font-bold text-gray-700">Nombre del Producto:</label>
                <input type="text" id="nameProduct" name="nameProduct" placeholder="Ingrese el nombre del producto"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="descriptionProduct" class="block mb-2 text-sm font-bold text-gray-700">Descripción:</label>
                <textarea id="descriptionProduct" name="descriptionProduct" placeholder="Ingrese la descripción del producto"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"></textarea>
            </div>
            <div class="mb-4">
                <label for="priceProduct" class="block mb-2 text-sm font-bold text-gray-700">Precio:</label>
                <input type="number" step="0.01" id="priceProduct" name="priceProduct" placeholder="Ingrese el precio del producto"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="photoProduct" class="block mb-2 text-sm font-bold text-gray-700">Foto:</label>
                <input type="file" id="photoProduct" name="photoProduct" accept="image/*"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="categoryProduct" class="block mb-2 text-sm font-bold text-gray-700">Categoría:</label>
                <select id="categoryProduct" name="categoryProduct"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    <option value="">Seleccione una categoría</option>
                    <!-- Las opciones se llenarán dinámicamente con JavaScript -->
                </select>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Ingresar</button>
            </div>
        </form>
    </div>
    <script src="../../scripts/producto/add-product.js"></script>
</body>

</html>