<?php
//
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellidop']) and empty($_SESSION['apellidom'])) {
    header('location:login/login.php');
}
?>

<style>
    ul li:nth-child(1) .activo {
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
    <title>Asistencias</title>
</head>

<body>
    <div class="page-content">
        <h4 class="text-center text-secondary">Asistencia de Practicantes</h4>

        <?php

        include "../modelo/conexion.php";
        include "../controlador/EliminarAsistencia.controller.php";


        $sql = $conexion->query(" SELECT
        asistencia.id_asistencia,
        asistencia.id_practicante,
        asistencia.entrada,
        asistencia.salida,
        practicante.id_practicante,
        practicante.nombre as 'nombrepracticante',
        practicante.apellidop,
        practicante.apellidom,
        practicante.uak,
        practicante.area,
        area.id_area,
        area.nombre as 'nombrecargo'
        FROM
        asistencia
        INNER JOIN practicante ON asistencia.id_practicante = practicante.id_practicante
        INNER JOIN area ON practicante.area = area.id_area
        ");
        ?>
        <div class="raw">
            <div class="text-right p-2">
                <a href="fpdf/ReporteAsistencia.php" target="_blank" class="btn btn-succes">Generar Reportes</a>
                <a href="reporte_asistencias.php" class="btn btn-success">Mas Reportes</a>
            </div><br>
        </div>
        <!-- Muestra las asistencias del dia actual-->
        <table class="table table-boreded table-holder w-100" id="example">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Practicante</th>
                    <th scope="col">UAK</th>
                    <th scope="col">Area</th>
                    <th>Entrada</th>
                    <th>Salida</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Extrae la informacion de la BD y la muestra
                while ($datos = $sql->fetch_object()) { ?>
                    <tr>
                        <td><?= $datos->id_asistencia ?></td>
                        <td><?= $datos->nombrepracticante . " " . $datos->apellidop . " " . $datos->apellidom ?></td>
                        <td><?= $datos->uak ?></td>
                        <td><?= $datos->area ?></td>
                        <td><?= $datos->entrada ?></td>
                        <td><?= $datos->salida ?></td>
                        <td>
                            <a href="inicio.php?id=<?= $datos->id_asistencia ?>" onclick="advertencia(event)" class="btn btn-danger"> <!-- Se llama la funcion desde la ruta de public/sweet/sweet.js para darle mas estilos con sweetAlert-->
                                <i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>

    </div>
    </div>
    <!-- fin del contenido principal -->
</body>

</html>



<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>