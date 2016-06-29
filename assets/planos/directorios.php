<?php
session_start();
if(!isset($_SESSION['email'])){
    header ('location: ../../index.php');
}
$email = $_SESSION['email'];
if(!file_exists($email)){
    if(mkdir("$email", 0700)){
        header ('location: ../../diseno/');
    }else{
        header ('location: ../../index.php?error=0');
    }
}else{
    header ('location: ../../diseno/');
}
?>