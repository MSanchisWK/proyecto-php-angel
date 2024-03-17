<?php

class CitasModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getCitas() {
        $query = "SELECT * FROM citas";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCitaById($id) {
        $query = "SELECT * FROM citas WHERE idCita = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crearCita($idUsuario, $fecha, $motivo) {
        $query = "INSERT INTO citas (idUser, fecha_cita, motivo_cita)
                  VALUES (:idUser, :fecha_cita, :motivo_cita)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':idUser', $idUsuario);
        $stmt->bindParam(':fecha_cita', $fecha);
        $stmt->bindParam(':motivo_cita', $motivo);
        $stmt->execute();

        return $this->db->lastInsertId();
    }

    public function updateCita($id, $fecha, $motivo) {
        $query = "UPDATE citas SET fecha_cita = :fecha_cita, motivo_cita = :motivo_cita WHERE idCita = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':fecha_cita', $fecha);
        $stmt->bindParam(':motivo_cita', $motivo);
        return $stmt->execute();
    }

    public function deleteCita($id) {
        $query = "DELETE FROM citas WHERE idCita = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

?>