<?php

session_start();

// Valida que los datos del usuario sean los correctos para ingresar al sistema
if(!empty($_POST["btningresar"])){
    if(!empty($_POST["usuario"]) and !empty($_POST["password"])){
        $usuario = $_POST["usuario"];
        $password =md5( $_POST["password"]);
        $sql = $conexion -> query("SELECT * FROM administrador where usuario='$usuario' and password='$password'");
        if($datos = $sql->fetch_object()){
            $_SESSION["nombre"] = $datos->nombre;
            $_SESSION["apellidop"] = $datos->apellidop;
            $_SESSION["apellidom"] = $datos->apellidom;
            $_SESSION["id"] = $datos->id_administrador;
            header("location: ../inicio.php");
        }else{
            echo "<div class='alert alert-danger'>El ususario no existe!</div>";
        }
    }else{
        echo "<div class='alert alert-danger'>Los campos estan vacios</div>";
    }
}