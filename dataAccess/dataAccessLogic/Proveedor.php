<?php
class Proveedor
{
    #attributes
    private int $idProveedor;
    private string $nombre;
    private string $apellido;
    private string $correo;
    private string $telefono;
    private $connectionDB;

    #constructor
    public function __construct(ConexionDB $conexionDB) {
        $this->connectionDB = $conexionDB->connect();
    }

    #setters y getters
    public function setIdProveedor(int $idProveedor): void
    {
        $this->idProveedor = $idProveedor;
    }
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
    public function setApellido(string $apellido): void
    {
        $this->apellido = $apellido;
    }
    public function setCorreo(string $correo): void
    {
        $this->correo = $correo;
    }
    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }
    public function getIdProveedor(): int
    {
        return $this->idProveedor;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getApellido(): string
    {
        return $this->apellido;
    }
    public function getCorreo(): string
    {
        return $this->correo;
    }
    public function getTelefono(): string
    {
        return $this->telefono;
    }

    #methods

    #add provider
    public function addProveedor(): bool
    {
        try {
            $sql = "INSERT INTO tb_proveedor (nombre, apellido, correo, telefono) VALUES (?,?,?,?)";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute(array($this->getNombre(), $this->getApellido(), $this->getCorreo(), $this->getTelefono()));
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    #read providers
    public function readProveedor(): array
    {
        try {
            $sql = "SELECT * FROM tb_proveedor";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }

    #delete provider
    public function deleteProveedor(): bool
    {
        try {
            $sql = "DELETE FROM tb_proveedor WHERE idProveedor=?";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute(array($this->getIdProveedor()));
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    #update provider
    public function updateProveedor(): bool
    {
        try {  
            $sql = "UPDATE tb_proveedor SET nombre=?, apellido=?, correo=?, telefono=? WHERE idProveedor=?";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute(array($this->getNombre(), $this->getApellido(), $this->getCorreo(), $this->getTelefono(), $this->getIdProveedor()));
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    private function affectedColumns($number): bool
    {
        return $number > 0;
    }
}
?>
