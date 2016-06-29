<?php 
session_start();
if(!isset($_SESSION['email'])){
    header ('location: ../index.php');
}
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aclara Design</title>
</head>
<body>
    <header></header>
    <section class="row">
        <div class="col l4">
            <!--Mostraremos: 
            información personal
            información de proyectos ejecutados-->
            
        </div>
        <div class="col l12">
            <form action="../php/procesos/sendPlano.php" method="post" enctype="multipart/form-data">
                <input type="file" name="plano"><br>
                Nombre del proyecto: <input type="text" name="proyectName">
                <input type="submit">
            </form>
        </div>
    </section>
    <footer></footer>
</body>
</html>