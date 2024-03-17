<?php

require_once 'NoticiasModel.php';

class NoticiasController {
    private $noticiasModel;

    public function __construct($db) {
        $this->noticiasModel = new NoticiasModel($db);
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
        // Implementa la lógica para actualizar una noticia
    }

    public function eliminarNoticia($idNoticia) {
        // Implementa la lógica para eliminar una noticia
    }
}
