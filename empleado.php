<?php
require_once ('persona.php');

class Empleado extends Persona{

    protected $_legajo;
    protected $_sueldo;
    protected $_turno;
    protected $idioma = array("Español", "Inglés", "Francés");
    protected $pathFoto;

    function __construct($_nombre, $_apellido,$_dni,$_sexo,$_legajo, $_sueldo, $_turno) {
        parent::__construct($_nombre, $_apellido,$_dni,$_sexo);
        $this->_legajo = $_legajo;
        $this->_sueldo = $_sueldo;
        $this->_turno = $_turno;
    }
    
    function Hablar():string{
        return "El empleado habla " . join(", ", $this->idioma);
    }

    public function __toString()
    {
        //return $this->_nombre . '-' . $this->_apellido . '-' .$this->_sexo . '-' .$this->_sueldo . '-' .$this->_turno;

      return parent:: __toString() . '-' . $this->_legajo . '-' .$this->_sueldo . '-' .$this->_turno . '-' .$this->pathFoto;
    }

    function GetLegajo():string{
        return $this->_legajo;
    }

    function GetSueldo():string{
        return $this->_sueldo;
    }

    function GetTurno():string{
        return $this->_turno;
    }

    function GetPathFoto():string{
        return $this->pathFoto;
   }

   function SetPathFoto($pathFoto):string{
      $this->pathFoto = $pathFoto;
   }
}

?>