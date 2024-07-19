<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Proveedor</title>
    <!-- Incluye Tailwind CSS -->
    <link href="../../styles/tailwind.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Barra de navegación -->
    <!-- Considera incluir aquí la barra de navegación si es parte común del diseño -->

    <div class="container mx-auto max-w-md py-8">
        <!-- Encabezado -->
        <div class="flex items-center justify-between mb-4 text-justify">
            <h1 class="text-3xl font-bold text-gray-800">Agregar Proveedor</h1>
        </div>

        <form id="proveedorForm" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="../../businessLogic/swproveedores.php">
            <div class="mb-4">
                <label for="cedula" class="block text-gray-700 text-sm font-bold mb-2">Cédula:</label>
                <input type="text" id="cedula" name="cedula" placeholder="Ingrese la cédula"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="nombres" class="block text-gray-700 text-sm font-bold mb-2">Nombres:</label>
                <input type="text" id="nombres" name="nombres" placeholder="Ingrese los nombres"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="apellidos" class="block text-gray-700 text-sm font-bold mb-2">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" placeholder="Ingrese los apellidos"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="telefono" class="block text-gray-700 text-sm font-bold mb-2">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" placeholder="Ingrese el teléfono"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email" placeholder="Ingrese el email"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="empresa" class="block text-gray-700 text-sm font-bold mb-2">Nombre de la Empresa:</label>
                <input type="text" id="empresa" name="empresa" placeholder="Ingrese el nombre de la empresa"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
           
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Agregar</button>
            </div>
        </form>
    </div>
    <!-- Script para el manejo de la lógica del formulario -->
    <script src="../../scripts/proveedor/add-proveedor.js"></script>
</body>

</html>


