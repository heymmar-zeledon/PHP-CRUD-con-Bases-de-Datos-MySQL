<?php
class Alumno
{
    public $correo;
    public $nombre;
    public $carnet;
    public $edad;
    public $curso;
    public $foto;

    public function __construct(){}
    
//sets y gets 
    public function Getcorreo()
    {
        return $this->correo;
    }
    public function Setcorreo($correo)
    {
        $this->correo = $correo;
    }

    public function Getnombre()
    {
        return $this->nombre;
    }
    public function Setnombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function Getcarnet()
    {
        return $this->carnet;
    }
    public function Setcarnet($carnet)
    {
        $this->carnet = $carnet;
    }

    public function Getedad()
    {
        return $this->edad;
    }
    public function Setedad($edad)
    {
        $this->edad = $edad;
    }

    public function Getcurso()
    {
        return $this->curso;
    }
    public function Setcurso($curso)
    {
        $this->curso = $curso;
    }

    public function Getfoto()
    {
        return $this->foto;
    }
    public function Setfoto($foto)
    {
        $this->foto = $foto;
    }
    
    public function imprimir()
    {
        echo "<b>Número de Carnet:</b> $this->carnet<br/>";
        echo "Correo Electronico: $this->correo<br/>";
        echo "Nombre: $this->nombre<br/>";
        echo "Edad: $this->edad<br/>";
        echo "Curso Actual: $this->curso<br/>";
    }
}
?>