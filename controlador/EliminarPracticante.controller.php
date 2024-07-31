<?php

if (!empty($_GET["id"])) {
    $id = $_GET["id"];

    $sql=$conexion->query("DELETE FROM `practicante` WHERE id_practicante=$id");

    if ($sql == true) { ?>
        <script>
                $(function notificacion() { // 
                    new PNotify({
                        title: "CORRECTO",
                        type: "success",
                        text: "Se ah eliminado correctamente!",
                        styling: "bootstrap3"
                    })
                })
            </script>
    <?php } else { ?>
        <script>
                $(function notificacion() { // 
                    new PNotify({
                        title: "Error",
                        type: "error",
                        text: "Ocurrio un error al eliminar",
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