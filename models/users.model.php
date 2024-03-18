<?php
require_once '../connection.php';
class UsersModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUsersData() {
        $query = "SELECT * FROM users_data";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUsersLogin() {
        $query = "SELECT * FROM users_login";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) {
        $query = "SELECT * FROM users_data WHERE idUser = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByCredentials($usuario, $password) {
        $query = "SELECT * FROM users_login WHERE usuario = :usuario";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
    

    public function createUser($userData, $loginData) {
        // Insertar datos en la tabla users_data
        $query = "INSERT INTO users_data (nombre, apellidos, email, telefono, fecha_nacimiento, direccion, sexo)
                  VALUES (:nombre, :apellidos, :email, :telefono, :fecha_nacimiento, :direccion, :sexo)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $userData['nombre']);
        $stmt->bindParam(':apellidos', $userData['apellidos']);
        $stmt->bindParam(':email', $userData['email']);
        $stmt->bindParam(':telefono', $userData['telefono']);
        $stmt->bindParam(':fecha_nacimiento', $userData['fecha_nacimiento']);
        $stmt->bindParam(':direccion', $userData['direccion']);
        $stmt->bindParam(':sexo', $userData['sexo']);
        $stmt->execute();

        // Obtener el ID del último registro insertado en users_data
        $userId = $this->db->lastInsertId();

        // Insertar datos en la tabla users_login
        $query = "INSERT INTO users_login (idUser, usuario, password, rol)
                  VALUES (:idUser, :usuario, :password, :rol)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':idUser', $userId);
        $stmt->bindParam(':usuario', $loginData['usuario']);
        $stmt->bindParam(':password', $loginData['password']);
        $stmt->bindParam(':rol', $loginData['rol']);
        $stmt->execute();

        return $userId;
    }

    
    public function updateUser($id, $userData) {
        $query = "UPDATE users_data SET nombre = :nombre, apellidos = :apellidos, email = :email, 
                  telefono = :telefono, fecha_nacimiento = :fecha_nacimiento, direccion = :direccion, sexo = :sexo
                  WHERE idUser = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $userData['nombre']);
        $stmt->bindParam(':apellidos', $userData['apellidos']);
        $stmt->bindParam(':email', $userData['email']);
        $stmt->bindParam(':telefono', $userData['telefono']);
        $stmt->bindParam(':fecha_nacimiento', $userData['fecha_nacimiento']);
        $stmt->bindParam(':direccion', $userData['direccion']);
        $stmt->bindParam(':sexo', $userData['sexo']);
        return $stmt->execute();
    }

    public function deleteUser($id) {
        $query = "DELETE FROM users_data WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

}