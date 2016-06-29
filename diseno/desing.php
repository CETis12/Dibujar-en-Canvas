<?php 
session_start();
if(!isset($_SESSION['email'])){
    header ('location: ../index.php');
}
$email = $_SESSION['email'];
$proyectName = $_SESSION['proName'];
$sql = "SELECT * FROM planos WHERE proyectoName ='".$proyectName."'";
require ('../php/class/inicioSesion.php');

$plano = new panoExe;
$plano->sqlRest($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aclara | Design</title>
    
</head>
<body>
    
</body>
</html>