<?php
include '../empleado.php';
include '../validarSesion.php';

// $destino = "uploads/".$_FILES["archivo"]["name"];
// move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino);

$listaPeople = array();
$handle = fopen("../archivos/empleados.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $empleado = new Empleado(...explode("-", $line));   
        array_push($listaPeople, $empleado);
    }
    fclose($handle);
} else {
    // error opening the file.
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo 'HTML 5 – Listado de Empleados'; ?></title>
</head>
<body>
<div style="
    border-top: 1px solid black;
    margin-top: 35px;
    margin-left: 35px;
    border-left: 1px solid black;
">


<table align="center">
    <h2 style="text-align:center">Listado de empleados</h2>
    <tbody>
        <tr>
            <td colspan="2"><h4>Info</h4></td>
        </tr>
        <tr>
            <td colspan="2"><hr></td>
        </tr>
            <td>
        <?php foreach($listaPeople as $empleado=>$value): ?>
        <tr>
            <td>
                <?php  echo $value->__toString() ?>
            </td> 
            <td><a href="<?php echo '/eliminar.php?legajo=' . $value->GetLegajo() ?>" >Eliminar</a> </td> 
        </tr>
        <?php endforeach; ?>
            </td>
        <tr>
            <td colspan="2"><hr></td>
        </tr>
    </tbody>    
</table> 
    <a style="margin-left: 30%;" href="/index.html">Agregar nuevo empleado</a>
    <a style="margin-left: 30%;" href="/cerrarSesion.php">Desloguearse</a>
</div>
</body>
</html>

<?php
//  echo $empleado->GetNombre() . " - " . $empleado->GetApellido() .  " - " . $empleado->GetSexo() . " - " . $empleado->GetSueldo() . " - " . $empleado->GetTurno();
  ?>
