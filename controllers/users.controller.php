<?php
require_once '../models/users.model.php';
require_once '../connection.php';

class UsuariosController {
    private $usuariosModel;

    public function __construct() {
        $connection = new Connection();
        $this->usuariosModel = new UsersModel($connection->getConnection());
    }

    public function obtenerTodosLosUsuarios() {
        return $this->usuariosModel->getUsersData();
    }

    public function obtenerUsuarioPorId($id) {
        return $this->usuariosModel->getUserById($id);
    }

    public function registrarUsuario() {
        if (empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['email']) || empty($_POST['telefono']) || empty($_POST['fecha_nacimiento']) || empty($_POST['direccion']) || empty($_POST['sexo']) || empty($_POST['usuario']) || empty($_POST['password']) || empty($_POST['rol'])) {
            return "Por favor, complete todos los campos.";
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            return "Por favor, ingrese un email válido.";
        }
        if (!is_numeric($_POST['telefono'])) {
            return "El teléfono debe ser un número.";
        }
        $userData = array(
            'nombre' => $_POST['nombre'],
            'apellidos' => $_POST['apellidos'],
            'email' => $_POST['email'],
            'telefono' => $_POST['telefono'],
            'fecha_nacimiento' => $_POST['fecha_nacimiento'],
            'direccion' => $_POST['direccion'],
            'sexo' => $_POST['sexo']
        );
        $loginData = array(
            'usuario' => $_POST['usuario'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'rol' => $_POST['rol']
        );
        $this->usuariosModel->createUser($userData, $loginData);
        $this->iniciarSesion($_POST['usuario'], $_POST['password']);
    }

    public function actualizarUsuario($id, $userData) {
        return $this->usuariosModel->updateUser($id, $userData);
    }

    public function eliminarUsuario($id) {
        return $this->usuariosModel->deleteUser($id);
    }
    public function cerrarSesion(){
        header("location:../index.php");
        exit();
        session_destroy();
    }
    public function iniciarSesion($usuario, $password) {
        $user = $this->usuariosModel->getUserByCredentials($usuario, $password);
        if ($user) {
            session_start();
            $_SESSION['userId'] = $user['idUser'];
            $_SESSION['admin'] = $user['rol'] == 'admin';
            header("Location: ../index.php");
            exit();
        } else {
            header("Location: login.php?error=credenciales");
            exit();
        }
    }
    
}
