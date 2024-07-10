<?php
include('../dataAccess/conexion/Conexion.php');

class Categorias {
    private $ID_categoria;
    private $Nombre_categoria;
    private $Descripcion_categoria;  // Nueva propiedad
    private $Imagen_categoria;
    private $conexionDB;

    public function __construct(ConexionDB $conexionDB) {
        $this->conexionDB = $conexionDB->conectar();
    }

    public function addcategorias(): bool {
        $success = false;
        try {
            $sql = "INSERT INTO Categoria (Nombre_categoria, Descripcion_categoria, Imagen_categoria) VALUES (?, ?, ?)";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$this->Nombre_categoria, $this->Descripcion_categoria, $this->Imagen_categoria]);
            $count = $stmt->rowCount();
            $success = $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $success = false;
        }
        return $success;
    }

    public function readcategorias(): array {
        $categorias = [];
        try {
            $sql = "SELECT * FROM categorias";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $categorias;
    }

    public function updatecategorias($id): bool {
        $success = false;
        try {
            $sql = "UPDATE categorias SET Nombre_categoria = ?, Descripcion_categoria = ?, Imagen_categoria = ? WHERE ID_categoria = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$this->Nombre_categoria, $this->Descripcion_categoria, $this->Imagen_categoria, $id]);
            $count = $stmt->rowCount();
            $success = $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $success = false;
        }
        return $success;
    }

    public function deletecategorias($id): bool {
        $success = false;
        try {
            $sql = "DELETE FROM categorias WHERE ID_categoria = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$id]);
            $count = $stmt->rowCount();
            $success = $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $success = false;
        }
        return $success;
    }

    // Getters and setters
    public function setNombreCategoria($nombre) {
        $this->Nombre_categoria = $nombre;
    }

    public function setDescripcionCategoria($descripcion) {  // Nuevo setter
        $this->Descripcion_categoria = $descripcion;
    }

    public function setImagenCategoria($imagen) {
        $this->Imagen_categoria = $imagen;
    }

    public function getNombreCategoria() {
        return $this->Nombre_categoria;
    }

    public function getDescripcionCategoria() {  // Nuevo getter
        return $this->Descripcion_categoria;
    }

    public function getImagenCategoria() {
        return $this->Imagen_categoria;
    }
}
?>

