<?php
session_start();
include('conexion.php');
if(isset($_SESSION['usuarioingresando']))
{
header('location: productos_tabla.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>E-COMMERCE</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/styles.css">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-100 flex justify-center items-center min-h-screen">

<div class="FormCajaLogin bg-blue-400 p-8 rounded shadow-lg w-full max-w-md">

  <div class="FormLogin">
    <div class="botondeintercambiar flex justify-center mb-4">
      <div id="btnvai"></div>
      <button type="button" class="botoncambiarcaja bg-blue-500 text-white px-4 py-2 rounded-l" onclick="loginvai()" id="vaibtnlogin">Login</button>
      <button type="button" class="botoncambiarcaja bg-gray-300 text-gray-700 px-4 py-2 rounded-r" onclick="registrarvai()" id="vaibtnregistrar">Registrar</button>
    </div>

    <!-- formulario login -->
    <form method="POST" id="frmlogin" class="grupo-entradas space-y-4" action="usuario_login.php">
      <h1 class="text-2xl font-bold mb-4">Iniciar sesión</h1>

      <div class="TextoCajas">• Ingresar correo</div>
      <input type="email" name="txtcorreo" class="CajaTexto border rounded w-full py-2 px-3" autocomplete="off" required>

      <div class="TextoCajas">• Ingresar password</div>
      <input type="password" name="txtpassword" class="CajaTexto border rounded w-full py-2 px-3" autocomplete="off" required>

      <div>
        <input type="submit" value="Iniciar sesión" class="BtnLogin bg-blue-500 text-white py-2 px-4 rounded cursor-pointer hover:bg-blue-600" name="btningresar">
      </div>
    </form>

    <!-- formulario registrar -->
    <form method="post" id="frmregistrar" class="grupo-entradas space-y-4 hidden" action="usuario_registrar.php">
      <h1 class="text-2xl font-bold mb-4">Crear nueva cuenta</h1>

      <div class="TextoCajas">• Ingresar nombre</div>
      <input type="text" name="txtnombre1" class="CajaTexto border rounded w-full py-2 px-3" autocomplete="off" required>

      <div class="TextoCajas">• Ingresar correo</div>
      <input type="email" name="txtcorreo1" class="CajaTexto border rounded w-full py-2 px-3" autocomplete="off" required>

      <div class="TextoCajas">• Ingresar password</div>
      <input type="password" name="txtpassword1" class="CajaTexto border rounded w-full py-2 px-3" autocomplete="off" required>

      <div>
        <input type="submit" value="Crea nueva cuenta" class="BtnRegistrar bg-green-500 text-white py-2 px-4 rounded cursor-pointer hover:bg-green-600" name="btnregistrar">
      </div>
    </form>
  </div>
</div>

<script src="js/boton_formulario.js"></script>
</body>
</html>
