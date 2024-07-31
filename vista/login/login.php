<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Formulario Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" >

    <link rel="stylesheet" href="./css/Stylelogin.css">
</head>

<body>
    <section class="container">
        <h3>Bienvenido</h3>
        <form id="login-form" method="POST">

            <?php
            include "../../modelo/conexion.php";
            include "../../controlador/Login.controller.php";
            ?>

            <input 
            class="inputs" 
            id="usuario" 
            type="text" 
            name="usuario" 
            autocomplete="usuario" 
            value="" 
            placeholder="Usuario"
            >

            <input 
            class="inputs" 
            type="password" 
            id="input" 
            name="password" 
            autocomplete="current-password" 
            placeholder="Contraseña"
            >

            <a class="" href="">Olvidé mi contraseña</a>

            <input name="btningresar" class="button" title="click para ingresar" type="submit" value="INICIAR SESION">
        </form>
    </section>
    
    <script src="js/fontawesome.js"></script>
    <script src="js/main.js"></script>
    <script src="js/main2.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>

</body>

</html>