<?php

    include_once'../../modelo/conexion.php';

    if(isset($_GET['id'])){

        $id=$_GET['id'];

        $sentencia= "DELETE FROM asistencia WHERE id_asistencia=$id";
        $consulta= $conexPdo->prepare($sentencia);
        $consulta->execute();

        if($consulta==true){
            
            header('location:../../vista/inicio.php');

         }else{ 
           
         }

        

    }

?>