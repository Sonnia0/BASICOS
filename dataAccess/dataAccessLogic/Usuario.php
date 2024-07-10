<?php
include('../dataAccess/conexion/Conexion.php');

class Usuario {
    private $id_usuario;
    private $Nombre;
    private $Apellido;
    private $Correo_electronico;
    private $Contraseña;
    private $Tipo_cuenta;
    private $conexionDB;

    public function __construct(ConexionDB $conexionDB) {
        $this->conexionDB = $conexionDB->conectar();
    }

    // Getters
    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function getNombre() {
        return $this->Nombre;
    }

    public function getApellido() {
        return $this->Apellido;
    }

    public function getCorreoElectronico() {
        return $this->Correo_electronico;
    }

    public function getContraseña() {
        return $this->Contraseña;
    }

    public function getTipoCuenta() {
        return $this->Tipo_cuenta;
    }

    // Setters
    public function setNombre($nombre) {
        $this->Nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->Apellido = $apellido;
    }

    public function setCorreoElectronico($correo) {
        $this->Correo_electronico = $correo;
    }

    public function setContraseña($contraseña) {
        $this->Contraseña = $contraseña;
    }

    public function setTipoCuenta($tipoCuenta) {
        $this->Tipo_cuenta = $tipoCuenta;
    }

    public function addUsuario(): bool {
        $success = false;
        try {
            $sql = "INSERT INTO usuarios (Nombre, Apellido, Correo_electronico, Contraseña, Tipo_cuenta) 
                    VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([
                $this->Nombre,
                $this->Apellido,
                $this->Correo_electronico,
                $this->Contraseña,
                $this->Tipo_cuenta
            ]);
            $count = $stmt->rowCount();
            $success = $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $success = false;
        }
        return $success;
    }

    public function readUsuarios(): array {
        $usuarios = [];
        try {
            $sql = "SELECT * FROM usuarios";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $usuarios;
    }

    public function updateUsuario($id): bool {
        $success = false;
        try {
            $sql = "UPDATE usuarios SET Nombre = ?, Apellido = ?, Correo_electronico = ?, Contraseña = ?, Tipo_cuenta = ? WHERE id_usuario = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([
                $this->Nombre,
                $this->Apellido,
                $this->Correo_electronico,
                $this->Contraseña,
                $this->Tipo_cuenta,
                $id
            ]);
            $count = $stmt->rowCount();
            $success = $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $success = false;
        }
        return $success;
    }

    public function deleteUsuario($id): bool {
        $success = false;
        try {
            $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
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
}
?>