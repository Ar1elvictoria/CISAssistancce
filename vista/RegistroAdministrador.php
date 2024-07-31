<?php
//
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellidop']) and empty($_SESSION['apellidom'])) {
    header('location:login/login.php');
}
?>

<style>
    ul li:nth-child(2) .activo {
        background: rgb(255, 255, 255) !important;
        border-width: 10px;
        border-color: #FF5841;
    }
</style>


<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">
    <h4 class="text-center text-secondary">Registro de Administradores</h4>

    <?php
    include "../modelo/conexion.php";
    include "../controlador/RegistrarAdministrador.controller.php";
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro de Administrador</title>
    </head>

    <body>
        <div class="raw">
            <form action="" method="post">
                <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                    <input type="text" placeholder="Nombre(s)" class="input input__text" name="nombre">
                </div>
                <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                    <input type="text" placeholder="Apellido Paterno" class="input input__text" name="apellidop">
                </div>
                <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                    <input type="text" placeholder="Apellido Materno" class="input input__text" name="apellidom">
                </div>
                <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                    <input type="text" placeholder="Usuario" class="input input__text" name="usuario">
                </div>
                <div class="fl-flex-label mb-4 px-2 col-12 col-md-12">
                    <input type="password" placeholder="Contraseña" class="input input__text" name="password"><br><br>
                </div>

                <div class="text-right p-2 col-md-12">
                    <a href="administrador.php" class="btn btn-secondary">Volver</a>
                    <button type="submit" value="ok" name="registrar" class="btn btn-success">Registrar</button>
                </div>
            </form>
        </div>

</div>
</div>
</body>

</html>

<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>