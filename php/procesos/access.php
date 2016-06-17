<?php
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

#instrucciones
$sql = "INSERT INTO usuarios (userName, email, movil) VALUES('$nombre','$email','$telefono')";
$query ="SELECT * FROM usuarios WHERE email ='".$email."'"; 
#hacemos la conexion

#verificamos que no exista el email
if


?>