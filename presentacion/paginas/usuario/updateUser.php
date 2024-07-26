<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Tailwind CSS</title>
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
            <h1 class="text-3xl font-bold text-gray-800">Actualizar Usuarios</h1>
        </div>

        <form id="updateUserForm" class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
            <input type="hidden" id="idUser" name="idUser" value="">
            <div class="mb-4">
                <label for="nameUser" class="block mb-2 text-sm font-bold text-gray-700">Nombre:</label>
                <input type="text" id="nameUser" name="nameUser" placeholder="Ingrese su nombre"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="lastnameUser" class="block mb-2 text-sm font-bold text-gray-700">Apellido:</label>
                <input type="text" id="lastnameUser" name="lastnameUser" placeholder="Ingrese su apellido"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="emailUser" class="block mb-2 text-sm font-bold text-gray-700">Correo Electrónico:</label>
                <input type="email" id="emailUser" name="emailUser" placeholder="Ingrese su correo electrónico"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="passwordUser" class="block mb-2 text-sm font-bold text-gray-700">Contraseña:</label>
                <input type="password" id="passwordUser" name="passwordUser" placeholder="Ingrese su contraseña"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Actualizar Usuario</button>
            </div>
        </form>
    </div>
    <script src="../../scripts/usuario/update-user.js"></script>
</body>

</html>
