<?php
include('../dataAccess/dataAccessLogic/Productos.php');

$response = array('success' => false, 'message' => 'Invalid request');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Leer productos
    $conexionDB = new ConexionDB();
    $producto = new productos($conexionDB);
    $productos = $producto->readProductos();
    echo json_encode($productos);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Agregar producto
    $data = json_decode(file_get_contents('php://input'), true);
    $nombreProducto = $data['nombre_producto'];
    $descripcionProducto = $data['descripcion_producto'];
    $precioProducto = $data['precio_producto'];
    $imagenProducto = $data['imagen_producto'];

    $conexionDB = new ConexionDB();
    $producto = new Producto($conexionDB);
    $producto->setNombreProducto($nombreProducto);
    $producto->setDescripcionProducto($descripcionProducto);
    $producto->setPrecioProducto($precioProducto);
    $producto->setImagenProducto($imagenProducto);

    if ($producto->addProducto()) {
        $response['success'] = true;
        $response['message'] = 'Producto agregado correctamente';
    } else {
        $response['message'] = 'Error al agregar el producto';
    }
    echo json_encode($response);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Actualizar producto
    $data = json_decode(file_get_contents('php://input'), true);
    $idProducto = $data['id_producto'];
    $nombreProducto = $data['nombre_producto'];
    $descripcionProducto = $data['descripcion_producto'];
    $precioProducto = $data['precio_producto'];
    $imagenProducto = $data['imagen_producto'];

    $conexionDB = new ConexionDB();
    $producto = new Producto($conexionDB);
    $producto->setNombreProducto($nombreProducto);
    $producto->setDescripcionProducto($descripcionProducto);
    $producto->setPrecioProducto($precioProducto);
    $producto->setImagenProducto($imagenProducto);

    if ($producto->updateProducto($idProducto)) {
        $response['success'] = true;
        $response['message'] = 'Producto actualizado correctamente';
    } else {
        $response['message'] = 'Error al actualizar el producto';
    }
    echo json_encode($response);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // Eliminar producto
    $idProducto = intval($_GET['id']);

    $conexionDB = new ConexionDB();
    $producto = new Producto($conexionDB);
    if ($producto->deleteProducto($idProducto)) {
        $response['success'] = true;
        $response['message'] = 'Producto eliminado correctamente';
    } else {
        $response['message'] = 'Error al eliminar el producto';
    }
    echo json_encode($response);
    exit;
}

echo json_encode($response);
?>
