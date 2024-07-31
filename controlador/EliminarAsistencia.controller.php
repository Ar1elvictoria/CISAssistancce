<?php

//Eliminacion de la asistencia por medio del ID
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql = $conexion->query(" DELETE FROM asistencia WHERE id_asistencia=$id");

    
    //Validacion de eliminacion correcta
    if ($sql == true) { ?>
        <script>
            $(function notificacion() { // Notificacion de eliminacion correcta
                new PNotify({
                    title: "Correcto",
                    type: "success",
                    text: "Se elimino correctamente",
                    styling: "bootstrap3"
                })
            })
        </script>
    <?php } else { ?>
        <script>
            $(function notificacion() { // Notificacion de eliminacion incorrecta
                new PNotify({
                    title: "Incorrecto",
                    type: "error",
                    text: "Error al eliminar",
                    styling: "bootstrap3"
                })
            })
        </script>
<?php } ?>

<!--Evitar la duplicidad de los datos-->
<script>
setTimeout(() => {
    window.history.replaceState(null, null, window.location.pathname);
}, 0);
</script>

<?php }
