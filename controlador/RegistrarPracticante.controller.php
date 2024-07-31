<?php

if (!empty($_POST["registrar"])) {
    if (
        !empty($_POST["nombre"]) and
        !empty($_POST["apellidop"]) and
        !empty($_POST["apellidom"]) and
        !empty($_POST["email"]) and
        !empty($_POST["telefono"]) and
        !empty($_POST["uak"]) and
        !empty($_POST["area"])
    ) {

        $nombre = $_POST["nombre"];
        $apellidop = $_POST["apellidop"];
        $apellidom = $_POST["apellidom"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $uak = $_POST["uak"];
        $area = $_POST["area"];

        $sql=$conexion->query("SELECT count(*) as 'total' FROM practicante where uak=$uak");
        if ($sql->fetch_object()->total > 0) { ?>
            <script>
                $(function notificacion() { // 
                    new PNotify({
                        title: "ERROR",
                        type: "error",
                        text: "El UAK <?= $uak ?> ya existe!",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php } else {
            $registro=$conexion->query("INSERT INTO `practicante`(`nombre`, `apellidop`, `apellidom`, `correo`, `telefono`, `uak`, `area`) 
            VALUES ('$nombre','$apellidop','$apellidom','$email','$telefono','$uak',$area)");
            if ($registro == true) { ?>
                <script>
                $(function notificacion() { // 
                    new PNotify({
                        title: "CORRECTO",
                        type: "success",
                        text: "Practicante registrado correctamente!",
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
                        text: "Error al registrar practicante!",
                        styling: "bootstrap3"
                    })
                })
            </script>
            <?php }
            
        }
    } else { ?>
        <script>
                $(function notificacion() { // 
                    new PNotify({
                        title: "Warining",
                        type: "warning",
                        text: "Los Campos estan vacios!",
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