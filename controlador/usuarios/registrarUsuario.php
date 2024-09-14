<?php

include '../../modelo/conexion.php';

if(isset($_POST['guardar'])){

    if(!empty($_POST['nombre']) and !empty($_POST['apellido']) and !empty($_POST['usuario']) and !empty($_POST['contrasena'])){
        $nombre= $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $usuario= $_POST['usuario'];
        $contrasena= md5($_POST['contrasena']);

        $psentencia= "SELECT count(*) AS total FROM usuario WHERE usuario='$usuario'";
        $pconsulta= $conexPdo->prepare($psentencia);
        $pconsulta->execute();

        $dato= $pconsulta->fetch();

        //echo $dato['total'];

        if($dato['total'] >0){
            echo "Este Usuario ya existe";
        }else{
            $sentencia="INSERT INTO usuario (nombre, apellido, usuario, password) VALUES ('$nombre', '$apellido', '$usuario', '$contrasena')";
            $consulta= $conexPdo->prepare($sentencia);
            $consulta->execute();

                header('location:../../vista/usuario.php');

        }



    } 

   

}

?>