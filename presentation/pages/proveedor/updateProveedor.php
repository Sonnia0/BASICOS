<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Proveedor</title>
    <!-- Incluye Tailwind CSS -->
    <link href="../../styles/tailwind.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto max-w-md py-8">
        <!-- Encabezado -->
        <div class="flex items-center justify-between mb-4 text-justify">
            <h1 class="text-3xl font-bold text-gray-800">Actualizar Proveedor</h1>
        </div>

        <!-- Formulario de actualización de proveedor -->
        <form id="updateProveedorForm" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <input type="hidden" id="idProveedor" name="idProveedor" value="">
            <div class="mb-4">
                <label for="cedulaProveedor" class="block text-gray-700 text-sm font-bold mb-2">Cédula:</label>
                <input type="text" id="cedulaProveedor" name="cedulaProveedor" placeholder="Ingrese la cédula del proveedor"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="nombreProveedor" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                <input type="text" id="nombreProveedor" name="nombreProveedor" placeholder="Ingrese el nombre del proveedor"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="apellidoProveedor" class="block text-gray-700 text-sm font-bold mb-2">Apellido:</label>
                <input type="text" id="apellidoProveedor" name="apellidoProveedor" placeholder="Ingrese el apellido del proveedor"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="telefonoProveedor" class="block text-gray-700 text-sm font-bold mb-2">Teléfono:</label>
                <input type="text" id="telefonoProveedor" name="telefonoProveedor" placeholder="Ingrese el teléfono del proveedor"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="emailProveedor" class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico:</label>
                <input type="email" id="emailProveedor" name="emailProveedor" placeholder="Ingrese el correo electrónico del proveedor"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="empresaProveedor" class="block text-gray-700 text-sm font-bold mb-2">Empresa:</label>
                <input type="text" id="empresaProveedor" name="empresaProveedor" placeholder="Ingrese el nombre de la empresa del proveedor"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Actualizar Proveedor</button>
            </div>
        </form>
    </div>
    <script src="../../scripts/proveedor/update-proveedor.js"></script>
</body>

</html>
