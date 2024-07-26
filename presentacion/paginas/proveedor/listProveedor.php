<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Proveedores</title>
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
            <h1 class="text-3xl font-bold text-gray-800">Gestión de Proveedores</h1>
            <a href="addProveedor.php" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Crear Proveedor</a>
        </div>

        <!-- Tabla de Proveedores -->
        <div class="my-6 bg-white rounded shadow-md">
            <table class="min-w-full bg-white" id="table-proveedor">
                <thead class="text-black bg-gray-800">
                    <tr>
                        <th class="px-6 py-2 text-left">ID</th>
                        <th class="px-6 py-2 text-left">Nombre</th>
                        <th class="px-6 py-2 text-left">Apellido</th>
                        <th class="px-6 py-2 text-left">Correo Electrónico</th>
                        <th class="px-6 py-2 text-left">Teléfono</th>
                        <th class="px-6 py-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <!-- Aquí se llenarán dinámicamente los datos de los proveedores -->
                    <?php
                    include '../../dataAccess/conexion/Conexion.php';
                    include '../../dataAccess/dataAccessLogic/Proveedor.php';

                    $objConexion = new ConexionDB();
                    $objProveedor = new Proveedor($objConexion);
                    $proveedores = $objProveedor->readProveedor();

                    foreach ($proveedores as $proveedor) {
                        echo "<tr>";
                        echo "<td class='px-6 py-2'>{$proveedor['idProveedor']}</td>";
                        echo "<td class='px-6 py-2'>{$proveedor['nombre']}</td>";
                        echo "<td class='px-6 py-2'>{$proveedor['apellido']}</td>";
                        echo "<td class='px-6 py-2'>{$proveedor['correo']}</td>";
                        echo "<td class='px-6 py-2'>{$proveedor['telefono']}</td>";
                        echo "<td class='px-6 py-2'>";
                        echo "<a href='updateProveedor.php?id={$proveedor['idProveedor']}' class='px-4 py-2 mr-2 font-bold text-white bg-green-500 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline'>Editar</a>";
                        echo "<a href='deleteProveedor.php?id={$proveedor['idProveedor']}' class='px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700 focus:outline-none focus:shadow-outline' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este proveedor?\")'>Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../../scripts/proveedor/main.js"></script>
</body>
</html>
