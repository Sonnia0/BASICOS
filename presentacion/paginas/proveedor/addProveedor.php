<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Proveedor</title>
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
            <h1 class="text-3xl font-bold text-gray-800">Ingresar Proveedor</h1>
        </div>

        <form id="proveedorForm" class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
            <div class="mb-4">
                <label for="nombre" class="block mb-2 text-sm font-bold text-gray-700">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="apellido" class="block mb-2 text-sm font-bold text-gray-700">Apellido:</label>
                <input type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="correo" class="block mb-2 text-sm font-bold text-gray-700">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" placeholder="Ingrese su correo electrónico"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="telefono" class="block mb-2 text-sm font-bold text-gray-700">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" placeholder="Ingrese su teléfono"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Ingresar</button>
            </div>
        </form>
    </div>
    <script src="../../scripts/proveedor/add-proveedor.js"></script>
</body>

</html>
