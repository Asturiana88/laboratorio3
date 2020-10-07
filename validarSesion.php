<?php
session_start();
if(!$_SESSION['DNIEmpleado']){
    header("Location: /login.html"); 
}
?>
