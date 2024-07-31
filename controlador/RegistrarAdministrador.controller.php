<?php

//Verifica que los campos no esten vacios
if (!empty($_POST["registrar"])) {
    if (
        !empty($_POST["nombre"]) and
        !empty($_POST["apellidop"]) and
        !empty($_POST["apellidom"]) and
        !empty($_POST["usuario"]) and
        !empty($_POST["password"])
    ) {

        $nombre = $_POST["nombre"];
        $apellidop = $_POST["apellidop"];
        $apellidom = $_POST["apellidom"];
        $usuario = $_POST["usuario"];
        $password = md5($_POST["password"]);

        $sql = $conexion->query("SELECT count(*) as 'total' FROM administrador where usuario='$usuario'");
        if ($sql->fetch_object()->total > 0) { ?> <!-- Verifica que el usuario no exista en la base de datos-->
            <script>
                $(function notificacion() { // 
                    new PNotify({
                        title: "Error",
                        type: "warning",
                        text: "El usuario <?= $usuario ?> ya existe!",
                        styling: "bootstrap3"
                    })
                })
            </script>
            <?php } else {
            $registro = $conexion->query("INSERT INTO `administrador`(`nombre`, `apellidop`, `apellidom`, `usuario`, `password`)
            VALUES ('$nombre','$apellidop','$apellidom','$usuario','$password')"); // Inserta un nuevo usuario en la base de datos
            if ($registro == true) { ?> <!-- Valida que el registro sea correcto -->
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
