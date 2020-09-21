<?php
require './persona.php';

class Empleado extends Persona{

    protected $_legajo;
    protected $_sueldo;
    protected $_turno;
    protected $idioma = array("Español", "Inglés", "Francés");

    function __construct($_nombre, $_apellido,$_dni,$_sexo,$_legajo, $_sueldo, $_turno) {
        parent::__construct($_nombre, $_apellido,$_dni,$_sexo);
        $this->legajo = $_legajo;
        $this->sueldo = $_sueldo;
        $this->turno = $_turno;
    }
    
    function Hablar():string{
        return "El empleado habla " . join(", ", $this->idioma);
    }

    public function __toString()
    {
       return parent:: __toString();
    }

    function GetLegajo():string{
        return $this->legajo;
    }

    function GetSueldo():string{
        return $this->sueldo;
    }

    function GetTurno():string{
        return $this->turno;
    }
}

?>