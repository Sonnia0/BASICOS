<?php
// Incluir archivo de conexión
//include '../dataAccess/conexion/Conexion.php';

class Categoria {

    // Atributos
    private int $idCategoria;
    private string $nombreCategoria;
    private string $descripcion;
    private $conexionDB;

    // Constructor
    public function __construct(ConexionDB $conexionDB) {
        $this->conexionDB = $conexionDB->connect(); // Utiliza connect() en lugar de conectar()
    }
    
    // SETTERS
    public function setIdCategoria(int $idCategoria): void {
        $this->idCategoria = $idCategoria;
    }

    public function getIdCategoria(): int {
        return $this->idCategoria;
    }

    public function setNombreCategoria(string $nombreCategoria): void {
        $this->nombreCategoria = $nombreCategoria;
    }

    public function getNombreCategoria(): string {
        return $this->nombreCategoria;
    }

    public function setDescripcion(string $descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion(): string {
        return $this->descripcion;
    }

    // Método para añadir categoría
    public function addCategoria(): bool {
        try {
            $sql = "INSERT INTO tb_categoria (nombreCategoria, descripcion) VALUES (?, ?)";

            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$this->getNombreCategoria(), $this->getDescripcion()]);

            $count = $stmt->rowCount();
            return $count > 0; // Devuelve true si se añadió al menos una fila

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Método para leer categorías
    public function readCategoria(): array {
        try {
            $sql = "SELECT * FROM tb_categoria";

            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrayQuery = $stmt->fetchAll();

            return $arrayQuery;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

    // Método para eliminar categoría
    public function deleteCategoria(): bool {
        try {
            $sql = "DELETE FROM tb_categoria WHERE idCategoria = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$this->getIdCategoria()]);

            $count = $stmt->rowCount();
            return $count > 0; // Devuelve true si se eliminó al menos una fila
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Método para actualizar categoría
    public function updateCategoria(): bool {
        try {
            $sql = "UPDATE tb_categoria SET nombreCategoria = ?, descripcion = ? WHERE idCategoria = ?";

            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$this->getNombreCategoria(), $this->getDescripcion(), $this->getIdCategoria()]);

            $count = $stmt->rowCount();
            return $count > 0; // Devuelve true si se actualizó al menos una fila

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
}

?>
