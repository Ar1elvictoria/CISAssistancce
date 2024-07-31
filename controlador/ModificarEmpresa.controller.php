<?php

if (!empty($_POST["modificar"])) {
    if ($_POST["txtid"]) {

        $id = $_POST["txtid"];
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $ubicacion = $_POST["ubicacion"];

        $sql = $conexion->query("UPDATE `institucion` SET 
        `nombre`='$nombre',`telefono`='$telefono',`ubicacion`='$ubicacion' 
        WHERE id_institucion=$id");

        if ($sql == true) { ?>
            <script>
                $(function notificacion() { // 
                    new PNotify({
                        title: "Correcto",
                        type: "success",
                        text: "Los datos se han modificado correctamente",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php } else { ?>
            <script>
                $(function notificacion() { // 
                    new PNotify({
                        title: "ERROR",
                        type: "error",
                        text: "Error al modificar los datos",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php }
    } else { ?>
        <script>
            $(function notificacion() { // 
                new PNotify({
                    title: "ERROR",
                    type: "error",
                    text: "Ups!, Error al modificar",
                    styling: "bootstrap3"
                })
            })
        </script>
    <?php } ?>
    <script>
        //Evitar la duplicidad de los datos
        setTimeout(() => {
            window.history.replaceState(null, null, window.location.pathname);
        }, 0);
    </script>
<?php }
