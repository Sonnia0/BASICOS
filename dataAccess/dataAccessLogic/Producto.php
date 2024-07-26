<?php

class Product {
    // Atributos de la clase Product
    private int $idProduct;
    private string $nameProduct;
    private string $descriptionProduct;
    private float $priceProduct;
    private string $photoProduct;
    private int $idCategoria; 
    private $connectionDB;

    // Constructor
    public function __construct(ConexionDB $conexionDB) {
        $this->connectionDB = $conexionDB->connect();
    }

    // Métodos SET y GET para los atributos de la clase Product
    public function setIdProduct(int $idProduct): void {
        $this->idProduct = $idProduct;
    }

    public function getIdProduct(): int {
        return $this->idProduct;
    }

    public function setNameProduct(string $nameProduct): void {
        $this->nameProduct = $nameProduct;
    }

    public function getNameProduct(): string {
        return $this->nameProduct;
    }

    public function setDescriptionProduct(string $descriptionProduct): void {
        $this->descriptionProduct = $descriptionProduct;
    }

    public function getDescriptionProduct(): string {
        return $this->descriptionProduct;
    }

    public function setPriceProduct(float $priceProduct): void {
        $this->priceProduct = $priceProduct;
    }

    public function getPriceProduct(): float {
        return $this->priceProduct;
    }

    public function setPhotoProduct(string $photoProduct): void {
        $this->photoProduct = $photoProduct;
    }

    public function getPhotoProduct(): string {
        return $this->photoProduct;
    }
    public function setIdCategoria(int $idCategoria): void {
        $this->idCategoria = $idCategoria;
    }

    public function getIdCategoria(): int {
        return $this->idCategoria;
    }

    // Método para añadir un producto
    public function addProduct(): bool {
        try {
            $sql = "INSERT INTO tb_producto (nombreProducto, descripcion, precio, foto, idCategoria) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute([
                $this->getNameProduct(),
                $this->getDescriptionProduct(),
                $this->getPriceProduct(),
                $this->getPhotoProduct(),
                $this->getIdCategoria() // Añade esto
            ]);
            $count = $stmt->rowCount();
            return $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Método para leer productos
    public function readProduct(): array {
        try {
            $sql = "SELECT * FROM tb_producto as p INNER JOIN tb_categoria as c ON p.idCategoria = c.idCategoria;";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrayQuery = $stmt->fetchAll();
            return $arrayQuery;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }
    

    // Método para eliminar un producto
    public function deleteProduct(): bool {
        try {
            $sql = "DELETE FROM tb_producto WHERE idProducto = ?";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute([$this->getIdProduct()]);
            $count = $stmt->rowCount();
            return $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Método para actualizar un producto
    public function updateProduct(): bool {
        try {
            $sql = "UPDATE tb_producto SET nombreProducto = ?, descripcion = ?, precio = ?, foto = ? WHERE idProducto = ?";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute([$this->getNameProduct(), $this->getDescriptionProduct(), $this->getPriceProduct(), $this->getPhotoProduct(), $this->getIdProduct()]);
            $count = $stmt->rowCount();
            return $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Método para obtener categorías
    public function getCategories(): array {
        try {
            $sql = "SELECT idCategoria, nombreCategoria FROM tb_categoria";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $categories = $stmt->fetchAll();
            return $categories;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }
}

?>
