<?php
//
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellidop']) and empty($_SESSION['apellidom'])) {
    header('location:login/login.php');
}
?>

<style>
    ul li:nth-child(4) .activo {
        background: rgb(255,255,255) !important;
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
    <title>Areas</title>
</head>

<body>
    <div class="page-content">
        <h4 class="text-center text-secondary">Lista de Areas</h4>

        <?php

        include "../modelo/conexion.php";
        include "../controlador/ModificarArea.controller.php";
        include "../controlador/EliminarArea.controller.php";


        $sql = $conexion->query(" SELECT * FROM area");

        ?>

        <!-- Boton de registro de nuevas areas -->
        <a href="RegistroArea.php" class="btn btn-success mb-4"><i class="fa-solid fa-plus"></i> Registro</a><br><br>

        <!-- Muestra las asistencias del dia actual-->
        <table class="table table-bordered table-holder border-black w-100" id="example">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Extrae la informacion de la BD y la muestra
                while ($datos = $sql->fetch_object()) { ?>
                    <tr>
                        <td><?= $datos->id_area ?></td>
                        <td><?= $datos->nombre ?></td>
                        <td>
                            <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal<?= $datos->id_area ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="area.php?id=<?= $datos->id_area ?>" onclick="advertencia(event)" class="btn btn-danger btn-sm"> <!-- Se llama la funcion desde la ruta de public/sweet/sweet.js para darle mas estilos con sweetAlert-->
                                <i class="fa-solid fa-trash sm"></i>
                            </a>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?= $datos->id_area ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header d-flex">
                                    <h5 class="modal-title w-100" id="exampleModalLabel">Modificar Administrador</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">
                                        <div hidden class="fl-flex-label mb-4 px-2 col-12">
                                            <input type="text" placeholder="ID" class="input input__text" name="txtid" value="<?= $datos->id_area ?>">
                                        </div>
                                        <div class="fl-flex-label mb-4 px-2 col-12">
                                            <input type="text" placeholder="Nombre(s)" class="input input__text" name="nombre" value="<?= $datos->nombre ?>">
                                        </div>
                                        <div class="text-right p-2">
                                            <a href="area.php" class="btn btn-secondary btn-rounded">Volver</a>
                                            <button type="submit" value="ok" name="btnmodificar" class="btn btn-success btn-rounded">Modificar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>
            </tbody>
        </table>

    </div>
    </div>
</body>

</html>


<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>