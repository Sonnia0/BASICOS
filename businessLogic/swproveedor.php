<?php
require_once '../dataAccess/dataAccessLogic/Proveedor.php';

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $cedula = $_POST['cedula'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $empresa = $_POST['empresa'];

    try {
        // Conexión a la base de datos
        $conexionDB = new ConexionDB();
        $conexion = $conexionDB->conectar();

        // Crear objeto Proveedor y establecer valores
        $proveedor = new Proveedor($conexion);
        $proveedor->setCedula($cedula);
        $proveedor->setNombres($nombres);
        $proveedor->setApellidos($apellidos);
        $proveedor->setTelefono($telefono);
        $proveedor->setEmail($email);
        $proveedor->setEmpresa($empresa);

        // Insertar proveedor
        if ($proveedor->addProveedor()) {
            $response['success'] = true;
            $response['message'] = 'Proveedor agregado correctamente';
        } else {
            $response['message'] = 'Error al agregar el proveedor';
        }
    } catch (PDOException $e) {
        $response['message'] = 'Error en la conexión: ' . $e->getMessage();
    }

    echo json_encode($response);
    exit;
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        // Conexión a la base de datos
        $conexionDB = new ConexionDB();
        $conexion = $conexionDB->conectar();

        // Crear objeto Proveedor
        $proveedor = new Proveedor($conexion);

        // Leer proveedores
        $proveedores = $proveedor->readProveedores();
        $response['success'] = true;
        $response['proveedores'] = $proveedores;
    } catch (PDOException $e) {
        $response['message'] = 'Error en la conexión: ' . $e->getMessage();
    }

    echo json_encode($response);
    exit;
} elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    $id = $_PUT['id'];
    $cedula = $_PUT['cedula'];
    $nombres = $_PUT['nombres'];
    $apellidos = $_PUT['apellidos'];
    $telefono = $_PUT['telefono'];
    $email = $_PUT['email'];
    $empresa = $_PUT['empresa'];

    try {
        // Conexión a la base de datos
        $conexionDB = new ConexionDB();
        $conexion = $conexionDB->conectar();

        // Crear objeto Proveedor y establecer valores
        $proveedor = new Proveedor($conexion);
        $proveedor->setCedula($cedula);
        $proveedor->setNombres($nombres);
        $proveedor->setApellidos($apellidos);
        $proveedor->setTelefono($telefono);
        $proveedor->setEmail($email);
        $proveedor->setEmpresa($empresa);

        // Actualizar proveedor
        if ($proveedor->updateProveedor($id)) {
            $response['success'] = true;
            $response['message'] = 'Proveedor actualizado correctamente';
        } else {
            $response['message'] = 'Error al actualizar el proveedor';
        }
    } catch (PDOException $e) {
        $response['message'] = 'Error en la conexión: ' . $e->getMessage();
    }

    echo json_encode($response);
    exit;
} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $id = $_DELETE['id'];

    try {
        // Conexión a la base de datos
        $conexionDB = new ConexionDB();
        $conexion = $conexionDB->conectar();

        // Crear objeto Proveedor
        $proveedor = new Proveedor($conexion);

        // Eliminar proveedor
        if ($proveedor->deleteProveedor($id)) {
            $response['success'] = true;
            $response['message'] = 'Proveedor eliminado correctamente';
        } else {
            $response['message'] = 'Error al eliminar el proveedor';
        }
    } catch (PDOException $e) {
        $response['message'] = 'Error en la conexión: ' . $e->getMessage();
    }

    echo json_encode($response);
    exit;
}

// Si no es una solicitud soportada, devolver un mensaje de error
$response['message'] = 'Método no permitido';
echo json_encode($response);
exit;
?>
