<?php
header('Content-Type: application/json');
include '../dataAccess/conexion/Conexion.php';
include('../dataAccess/dataAccessLogic/User.php');

/**
 * Web Service RESTful en PHP con MySQL (CRUD)
 */

// Login User
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'login') {
    $emailUser = $_POST['emailUser'];
    $passwordUser = $_POST['passwordUser'];

    $objConexion = new ConexionDB();
    $objUser = new User($objConexion);

    if ($objUser->login($emailUser, $passwordUser)) {
        $response = array('success' => true, 'message' => 'Inicio de sesión exitoso');
    } else {
        $response = array('success' => false, 'message' => 'Credenciales incorrectas');
    }
    echo json_encode($response);
    exit;
}

// Delete user
else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $idUser = intval($_GET['id']);
    $objConexion = new ConexionDB();
    $objUser = new User($objConexion);

    $objUser->setIdUser($idUser);
    if ($objUser->deleteUser()) {
        $response = array('success' => true, 'message' => 'Usuario eliminado correctamente');
    } else {
        $response = array('success' => false, 'message' => 'Error al eliminar el usuario');
    }
    echo json_encode($response);
    exit;
}

// Add User
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nameUser = $_POST['nameUser'];
    $lastnameUser = $_POST['lastnameUser'];
    $emailUser = $_POST['emailUser'];
    $passwordUser = $_POST['passwordUser'];

    $objConexion = new ConexionDB();
    $objUser = new User($objConexion);

    $objUser->setNameUser($nameUser);
    $objUser->setLastnameUser($lastnameUser);
    $objUser->setEmailUser($emailUser);
    $objUser->setPasswordUser($passwordUser);
    
    if ($objUser->addUser()) {
        $response = array('success' => true, 'message' => 'Usuario agregado correctamente');
    } else {
        $response = array('success' => false, 'message' => 'Error al agregar el usuario');
    }
    echo json_encode($response);
    exit;
}

// Read user
else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $objConexion = new ConexionDB();
    $objUser = new User($objConexion);
    $array = $objUser->readUser();
    echo json_encode($array);
    exit;
}

// Update User
else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $data = json_decode(file_get_contents('php://input'), true);

    $idUser = intval($data['idUser']);
    $nameUser = $data['nameUser'];
    $lastnameUser = $data['lastnameUser'];
    $emailUser = $data['emailUser'];
    $passwordUser = $data['passwordUser'];

    $objConexion = new ConexionDB();
    $objUser = new User($objConexion);

    $objUser->setIdUser($idUser);
    $objUser->setNameUser($nameUser);
    $objUser->setLastnameUser($lastnameUser);
    $objUser->setEmailUser($emailUser);
    $objUser->setPasswordUser($passwordUser);
    
    if ($objUser->updateUser()) {
        $response = array('success' => true, 'message' => 'Usuario actualizado correctamente');
    } else {
        $response = array('success' => false, 'message' => 'Error al actualizar el usuario');
    }
    echo json_encode($response);
    exit;
}

// Si no coincide con ningún método de solicitud, devolver Bad Request
$response = array('success' => false, 'message' => 'Método no permitido');
echo json_encode($response);
http_response_code(400);
?>