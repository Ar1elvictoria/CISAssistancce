<?php
//
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellidop']) and empty($_SESSION['apellidom'])) {
    header('location:login/login.php');
}

$id=$_SESSION["id"];
?>


<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">
    <h4 class="text-center text-secondary">CAMBIAR CONTRASEÑA</h4>

    <?php
    include "../modelo/conexion.php";
    include "../controlador/CambiarClave.controller.php";

    $sql = $conexion->query("SELECT * FROM administrador WHERE id_administrador=$id");
    ?>

    <div class="raw">
        <form action="" method="post">
            <?php
            while ($datos = $sql->fetch_object()) { ?>

                <div hidden class="fl-flex-label mb-4 px-2 col-12">
                    <input type="text" placeholder="ID" class="input input__text" name="txtid" value="<?= $datos->id_administrador ?>">
                </div>

                <div class="fl-flex-label mb-4 px-2 col-12">
                    <input type="password" placeholder="Contraseña Actual" class="input input__text" name="claveactual" value="">
                </div>

                <div class="fl-flex-label mb-4 px-2 col-12">
                    <input type="password" placeholder="Nueva Contraseña" class="input input__text" name="clavenueva" value="">
                </div>

                <div class="text-right p-2">
                    <!-- <a href="administrador.php" class="btn btn-secondary btn-rounded">Volver</a>-->
                    <button type="submit" value="ok" name="modificar" class="btn btn-success btn-rounded">Modificar Datos</button>
                </div>

            <?php }
            ?>

        </form>
    </div>

</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>