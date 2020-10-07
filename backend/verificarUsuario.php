<?php
    $dni = $_POST["dni"];
    $apellido = $_POST["apellido"];

    $handle = fopen("../archivos/empleados.txt", "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            if(explode("-", $line)[2] == $dni && explode("-", $line)[1] == $apellido ){
                session_start();
                $_SESSION['DNIEmpleado'] = $dni;
                header("Location: /backend/mostrar.php "); 
            }else {
                echo "El empleado NO existe ";
                echo '<a href="/login.html">Ir a Login</a>';
            }
    }
    fclose($handle);
}
?>
