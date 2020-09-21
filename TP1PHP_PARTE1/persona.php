<?php

abstract class Persona {

   private $_dni;
   private $_apellido;
   private $_nombre;
   private $_sexo;
   private $idioma;

    function __construct($_nombre, $_apellido,$_dni,$_sexo){
       $this->nombre = $_nombre;
       $this->apellido = $_apellido;
       $this->dni = $_dni;
       $this->sexo = $_sexo;
   }

    abstract function Hablar():string;

    function GetApellido():string{
        return $this->apellido;
   }

     function GetDni():string{
        return $this->dni;
   }

     function GetNombre():string{
        return $this->nombre;
   }

     function GetSexo():string{
        return $this->sexo;
   }

     function __toString()
   {
       return $this->apellido . '-' .$this->nombre . '-' .$this->sexo . '-' .$this->dni ;
   }
}
?>