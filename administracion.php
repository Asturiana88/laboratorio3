<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
</head>
<body>
    
<?php
include 'empleado.php';
include 'fabrica.php';

try {
    $dni = $_POST["dni"];
    $apellido = $_POST["apellido"];
    $nombre = $_POST["nombre"];
    $sexo = $_POST["sexo"];

    $legajo = $_POST["legajo"];
    $sueldo = $_POST["sueldo"];
    $turno = $_POST["turno"];
         //$pathFoto = $FILE["foto"]["type"]= ["size"] = > 1024kb;
    //$file_type=$_FILES['image']['type'];
    //$file_size =$_FILES['image']['size'];

    function is_image($pathFoto)
    {
        $a = getimagesize($pathFoto);
        $image_type = $a[2];
        
        if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP, IMAGETYPE_JPG)))
        {
            return true;
        }
        return false;
    }



    $empleado = new Empleado($nombre, $apellido,$dni,$sexo,$legajo, $sueldo, $turno);
    $Mifabrica = new Fabrica("Mi Fabrica", 7);
    $Mifabrica->TraerDeArchivo('./archivos/empleados.txt');
    
    if($Mifabrica->AgregarEmpleado($empleado)){
        $Mifabrica->GuardarEnArchivo('./archivos/empleados.txt');
        echo '<a href="/backend/mostrar.php">Lista de Empleados</a>';
    }else {
        echo "<p>No se pudo agregar el nuevo empleados</p>";
        echo '<a href="index.html">Alta empleados</a>';
    }

} catch (Exception $e) {
    header("Location: index.html "); 
    exit();
}


?>
</body>
</html>

