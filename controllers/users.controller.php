<?php

require_once 'UsuariosModel.php';

class UsuariosController {
    private $usuariosModel;

    public function __construct($db) {
        $this->usuariosModel = new UsuariosModel($db);
    }

    public function obtenerTodosLosUsuarios() {
        return $this->usuariosModel->getUsersData();
    }

    public function obtenerUsuarioPorId($id) {
        return $this->usuariosModel->getUserById($id);
    }

    public function crearUsuario($userData, $loginData) {
        return $this->usuariosModel->createUser($userData, $loginData);
    }

    public function actualizarUsuario($id, $userData) {
        // Implementa la lógica para actualizar un usuario
    }

    public function eliminarUsuario($id) {
        // Implementa la lógica para eliminar un usuario
    }
    public function cerrarSesion(){
        header("location:../index.php");
        exit();
        session_destroy();
    }
}
