<?php
class User
{
    #attributes
    private int $idUser;
    private string $nameUser;
    private string $lastnameUser;
    private string $emailUser;
    private string $passwordUser;
    private $connectionDB;

    #constructor
    public function __construct(ConexionDB $conexionDB) {
        $this->connectionDB = $conexionDB->connect();
    }

    #setters y getters
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }
    public function setNameUser(string $nameUser): void
    {
        $this->nameUser = $nameUser;
    }
    public function setLastnameUser(string $lastnameUser): void
    {
        $this->lastnameUser = $lastnameUser;
    }
    public function setEmailUser(string $emailUser): void
    {
        $this->emailUser = $emailUser;
    }
    public function setPasswordUser(string $passwordUser): void
    {
        $this->passwordUser = password_hash($passwordUser, PASSWORD_DEFAULT);
    }
    public function getIdUser(): int
    {
        return $this->idUser;
    }
    public function getNameUser(): string
    {
        return $this->nameUser;
    }
    public function getLastnameUser(): string
    {
        return $this->lastnameUser;
    }
    public function getEmailUser(): string
    {
        return $this->emailUser;
    }
    public function getPasswordUser(): string
    {
        return $this->passwordUser;
    }

    #methods

    #add user
    public function addUser(): bool
    {
        try {
            $sql = "INSERT INTO tb_user (nameUser, lastnameUser, emailUser, passwordUser) VALUES (?,?,?,?)";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute(array($this->getNameUser(), $this->getLastnameUser(), $this->getEmailUser(), $this->getPasswordUser()));
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    #read user
    public function readUser():array
    {
        try {
            $sql = "SELECT * FROM tb_user";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }

    #delete user
    public function deleteUser():bool
    {
        try {
            $sql = "DELETE FROM tb_user WHERE idUser=?";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute(array($this->getIdUser()));
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    #update user
    public function updateUser():bool
    {
        try {  
            $sql = "UPDATE tb_user SET nameUser=?, lastnameUser=?, emailUser=?, passwordUser=? WHERE idUser=?";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute(array($this->getNameUser(), $this->getLastnameUser(), $this->getEmailUser(), $this->getPasswordUser(), $this->getIdUser()));
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    #login user
    public function login(string $email, string $password): bool
    {
        try {
            $sql = "SELECT * FROM tb_user WHERE emailUser = ?";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['passwordUser'])) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    private function affectedColumns($numer): bool
    {
        return $numer > 0;
    }
}