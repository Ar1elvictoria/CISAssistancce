<?php

if (!empty($_POST["btnmodificar"])) {
    //Verifica que los campos no esten vacios
    if (
        !empty($_POST["nombre"]) and
        !empty($_POST["apellidop"]) and
        !empty($_POST["apellidom"]) and
        !empty($_POST["usuario"])
    ) {

        $nombre = $_POST["nombre"];
        $apellidop = $_POST["apellidop"];
        $apellidom = $_POST["apellidom"];
        $usuario = $_POST["usuario"];
        $id = $_POST["txtid"];

        $sql = $conexion->query("SELECT count(*) as 'total' FROM administrador where usuario='$usuario' AND id_administrador!= $id ");
        
        if ($sql->fetch_object()->total > 0) { ?> <!-- Verifica que el usuario no se repita en la base de datos-->
            <script>
                $(function notificacion() { // 
                    new PNotify({
                        title: "Error",
                        type: "error",
                        text: "El usuario <?= $usuario ?> ya existe!",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php 
        }else {
            $modificar = $conexion->query("UPDATE `administrador` SET 
            `nombre`='$nombre',
            `apellidop`='$apellidop',
            `apellidom`='$apellidom',
            `usuario`='$usuario' WHERE id_administrador = '$id' ");
            if ($modificar == true) { ?>
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
                            text: "No se ah podido modificar!",
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
