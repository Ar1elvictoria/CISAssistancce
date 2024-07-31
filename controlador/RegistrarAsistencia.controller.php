<?php

//Registro de Entrada

if (!empty($_POST["entrada"])) {
    if (!empty($_POST["txtuak"])) {
        $uak = $_POST["txtuak"];

        $consulta = $conexion->query("SELECT COUNT(*) AS 'total' from practicante WHERE uak='$uak'");
        $id = $conexion->query("SELECT id_practicante from practicante WHERE uak='$uak'");

        if ($consulta->fetch_object()->total > 0) {

            $fecha = date("Y-m-d h:i:s");
            $idpracticante = $id->fetch_object()->id_practicante;

            $consultafecha = $conexion->query("SELECT entrada FROM asistencia where id_practicante=$idpracticante
            ORDER BY id_asistencia DESC LIMIT 1");
            $fechaentrada = $consultafecha->fetch_object()->entrada;

            if (substr($fecha, 0, 10) == substr($fechaentrada, 0, 10)) { ?>
                <script>
                    $(function notificacion() { // 
                        new PNotify({
                            title: "Error!",
                            type: "error",
                            text: "Ya se registro la entrada!",
                            styling: "bootstrap3"
                        })
                    })
                </script>
                <?php } else {

                $sql = $conexion->query("INSERT INTO `asistencia`(`id_practicante`, `entrada`) 
            VALUES ($idpracticante,'$fecha')");

                if ($sql == true) { ?>
                    <script>
                        $(function notificacion() { // 
                            new PNotify({
                                title: "Correcto",
                                type: "success",
                                text: "Registro de entrada exitoso!",
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
                                text: "No se ah podido registrar la entrada!!",
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
                        title: "Warning",
                        type: "warning",
                        text: "El UAK ingresado no existe!",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php }
    } else { ?>
        <script>
            $(function notificacion() { // 
                new PNotify({
                    title: "Error",
                    type: "warning",
                    text: "Ingrese el UAK !",
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



//Registro de Salida

if (!empty($_POST["salida"])) {
    if (!empty($_POST["txtuak"])) {
        $uak = $_POST["txtuak"];
        $consulta = $conexion->query("SELECT COUNT(*) AS 'total' from practicante WHERE uak='$uak'");
        $id = $conexion->query("SELECT id_practicante from practicante WHERE uak='$uak'");
        if ($consulta->fetch_object()->total > 0) {
            $fecha = date("Y-m-d h:i:s");
            $idpracticante = $id->fetch_object()->id_practicante;
            $ultimaentrada = $conexion->query("SELECT id_asistencia,entrada FROM asistencia where id_practicante=$idpracticante 
            ORDER BY id_asistencia DESC LIMIT 1 ");
            while ($datos = $ultimaentrada->fetch_object()) {
                $id_asistencia = $datos->id_asistencia;
                $entrada = $datos->entrada;
            }
            if (substr($fecha, 0, 10) !== substr($entrada, 0, 10)) { ?>
                <script>
                    $(function notificacion() { // 
                        new PNotify({
                            title: "Error",
                            type: "error",
                            text: "Primero registra la entrada!",
                            styling: "bootstrap3"
                        })
                    })
                </script>
                <?php 
            }else {
                    $consultafecha = $conexion->query("SELECT salida FROM asistencia where id_practicante=$idpracticante
                    ORDER BY id_asistencia DESC LIMIT 1");
                    $fechasalida = $consultafecha->fetch_object()->salida;
                    if (substr($fecha, 0, 10) == substr($fechasalida, 0, 10)) { ?>
                        <script>
                            $(function notificacion() { // 
                                new PNotify({
                                    title: "Error",
                                    type: "error",
                                    text: "Ya se registro la Salida!",
                                    styling: "bootstrap3"
                                })
                            })
                        </script>
                    <?php }else {
                        $sql = $conexion->query("UPDATE `asistencia` SET salida='$fecha' WHERE id_asistencia = $id_asistencia");
                        if ($sql == true) { ?>
                            <script>
                                $(function notificacion() { // 
                                    new PNotify({
                                        title: "Correcto",
                                        type: "success",
                                        text: "Registro de salida exitoso!",
                                        styling: "bootstrap3"
                                    })
                                })
                            </script>
                        <?php }else { ?>
                            <script>
                                $(function notificacion() { // 
                                    new PNotify({
                                        title: "Error",
                                        type: "error",
                                        text: "No se ah podido registrar la salida!!",
                                        styling: "bootstrap3"
                                    })
                                })
                            </script>
                <?php }
                }
            }
        } else { ?>
            <script>
                $(function notificacion() { // 
                    new PNotify({
                        title: "Warning",
                        type: "warning",
                        text: "El UAK ingresado no existe!",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php }
    } else { ?>
        <script>
            $(function notificacion() { // 
                new PNotify({
                    title: "Error",
                    type: "warning",
                    text: "Ingrese el UAK !",
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
