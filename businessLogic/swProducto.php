<?php
include '../dataAccess/conexion/Conexion.php';
include '../dataAccess/dataAccessLogic/Producto.php';


/**
 * Web Service RESTful en PHP con MySQL (CRUD)
 * *
 */

//delete product
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $idProduct = intval($_GET['id']);
    $objConexion = new ConexionDB();
    $objProduct = new Product($objConexion);

    $objProduct->setIdProduct($idProduct);
    $objProduct->deleteProduct();
    $response = array('success' => true, 'message' => 'Producto eliminado correctamente');
    exit;
}

// Add Product
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $directorio = "imagenes/";
    $nombreArchivo = $_FILES['photoProduct']['name'];
    $rutaTemporal = $_FILES['photoProduct']['tmp_name'];

    $rutaDefinitiva = $directorio . $nombreArchivo;

    if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true);
    }

    if (move_uploaded_file($rutaTemporal, $rutaDefinitiva)) {
        $nameProduct = $_POST['nameProduct'];
        $descriptionProduct = $_POST['descriptionProduct'];
        $priceProduct = $_POST['priceProduct'];
        $categoryProduct = $_POST['categoryProduct'];
        $photoProduct = $rutaDefinitiva;

        $objConexion = new ConexionDB();
        $objProduct = new Product($objConexion);

        $objProduct->setNameProduct($nameProduct);
        $objProduct->setDescriptionProduct($descriptionProduct);
        $objProduct->setPriceProduct($priceProduct);
        $objProduct->setPhotoProduct($photoProduct);
        $objProduct->setIdCategoria($categoryProduct);

        if ($objProduct->addProduct()) {
            echo json_encode(['success' => true, 'message' => 'Producto agregado exitosamente']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al agregar el producto']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al subir la imagen']);
    }
    exit;
}

//read product
else if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $objConexion = new ConexionDB();
    $objProduct = new Product($objConexion);
    $array = $objProduct->readProduct();
    echo json_encode($array);
    exit;
}

// Update Product
else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    $data = json_decode(file_get_contents('php://input'), true);

    // Obtener los valores del objeto JSON
    $idProduct = intval($data['idProduct']);
    $nameProduct = $data['nameProduct'];
    $descriptionProduct = $data['descriptionProduct'];
    $priceProduct = $data['priceProduct'];
    $photoProduct = $data['photoProduct'];

    $objConexion = new ConexionDB();
    $objProduct = new Product($objConexion);

    $objProduct->setIdProduct($idProduct);
    $objProduct->setNameProduct($nameProduct);
    $objProduct->setDescriptionProduct($descriptionProduct);
    $objProduct->setPriceProduct($priceProduct);
    $objProduct->setPhotoProduct($photoProduct);
    $objProduct->updateProduct();
    exit;
}

// Si no coincide con ningún método de solicitud, devolver Bad Request
header("HTTP/1.1 400 Bad Request");
?>
