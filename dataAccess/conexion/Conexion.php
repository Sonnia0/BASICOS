<?php

class ConexionDB {
    private $server = "localhost:3306";
    private $database = "bd_e-commerce";
    private $username = "root";
    private $password = "";
    private $conexion;

	public function connect(){	
		$this->conexion=new PDO("mysql:host=$this->server;dbname=$this->database",$this->username,$this->password);

    	  return $this->conexion;
	}

	public function closeConnection() {
        $this->conexion = null;
    }
}