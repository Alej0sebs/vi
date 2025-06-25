<?php
    if (!empty($_POST["login"])) {
        include("conexion.php");
        if (empty($_POST["username"]) && empty($_POST["password"])) {
            echo "Los campos estan vacios";
        } else {
            $usuario = $_POST["username"];
            $password = $_POST["password"];
            $sql = $conexion ->query("SELECT * FROM usuario WHERE user = '$usuario' AND clave = '$password'");
            if ($datos=$sql->fetch_object()) {
                header("Location: index.php");
            } else {
                echo "Usuario o contraseña incorrectos";
            }
            
        }
    }
?>