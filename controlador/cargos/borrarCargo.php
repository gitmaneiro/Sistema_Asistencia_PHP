<?php 

    include '../../modelo/conexion.php';

    if(!empty($_GET['id'])){
        $id= $_GET['id'];

        $sentencia= "DELETE FROM cargo WHERE id_cargo=$id";
        $consulta= $conexPdo->prepare($sentencia);
        $consulta->execute();

        if($consulta){
            header('location:../../vista/cargo.php');
        }else{
            echo "Debe llenar todos los campos..";
        }

    }

?>