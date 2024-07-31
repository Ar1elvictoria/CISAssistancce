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
    <title>Reporte Asistencias</title>
</head>

<body>

    <?php

    include "../modelo/conexion.php";

    $sql = $conexion->query("SELECT * FROM practicante");


    ?>
    <div class="page-content">
        <h4 class="text-center text-secondary">Asistencia de Practicantes</h4>

        <form action="fpdf/ReporteAsistenciaFecha.php">
            <input required type="date" class="input input__text mb-2" name="fechainicio">
            <input required type="date" class="input input__text mb-2" name="fechafinal">
            <select required name="namepracticante" id="" class="input input__select">
                <option value="todos">Todos los empleados</option>
                <?php
                while ($datos = $sql->fetch_object()) { ?>
                    <option value="<?= $datos->id_practicante ?>"><?= $datos->nombre." ".$datos->apellidop." ".$datos->apellidom ?></option>
                <?php }
                ?>
            </select>
            <button type="submit" class="btn btn-success">Generar Reporte</button>
        </form>
    </div>
    <!-- fin del contenido principal -->
</body>

</html>



<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>