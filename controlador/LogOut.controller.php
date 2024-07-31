<?php

//Cerrar la sesion del usuarios
session_start();
session_destroy();
header("location:/cisAssistance/vista/login/login.php");