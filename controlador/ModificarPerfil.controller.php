<?php

if (!empty($_POST["modificar"])) {
    if (
        !empty($_POST["nombre"]) and
        !empty($_POST["apellidop"]) and
        !empty($_POST["apellidom"]) and
        !empty($_POST["usuario"]) and
        !empty($_POST["txtid"])
    ) {

        $nombre = $_POST["nombre"];
        $apellidop = $_POST["apellidop"];
        $apellidom = $_POST["apellidom"];
        $usuario = $_POST["usuario"];
        $id = $_POST["txtid"];

        $sql = $conexion->query("UPDATE `administrador` SET `nombre`='$nombre',`apellidop`='$apellidop',`apellidom`='$apellidom',`usuario`='$usuario' 
    WHERE id_administrador=$id");

        if ($sql == true) { ?>
            <script>
                $(function notificacion() { // 
                    new PNotify({
                        title: "Correcto",
                        type: "success",
                        text: "Los datos se han modificado correctamente!",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php } else { ?>
            <script>
                $(function notificacion() { // 
                    new PNotify({
                        title: "Error",
                        type: "warning",
                        text: "Los datos no se han podido modificar",
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
