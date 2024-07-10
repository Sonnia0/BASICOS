<?php
include('../dataAccess/dataAccessLogic/Categorias.php');

// Initialize response array
$response = array('success' => false, 'message' => 'Invalid request');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Read categorias
    $conexionDB = new ConexionDB();
    $categoria = new categorias($conexionDB);
    $categorias = $categoria->readCategorias();
    echo json_encode($categorias);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Add categoria
    $data = json_decode(file_get_contents('php://input'), true);
    $nombreCategoria = $data['Nombre_categoria'];
    $descripcionCategoria = $data['Descripcion_categoria'];
    $imagenCategoria = $data['Imagen_categoria'];

    $conexionDB = new ConexionDB();
    $categoria = new Categoria($conexionDB);
    $categoria->setNombreCategoria($nombreCategoria);
    $categoria->setDescripcionCategoria($descripcionCategoria);
    $categoria->setImagenCategoria($imagenCategoria);
    if ($categoria->addCategoria()) {
        $response['success'] = true;
        $response['message'] = 'Categoria agregada correctamente';
    } else {
        $response['message'] = 'Error al agregar la categoria';
    }
    echo json_encode($response);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Update categoria
    $data = json_decode(file_get_contents('php://input'), true);
    $idCategoria = $data['ID_categoria'];
    $nombreCategoria = $data['Nombre_categoria'];
    $descripcionCategoria = $data['Descripcion_categoria'];
    $imagenCategoria = $data['Imagen_categoria'];

    $conexionDB = new ConexionDB();
    $categoria = new Categoria($conexionDB);
    $categoria->setNombreCategoria($nombreCategoria);
    $categoria->setDescripcionCategoria($descripcionCategoria);
    $categoria->setImagenCategoria($imagenCategoria);
    if ($categoria->updateCategoria($idCategoria)) {
        $response['success'] = true;
        $response['message'] = 'Categoria actualizada correctamente';
    } else {
        $response['message'] = 'Error al actualizar la categoria';
    }
    echo json_encode($response);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // Delete categoria
    $idCategoria = intval($_GET['id']);

    $conexionDB = new ConexionDB();
    $categoria = new Categoria($conexionDB);
    if ($categoria->deleteCategoria($idCategoria)) {
        $response['success'] = true;
        $response['message'] = 'Categoria eliminada correctamente';
    } else {
        $response['message'] = 'Error al eliminar la categoria';
    }
    echo json_encode($response);
    exit;
}

echo json_encode($response);
?>

