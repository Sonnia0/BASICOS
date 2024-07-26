<?php
include '../dataAccess/conexion/Conexion.php';
include '../dataAccess/dataAccessLogic/Proveedor.php';

/**
 * Web Service RESTful en PHP con MySQL (CRUD)
 */

//delete provider
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $idProveedor = intval($_GET['id']);
    $objConexion = new ConexionDB();
    $objProveedor = new Proveedor($objConexion);

    $objProveedor->setIdProveedor($idProveedor);
    if ($objProveedor->deleteProveedor()) {
        echo json_encode(['success' => true, 'message' => 'Proveedor eliminado correctamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al eliminar el proveedor']);
    }
    exit;
}

// Add provider
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $objConexion = new ConexionDB();
    $objProveedor = new Proveedor($objConexion);

    $objProveedor->setNombre($nombre);
    $objProveedor->setApellido($apellido);
    $objProveedor->setCorreo($correo);
    $objProveedor->setTelefono($telefono);

    if ($objProveedor->addProveedor()) {
        echo json_encode(['success' => true, 'message' => 'Proveedor agregado exitosamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al agregar el proveedor']);
    }
    exit;
}

//read provider
else if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $objConexion = new ConexionDB();
    $objProveedor = new Proveedor($objConexion);
    $array = $objProveedor->readProveedor();
    echo json_encode($array);
    exit;
}

// Update provider
else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    $data = json_decode(file_get_contents('php://input'), true);

    // Obtener los valores del objeto JSON
    $idProveedor = intval($data['id']);
    $nombre = $data['nombre'];
    $apellido = $data['apellido'];
    $correo = $data['correo'];
    $telefono = $data['telefono'];

    $objConexion = new ConexionDB();
    $objProveedor = new Proveedor($objConexion);

    $objProveedor->setIdProveedor($idProveedor);
    $objProveedor->setNombre($nombre);
    $objProveedor->setApellido($apellido);
    $objProveedor->setCorreo($correo);
    $objProveedor->setTelefono($telefono);

    if ($objProveedor->updateProveedor()) {
        echo json_encode(['success' => true, 'message' => 'Proveedor actualizado correctamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el proveedor']);
    }
    exit;
}

// Si no coincide con ningún método de solicitud, devolver Bad Request
header("HTTP/1.1 400 Bad Request");
?>
