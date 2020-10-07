<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Empleado</title>
</head>
<body>

<?php
include 'empleado.php';
include 'fabrica.php';

$empleado;
$legajo = $_GET["legajo"];

$handle = fopen("./archivos/empleados.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        if(explode("-", $line)[4] == $legajo){
            $empleado = new Empleado(...explode("-", $line));   
        }
    }
    fclose($handle);
}

if($empleado){
    $Mifabrica = new Fabrica("Mi Fabrica", 7);
    $Mifabrica->TraerDeArchivo('./archivos/empleados.txt');
    if($Mifabrica->EliminarEmpleado($empleado)){
        $Mifabrica->GuardarEnArchivo('./archivos/empleados.txt');
    };
} else{
    echo '<p>No se pudo Eliminar el empleado</p>';
}

?>

<a href="/backend/mostrar.php">Lista de Empleados</a> <br>
<a href="index.html">Alta empleados</a>

</body>
</html>




