<?php
$nombre = $_POST['nombre'];
$correo = $_POST['email'];
$telefono = $_POST['telefono'];

#instrucciones
$sql = "INSERT INTO usuarios (userName, email, movil) VALUES('$nombre','$correo','$telefono')";
$query ="SELECT * FROM usuarios WHERE email ='".$correo."'"; 

require ('../class/inicioSesion.php');
$email = new iniSesion;

#hacemos la conexion
$em = $email->sqlRest($query);
$mail = $email->result;

if($correo == $mail){
    session_start();
    $_SESSION['email'] = $correo;
    header ('location: ../../diseno/');
}else{
    $email->consultaSimple($sql);
    $regis = $email->succes;
    if($regis){
        session_start();
        $_SESSION['email'] = $correo;
        header ('location: ../../assets/planos/directorios.php');
    }else{
        header ('location: ../../index.php?error=1');
    }
}
?>