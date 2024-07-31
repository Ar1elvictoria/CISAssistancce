<?php 
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/Styles/Styles.css">
    <!-- pNotify -->
    <link href="public/pnotify/css/pnotify.css" rel="stylesheet" />
    <link href="public/pnotify/css/pnotify.buttons.css" rel="stylesheet" />
    <link href="public/pnotify/css/custom.min.css" rel="stylesheet" />

    <!-- pnotify -->
    <script src="public/pnotify/js/jquery.min.js">
    </script>
    <script src="public/pnotify/js/pnotify.js">
    </script>
    <script src="public/pnotify/js/pnotify.buttons.js">
    </script>
    <title>Bienvenida</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="accessosistema " href="./vista/login/login.php">Ingresar al Sistema</a>
            </div>
        </div>
    </nav>

    <h1>Registra tu Asistencia!</h1>
    <?php date_default_timezone_set('Etc/GMT+6'); ?>
    <h2 id="fecha"><?= date("d/m/Y, h:i:s") ?></h2>
    <?php
    include "modelo/conexion.php";
    include "controlador/RegistrarAsistencia.controller.php";
    ?>
    <div class="container" style="color:'red'">
        <p>Ingrese su UaK</p>
        <form action="" method="post">
            <input type="number" placeholder="ID del Practicante" name="txtuak" id="inputuak">
            <div class="botones">
                <button id="salida" type="submit" name="salida" value="ok" class="btn btn-danger">SALIDA</button>
                <button id="entrada" type="submit" name="entrada" value="ok" class="btn btn-success">ENTRADA</button>
            </div>
        </form>
    </div>


    <script>
        // Mostrar la fecha y hora actual del registro
        setInterval(() => {
            let fecha = new Date();
            let FechaHora = fecha.toLocaleString();
            document.getElementById("fecha").textContent = FechaHora;
        }, 1000);
    </script>

    <script>
        //Limitar el uak a solo 8 digitos
        let uak = document.getElementById("inputuak");
        uak.addEventListener("input",function(){
            if(this.value.length > 8 ){
                this.value=this.value.slice(0,8);
            }
        })
    </script>

    <script>
        document.addEventListener("keyup",function(){
            if(event.code == "ArrowLeft" ){
                document.getElementById("salida").click();
            } else {
                if (event.code == "ArrowRight") {
                    document.getElementById("entrada").click();
                }
            }
        })
    </script>
</body>

</html>