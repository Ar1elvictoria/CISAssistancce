<?php

if (!empty($_POST["btnmodificar"])) {
    if (
        !empty($_POST["nombre"]) and
        !empty($_POST["apellidop"]) and
        !empty($_POST["apellidom"]) and
        !empty($_POST["email"]) and
        !empty($_POST["telefono"]) and
        !empty($_POST["uak"]) and
        !empty($_POST["area"]) and
        !empty($_POST["txtid"])
    ) {

        $nombre = $_POST["nombre"];
        $apellidop = $_POST["apellidop"];
        $apellidom = $_POST["apellidom"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $uak = $_POST["uak"];
        $area = $_POST["area"];
        $id = $_POST["txtid"];

        $sql = $conexion->query("UPDATE `practicante` SET 
        `nombre`='$nombre',`apellidop`='$apellidop',`apellidom`='$apellidom',`correo`='$email',
        `telefono`='$telefono',`uak`='$uak',`area`='$area' WHERE `id_practicante`=$id");

        if ($sql == true) { ?>
            <script>
                $(function notificacion() { // 
                    new PNotify({
                        title: "CORRECTO",
                        type: "success",
                        text: "Se Modifico Correctamente",
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
                        text: "Ups!, Error al modificar",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php }
    } else { ?>
        <script>
            $(function notificacion() { // 
                new PNotify({
                    title: "Warning",
                    type: "warning",
                    text: "Los campos estan vacios!",
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
