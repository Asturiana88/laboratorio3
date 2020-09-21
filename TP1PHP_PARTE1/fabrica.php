<?php

require './empleado.php';

class Fabrica{
    private $_cantidadMaxima;
    private $_empleados = [];
    private $_razonSocial;

    function __construct($_razonSocial) {
        $this->razonSocial = $_razonSocial;
        $_cantidadMaxima = 5;
    }

    function AgregarEmpleado(Empleado $emp):bool{
        if ($_empleados.length() <  $_cantidadMaxima){
            $_empleados.push($emp);
            EliminarEmpleadosRepetidos();
            return true;
        }
        echo "Cantidad maxima de empleados superada";
        return false;
    }

    function CalcularSueldos():double{
        $totalSueldo=0; 
        for ($i=0; $_empleados.length() < $_cantidadMaxima; $i++) { 
            $elem = $_empleados($i);
            $totalSueldo = $totalSueldo + $elem.GetSueldo();
        }
        echo "total sueldo: " . $totalSueldo;
        return $totalSueldo;
    }

    function EliminarEmpleado(Empleado $emp):bool{
        for ($i=0; $_empleados.length() < $_cantidadMaxima; $i++) { 
            if($_empleados[i] == $emp){
                unset($emp);
                return $_empleados;
            }
        }
        return $_empleados;
    }
    function EliminarEmpleadoRepetido():void{
        $_empleados = array_unique($_empleados);
    }

    function __toString()
    {
        return $this->$_empleados . '-' .$this->$_razonSocial . '-' .$this->$_cantidadMaxima;
    }
}
?>