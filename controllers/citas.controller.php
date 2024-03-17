<?php

require_once 'CitasModel.php';

class CitasController {
    private $citasModel;

    public function __construct($db) {
        $this->citasModel = new CitasModel($db);
    }

    public function obtenerTodasLasCitas() {
        return $this->citasModel->getCitas();
    }

    public function obtenerCitaPorId($id) {
        return $this->citasModel->getCitaById($id);
    }

    public function crearCita($idUsuario, $fecha, $motivo) {
        return $this->citasModel->crearCita($idUsuario, $fecha, $motivo);
    }

    public function actualizarCita($idCita, $idUsuario, $fecha, $motivo) {
        // Implementa la lógica para actualizar una cita
    }

    public function eliminarCita($idCita) {
        // Implementa la lógica para eliminar una cita
    }
}
