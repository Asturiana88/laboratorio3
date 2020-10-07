<?php
include 'interfaces.php';

class Fabrica implements IArchivo{
    private $_cantidadMaxima;
    private $_empleados = array();
    private $_razonSocial;

    function __construct($_razonSocial, $_cantMaxima=5) {
        $this->_razonSocial = $_razonSocial;
        $this->_cantidadMaxima = $_cantMaxima;
    }

    function GetEmpleados():array {
         return $this->_empleados;
   }

    function AgregarEmpleado(Empleado $emp):bool{
        if (count($this->_empleados) <  $this->_cantidadMaxima){
            array_push($this->_empleados,$emp);
           
           // $this->EliminarEmpleadoRepetido();
            return true;
        }
        echo "Cantidad maxima de empleados superada";
        return false;
    }

    function CalcularSueldos():double{
        $totalSueldo=0; 
        for ($i=0; count($_empleados ) < $this->_cantidadMaxima; $i++) { 
            $elem = $_empleados($i);
            $totalSueldo = $totalSueldo + $elem->GetSueldo();
        }
        echo "total sueldo: " . $totalSueldo;
        return $totalSueldo;
    }

    function EliminarEmpleado(Empleado $emp):bool{
        $new_empleados = array();
        $modified = false;
        for ($i=0; count($this->_empleados) < $i; $i++) { 
            if($this->_empleados[$i] !== $emp){
               // $this->AgregarEmpleado($this->_empleados[$i]);
               array_push($new_empleados, $this->_empleados[$i]);
            } else {
                $modified = true;
            }
        }
        $this->_empleados = $new_empleados;
        return $modified;
    }

    function EliminarEmpleadoRepetido():void{
        $this->_empleados = array_unique($this->_empleados);
    }

    function __toString()
    {
        return $this->_empleados . '-' .$this->_razonSocial . '-' .$this->_cantidadMaxima;
    }

    public function TraerDeArchivo($nombreArchivo):void
    {
        $handle = fopen($nombreArchivo, "r");
        while (($line = fgets($handle)) !== false) {
            $empleado = new Empleado(...explode("-", $line)); 
            $this->AgregarEmpleado($empleado);  
        }   
        //fclose($handle);
    }
  
    public function GuardarEnArchivo($nombreArchivo):void
    {   
        $myfile = fopen($nombreArchivo, "w");
        foreach ($this->_empleados as $valor) {
            if($valor){
                fwrite($myfile, $valor->__toString(). PHP_EOL);
            }
        }
    }
}
?>