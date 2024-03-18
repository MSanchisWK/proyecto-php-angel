<?php
require_once '../models/noticias.model.php';
require_once '../connection.php';
class NoticiasController {
    private $noticiasModel;

    public function __construct() {
        $connection = new Connection();
        $this->noticiasModel = new NoticiasModel($connection->getConnection());
    }

    public function obtenerTodasLasNoticias() {
        return $this->noticiasModel->getNoticias();
    }

    public function obtenerNoticiaPorId($id) {
        return $this->noticiasModel->getNoticiaById($id);
    }

    public function crearNoticia($titulo, $imagen, $texto, $fecha, $idUsuario) {
        return $this->noticiasModel->crearNoticia($titulo, $imagen, $texto, $fecha, $idUsuario);
    }

    public function actualizarNoticia($idNoticia, $titulo, $imagen, $texto, $fecha, $idUsuario) {
       
    }

    public function eliminarNoticia($idNoticia) {
        
    }
}
