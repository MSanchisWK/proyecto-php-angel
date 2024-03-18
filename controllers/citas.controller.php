<?php

require_once '../models/citas.model.php';
require_once '../connection.php';

class CitasController {
    private $citasModel;

    public function __construct() {
        $connection = new Connection();
        $this->citasModel = new CitasModel($connection->getConnection());
    }

    public function obtenerTodasLasCitas() {
        return $this->citasModel->getCitas();
    }

    public function obtenerCitasDeUsuario($id) {
        return $this->citasModel->getCitaByUser($id);
    }

    public function obtenerCitaPorId($id) {
        return $this->citasModel->getCitaById($id);
    }

    public function crearCita($idUsuario, $fecha, $motivo) {
        return $this->citasModel->crearCita($idUsuario, $fecha, $motivo);
    }

    public function actualizarCita($idCita, $idUsuario, $fecha, $motivo) {
        return $this->citasModel->updateCita($idCita, $idUsuario, $fecha, $motivo);
    }

    public function eliminarCita($idCita) {
        return $this->citasModel->deleteCita($idCita);
    }
}
