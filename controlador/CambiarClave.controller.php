<?php

if (!empty($_POST["modificar"])) {
    if (!empty($_POST["txtid"] & $_POST["claveactual"] & $_POST["clavenueva"])) {
        $id = $_POST["txtid"];
        $claveactual = md5($_POST["claveactual"]);
        $clavenueva = md5($_POST["clavenueva"]);

        $verificarclaveactual = $conexion->query("SELECT password FROM `administrador` WHERE id_administrador=$id");

        if ($verificarclaveactual->fetch_object()->password == $claveactual) {
            $sql = $conexion->query("UPDATE `administrador` SET `password`='$clavenueva' WHERE id_administrador=$id");
            if ($sql == true) { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "Correcto!",
                            type: "success",
                            text: "La contraseña se actualizo de manera coorrecta!",
                            styling: "bootstrap3"
                        })
                    })
                </script>
            <?php } else { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "Error",
                            type: "error",
                            text: "Errror al modificar la contraseña!",
                            styling: "bootstrap3"
                        })
                    })
                </script>
            <?php }
        } else { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "Error",
                        type: "error",
                        text: "La contraseña actual es incorrecta!",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php }
    } else { ?>
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "Warning!",
                    type: "wargning",
                    text: "Los Campos estan vacios!",
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
