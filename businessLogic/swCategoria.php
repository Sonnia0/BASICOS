<?php
include '../dataAccess/conexion/Conexion.php';
include ('../dataAccess/dataAccessLogic/Categoria.php');

/**
 * Web Service RESTful en PHP con MySQL (CRUD)
 * *
 */

// Eliminar categoría
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $idCategoria = intval($_GET['id']);
    $objConexion = new ConexionDB();
    $objCategoria = new Categoria($objConexion);

    $objCategoria->setIdCategoria($idCategoria);
    $objCategoria->deleteCategoria();
    $response = array('success' => true, 'message' => 'Categoría eliminada correctamente');
    echo json_encode($response);
    exit;
}

// Añadir categoría
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombreCategoria = $_POST['nombreCategoria'];
    $descripcion = $_POST['descripcion'];

    $objConexion = new ConexionDB();
    $objCategoria = new Categoria($objConexion);

    $objCategoria->setNombreCategoria($nombreCategoria);
    $objCategoria->setDescripcion($descripcion);
    $objCategoria->addCategoria();
    $response = array('success' => true, 'message' => 'Categoría añadida correctamente');
    echo json_encode($response);
    exit;
}

// Leer categorías
else if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $objConexion = new ConexionDB();
    $objCategoria = new Categoria($objConexion);
    $array = $objCategoria->readCategoria();
    echo json_encode($array);
    exit;
}

// Actualizar categoría
else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    $data = json_decode(file_get_contents('php://input'), true);

    // Obtener los valores del objeto JSON
    $idCategoria = intval($data['idCategoria']);
    $nombreCategoria = $data['nombreCategoria'];
    $descripcion = $data['descripcion'];

    $objConexion = new ConexionDB();
    $objCategoria = new Categoria($objConexion);

    $objCategoria->setIdCategoria($idCategoria);
    $objCategoria->setNombreCategoria($nombreCategoria);
    $objCategoria->setDescripcion($descripcion);
    $objCategoria->updateCategoria();
    $response = array('success' => true, 'message' => 'Categoría actualizada correctamente');
    echo json_encode($response);
    exit;
}

// Si no coincide con ningún método de solicitud, devolver Bad Request
header("HTTP/1.1 400 Bad Request");
?>
