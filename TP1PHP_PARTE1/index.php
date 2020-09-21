<?php
require './empleado.php';
require './fabrica.php';

$carlos = new Empleado("carlos", "deucol",33200322,"M",2010, 50000, "Tarde");
echo $carlos->GetApellido() . "\n";
echo $carlos->GetNombre(). "\n";
echo $carlos->GetDni(). "\n";
echo $carlos->GetSexo(). "\n";
echo $carlos->GetSueldo(). "\n";
echo $carlos->GetTurno(). "\n";
echo $carlos->GetLegajo(). "\n";
echo $carlos->__toString(). "\n";
echo $carlos->Hablar(). "\n";

$miFabrica = new Fabrica("LaFabrica");
echo $miFabrica->AgregarEmpleado($carlos);
echo $miFabrica->CalcularSueldos();
echo $miFabrica->EliminarEmpleado();
echo $miFabrica->EliminarEmpleadoRepetido();
echo $miFabrica->__toString();



?>