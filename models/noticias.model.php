<?php

class NoticiasModel {
    private $idNoticia;
    private $titulo;
    private $imagen;
    private $texto;
    private $fecha;
    private $idUser;

    public function __construct($idNoticia, $titulo, $imagen, $texto, $fecha, $idUser) {
        $this->idNoticia = $idNoticia;
        $this->titulo = $titulo;
        $this->imagen = $imagen;
        $this->texto = $texto;
        $this->fecha = $fecha;
        $this->idUser = $idUser;
    }

    public function getIdNoticia() {
        return $this->idNoticia;
    }

    public function setIdNoticia($idNoticia) {
        $this->idNoticia = $idNoticia;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }
    public function createNoticia() {
        // Code to create a new noticia in the database
    }

    public function readNoticia($idNoticia) {
        // Code to retrieve a specific noticia from the database
    }

    public function updateNoticia() {
        // Code to update an existing noticia in the database
    }

    public function deleteNoticia($idNoticia) {
        // Code to delete a specific noticia from the database
    }
}