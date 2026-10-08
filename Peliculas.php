<?php

class Peliculas
{
    public $nombre;
    public $isan;
    public $year;
    public $puntuacion;
    
    public function __construct($nombre, $isan, $year, $puntuacion)
    {
        $this->nombre = $nombre;
        $this->isan = $isan;
        $this->year = $year;
        $this->puntuacion = $puntuacion;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getIsan()
    {
        return $this->isan;
    }
    public function setIsan($isan)
    {
        $this->isan = $isan;
    }
    public function getYear()
    {
        return $this->year;
    }
    public function setYear($year)
    {
        $this->year = $year;
    }
    public function getPuntuacion()
    {
        return $this->puntuacion;
    }
    public function setPuntuacion($puntuacion)
    {
        $this->puntuacion = $puntuacion;
    }
}

?>