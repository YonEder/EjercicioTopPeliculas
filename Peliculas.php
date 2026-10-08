<?php

class Peliculas
{
    public $nombrepelicula;
    public $isan;
    public $year;
    public $puntuacion;
    
    public function __construct($nombrepelicula, $isan, $year, $puntuacion)
    {
        $this->nombrePelicula = $nombrepelicula;
        $this->isan = $isan;
        $this->year = $year;
        $this->puntuacion = $puntuacion;
    }

    public function getNombrePelicula()
    {
        return $this->nombrePelicula;
    }
    public function setNombrePelicula($nombrepelicula)
    {
        $this->nombrePelicula = $nombrepelicula;
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