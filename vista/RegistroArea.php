<?php
//
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellidop']) and empty($_SESSION['apellidom'])) {
    header('location:login/login.php');
}
?>

<style>
    ul li:nth-child(4) .activo {
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
    <h4 class="text-center text-secondary">Registro de Area</h4>

    <?php
    include "../modelo/conexion.php";
    include "../controlador/RegistrarArea.controller.php"; 
    ?>

    <div class="raw">
        <form action="" method="post">
            <div class="fl-flex-label mb-4 px-2 col-12">
                <input type="text" placeholder="Nombre" class="input input__text" name="nombre">
            </div>
            <div class="text-right p-2">
                <a href="area.php" class="btn btn-secondary btn-rounded">Volver</a>
                <button type="submit" value="ok" name="registrar" class="btn btn-success btn-rounded">Registrar</button>
            </div>
        </form>
    </div>

</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>