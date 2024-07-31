<?php

if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["txtid"])) {

        $id = $_POST["txtid"];
        $nombre = $_POST["nombre"];

        $sql = $conexion->query("SELECT count(*) as 'total' FROM area where nombre='$nombre' and id_area != $id");

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
            $registro = $conexion->query("UPDATE `area` SET `nombre`='$nombre' 
            WHERE id_area = $id");

            if ($registro == true) { ?>
                <script>
                    $(function notificacion() { // 
                        new PNotify({
                            title: "Correcto!",
                            type: "success",
                            text: "Se ha modificado correctamente!",
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
                            text: "No se pudo modificar!",
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
