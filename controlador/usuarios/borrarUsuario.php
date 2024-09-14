<?php

    include '../../modelo/conexion.php';

    if(isset($_GET['id'])){
        $id=$_GET['id'];

       $sentencia= "DELETE FROM usuario WHERE id_usuario='$id'";
       $consulta= $conexPdo->prepare($sentencia);
       $consulta->execute();

       if($consulta){
            header('location:../../vista/usuario.php');
       }else{
            echo "Error al conectar";
       }

    }


?>