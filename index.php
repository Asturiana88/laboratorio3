<?php
include 'empleado.php';
include './validarSesion.php';

$carlos = new Empleado("carlos", "deucol",33200322,"M",2010, 50000, "Tarde");
$listaPeople = array(
    new Empleado("carlos", "deucol",33200322,"M",2010, 50000, "Tarde"),
    new Empleado("carlos", "deucol",33200322,"M",2010, 50000, "Tarde"),
    new Empleado("carlos", "deucol",33200322,"M",2010, 50000, "Tarde"),
    new Empleado("carlos", "dfffffffffffffff",33200322,"M",2010, 50000, "Tarde"),
    new Empleado("carlos", "deucol",33200322,"M",2010, 50000, "Tarde"),
    new Empleado("carlos", "deucol",33200322,"M",2010, 50000, "Tarde"),
)
?>
