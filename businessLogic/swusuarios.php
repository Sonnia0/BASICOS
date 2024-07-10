<?php
include('../dataAccess/dataAccessLogic/Usuario.php');

$response = array('success' => false, 'message' => 'Solicitud inválida');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Leer usuarios
    $conexionDB = new ConexionDB();
    $usuario = new Usuario($conexionDB);
    $usuarios = $usuario->readUsuarios();
    echo json_encode($usuarios);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Agregar usuario
    $data = json_decode(file_get_contents('php://input'), true);
    $nombre = $data['Nombre'];
    $apellido = $data['Apellido'];
    $correo = $data['Correo'];
    $contraseña = $data['Contraseña'];
    $tipoCuenta = $data['Tipo_cuenta'];

    $conexionDB = new ConexionDB();
    $usuario = new Usuario($conexionDB);
    $usuario->setNombre($nombre);
    $usuario->setApellido($apellido);
    $usuario->setCorreo($correo);
    $usuario->setContraseña($contraseña);
    $usuario->setTipoCuenta($tipoCuenta);

    if ($usuario->addUsuario()) {
        $response['success'] = true;
        $response['message'] = 'Usuario agregado correctamente';
    } else {
        $response['message'] = 'Error al agregar el usuario';
    }
    echo json_encode($response);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Actualizar usuario
    $data = json_decode(file_get_contents('php://input'), true);
    $idUsuario = $data['id_usuario'];
    $nombre = $data['Nombre'];
    $apellido = $data['Apellido'];
    $correo = $data['Correo'];
    $contraseña = $data['Contraseña'];
    $tipoCuenta = $data['Tipo_cuenta'];

    $conexionDB = new ConexionDB();
    $usuario = new Usuario($conexionDB);
    $usuario->setId($idUsuario);
    $usuario->setNombre($nombre);
    $usuario->setApellido($apellido);
    $usuario->setCorreo($correo);
    $usuario->setContraseña($contraseña);
    $usuario->setTipoCuenta($tipoCuenta);

    if ($usuario->updateUsuario($idUsuario)) {
        $response['success'] = true;
        $response['message'] = 'Usuario actualizado correctamente';
    } else {
        $response['message'] = 'Error al actualizar el usuario';
    }
    echo json_encode($response);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // Eliminar usuario
    $idUsuario = intval($_GET['id_usuario']);

    $conexionDB = new ConexionDB();
    $usuario = new Usuario($conexionDB);
    if ($usuario->deleteUsuario($idUsuario)) {
        $response['success'] = true;
        $response['message'] = 'Usuario eliminado correctamente';
    } else {
        $response['message'] = 'Error al eliminar el usuario';
    }
    echo json_encode($response);
    exit;
}

echo json_encode($response);
?>