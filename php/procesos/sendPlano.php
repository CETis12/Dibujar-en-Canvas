<?php 
session_start();
if(!isset($_SESSION['email'])){
    header ('location: ../index.php');
}
$email = $_SESSION['email'];
$proyectoName = $_POST['proyectName'];
$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
$limite_kb = 16384;
if(!file_exists("../../assets/planos/$email/$proyectoName")){
    if(mkdir("../../assets/planos/$email/$proyectoName", 0700)){
        
        $urlDestino = "../../assets/planos/$email/$proyectoName";
        $url = "assets/planos/$email/$proyectoName";
    #datos de la imagen para la tabla
        $nombreImg = $_FILES['plano']['name'];
        list($ancho, $alto, $tipo, $atributos) = getimagesize($_FILES['plano']['tmp_name']);
        $sql = "INSERT INTO planos (nameImg, urlImg, proyectoName, widthImg, heightImg, userMail) VALUES('$nombreImg', '$url', '$proyectoName', '$ancho', '$alto', '$email')";
        if(move_uploaded_file($_FILES["plano"]["tmp_name"], "$urlDestino/$nombreImg")){
            require ('../class/inicioSesion.php');
            $load = new iniSesion;
            $load->consultaSimple($sql);
            $succ = $load->succes;
            
            if($succ){
                session_start();
                $_SESSION['proName'] = $proyectoName;
                header ('location: ../../diseno/desing.php');
            }else{
                if(file_exists("../../assets/planos/$email/$proyectoName")){
                    if(unlink("../../assets/planos/$email/$proyectoName/$nombreImg")){
                        echo "";
                    }
                    if(rmdir("../../assets/planos/$email/$proyectoName")){
                        header ('location: ../../diseno/index.php?eror=2');
                    }else{
                        header ('location: ../../diseno/index.php?fatal=1');
                    }
                }
            }
        }else{
            header ('location: ../../diseno/index.php?error=1');
        }
        
    }else{
        header ('location: ../../diseno/index.php?error=3');
    }
}else{
    header ('location: ../../diseno/index.php?exists=true');
}
?>