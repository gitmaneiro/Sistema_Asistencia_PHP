<?php

    session_start();

    if(!empty($_POST['btningresar'])){
        if(!empty($_POST['usuario']) and !empty($_POST['password'])){
            $usuario= $_POST['usuario'];
            $password= md5($_POST['password']);

            $sentencia= "SELECT * FROM usuario WHERE usuario=:usuario and password=:password";
            $consulta= $conexPdo->prepare($sentencia);

            $consulta->bindValue(':usuario', $usuario);
            $consulta->bindValue(':password', $password);

            $consulta->execute();

            if($datos=$consulta->fetchObject()){
                $_SESSION['nombre']= $datos->nombre;
                $_SESSION['apellido']= $datos->apellido;
                $_SESSION['id']= $datos->id_usuario;
                header("location:../inicio.php");
            }else{
                echo '<div class="alert alert-danger">El usuario no existe</div>';
            }

        }else {
            echo '<div class="alert alert-danger">Los campos estan vacios</div>';
        }
    }


?>