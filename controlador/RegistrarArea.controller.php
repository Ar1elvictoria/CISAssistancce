<?php

if (!empty($_POST["registrar"])) {
    if (!empty($_POST["nombre"])) {

        $nombre = $_POST["nombre"];
        $sql = $conexion->query("SELECT count(*) as 'total' FROM area where nombre='$nombre'");
        if ($sql->fetch_object()->total > 0) { ?>
            <script>
                $(function notificacion() { // 
                    new PNotify({
                        title: "Error",
                        type: "warning",
                        text: "El Area <?= $nombre ?> ya existe!",
                        styling: "bootstrap3"
                    })
                })
            </script>
            <?php } else {
            $registro = $conexion->query("INSERT INTO `area`(`nombre`) VALUES ('$nombre')");

            if ($registro == true) { ?>
                <script>
                    $(function notificacion() { // 
                        new PNotify({
                            title: "Correcto!",
                            type: "success",
                            text: "Se ha registrado correctamente!",
                            styling: "bootstrap3"
                        })
                    })
                </script>
            <?php } else { ?>
                <script>
                    $(function notificacion() { // 
                        new PNotify({
                            title: "Error!",
                            type: "error",
                            text: "Registro incorrecto!",
                            styling: "bootstrap3"
                        })
                    })
                </script>
        <?php }
        }
    } else { ?>
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "Error",
                    type: "error",
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
