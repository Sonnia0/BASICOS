<?php
require_once '../dataAccess/conexion/Conexion.php';

class Proveedor {
    private $idProveedor;
    private $cedula;
    private $nombres;
    private $apellidos;
    private $telefono;
    private $email;
    private $empresa;
    private $conexionDB;

    public function __construct(ConexionDB $conexionDB) {
        $this->conexionDB = $conexionDB->conectar();
    }

    // Getters
    public function getIdProveedor() {
        return $this->idProveedor;
    }

    public function getCedula() {
        return $this->cedula;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getEmpresa() {
        return $this->empresa;
    }

    // Setters
    public function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    public function addProveedor(): bool {
        $success = false;
        try {
            $sql = "INSERT INTO proveedor (cedula, nombres, apellidos, telefono, email, empresa) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([
                $this->cedula,
                $this->nombres,
                $this->apellidos,
                $this->telefono,
                $this->email,
                $this->empresa
            ]);
            $success = $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $success;
    }

    public function readProveedores(): array {
        $proveedores = [];
        try {
            $sql = "SELECT * FROM proveedor";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute();
            $proveedores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $proveedores;
    }

    public function updateProveedor($id): bool {
        $success = false;
        try {
            $sql = "UPDATE proveedor SET cedula = ?, nombres = ?, apellidos = ?, telefono = ?, email = ?, empresa = ? WHERE idProveedor = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([
                $this->cedula,
                $this->nombres,
                $this->apellidos,
                $this->telefono,
                $this->email,
                $this->empresa,
                $id
            ]);
            $success = $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $success;
    }

    public function deleteProveedor($id): bool {
        $success = false;
        try {
            $sql = "DELETE FROM proveedor WHERE idProveedor = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$id]);
            $success = $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $success;
    }
}
?>
