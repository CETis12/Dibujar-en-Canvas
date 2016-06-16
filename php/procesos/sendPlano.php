<?php
$idUser = $_POST['user'];
$status = "";
if ($_POST["action"] == "upload") {
    $tamano = $_FILES["plano"]['size'];
    $tipo = $_FILES["plano"]['type'];
    $archivo = $_FILES["plano"]['name'];
    
    $prefijo = substr(md5(uniqid(rand())),0,6);

  if ($archivo != "") {
        $destino = "../../assets/planos/".$archivo;
        if(copy($_FILES['plano']['tmp_name'],$destino)) {
            $status = "Archivo subido: <b>".$archivo."</b>";
            echo $destino;
        } else {
            header ('location: ../../index.php?error=2');
        }
    } else {
        header ('location: ../../index.php?error=1');
    }
}

?>