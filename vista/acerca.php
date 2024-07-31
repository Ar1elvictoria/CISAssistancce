<?php
//
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellidop']) and empty($_SESSION['apellidom'])) {
    header('location:login/login.php');
}
?>

<style>
    ul li:nth-child(5) .activo {
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de</title>
</head>

<body>
    <div class="page-content">
        <h4 class="text-center text-secondary">Datos de la Gobernatura</h4>

        <?php
        include "../modelo/conexion.php";
        include "../controlador/ModificarEmpresa.controller.php";

        $sql = $conexion->query("SELECT * FROM institucion");
        ?>

        <div class="raw">
            <form action="" method="post">
                <?php
                while ($datos = $sql->fetch_object()) { ?>
                    <div hidden class="fl-flex-label mb-4 px-2 col-12">
                        <input type="text" placeholder="ID" class="input input__text" name="txtid" value="<?= $datos->id_institucion ?>">
                    </div>
                    <div class="fl-flex-label mb-4 px-2 col-12">
                        <input type="text" placeholder="Nombre" class="input input__text" name="nombre" value="<?= $datos->nombre ?>">
                    </div>
                    <div class="fl-flex-label mb-4 px-2 col-12">
                        <input type="text" placeholder="Telefono de Contacto" class="input input__text" name="telefono" value="<?= $datos->telefono ?>">
                    </div>
                    <div class="fl-flex-label mb-4 px-2 col-12">
                        <input type="text" placeholder="Ubicacion" class="input input__text" name="ubicacion" value="<?= $datos->ubicacion ?>">
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
</body>

</html>

<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>