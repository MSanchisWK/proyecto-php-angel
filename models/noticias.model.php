<?php

class NoticiasModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getNoticias() {
        $query = "SELECT * FROM noticias";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNoticiaById($id) {
        $query = "SELECT * FROM noticias WHERE idNoticia = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crearNoticia($titulo, $imagen, $texto, $fecha, $idUsuario) {
        $query = "INSERT INTO noticias (titulo, imagen, texto, fecha, idUser)
                  VALUES (:titulo, :imagen, :texto, :fecha, :idUser)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':texto', $texto);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':idUser', $idUsuario);
        $stmt->execute();

        return $this->db->lastInsertId();
    }

    public function updateNoticia($id, $titulo, $imagen, $texto, $fecha) {
        $query = "UPDATE noticias SET titulo = :titulo, imagen = :imagen, texto = :texto, fecha = :fecha WHERE idNoticia = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':texto', $texto);
        $stmt->bindParam(':fecha', $fecha);
        return $stmt->execute();
    }

    public function deleteNoticia($id) {
        $query = "DELETE FROM noticias WHERE idNoticia = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

?>