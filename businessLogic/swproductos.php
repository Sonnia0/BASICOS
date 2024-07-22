<?php
include('../dataAccess/conexion/Conexion.php');

class Productos {
    private $conexionDB;

    public function __construct() {
        $conexion = new ConexionDB();
        $this->conexionDB = $conexion->conectar();
    }

    public function addProducto($nombre, $precio, $descripcion, $imagen) {
        try {
            $sql = "INSERT INTO productos (nombre_producto, precio_producto, descripcion_producto, imagen_producto) VALUES (?, ?, ?, ?)";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$nombre, $precio, $descripcion, $imagen]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getProductos() {
        try {
            $sql = "SELECT * FROM productos";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateProducto($id, $nombre, $precio, $descripcion, $imagen) {
        try {
            $sql = "UPDATE productos SET nombre_producto = ?, precio_producto = ?, descripcion_producto = ?, imagen_producto = ? WHERE id = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$nombre, $precio, $descripcion, $imagen, $id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteProducto($id) {
        try {
            $sql = "DELETE FROM productos WHERE id = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

$producto = new Productos();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
    $directorio="imagenes/";
    $nombreArchivo=$_FILES['imagen_producto']['name'];
    $rutaTemporal=$_FILES['imagen_prodcuto']['tmp_name'];

    $rutaDefinitiva=$directorio.$nombreArchivo;

   

    if(!file_exists($directorio)){
        mkdir($directorio,0777);
    }

    move_uploaded_file($rutaTemporal,$rutaDefinitiva);
    $nombre = $_POST['nombre_producto'];
    $precio = $_POST['precio_producto'];
    $descripcion = $_POST['descripcion_producto'];
    $imagen = $_POST['imagen_producto'];
    $result = $producto->addProducto($nombre, $precio, $descripcion, $imagen);
    echo json_encode(['success' => $result]);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $producto->getProductos();
    echo json_encode($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    $id = $_PUT['id'];
    $nombre = $_PUT['nombre_producto'];
    $precio = $_PUT['precio_producto'];
    $descripcion = $_PUT['descripcion_producto'];
    $imagen = $_PUT['imagen_producto'];
    $result = $producto->updateProducto($id, $nombre, $precio, $descripcion, $imagen);
    echo json_encode(['success' => $result]);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $id = $_DELETE['id'];
    $result = $producto->deleteProducto($id);
    echo json_encode(['success' => $result]);
}
?>
