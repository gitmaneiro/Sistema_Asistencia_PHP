<?php 

include '../../modelo/conexion.php';

if(isset($_POST['actualizar'])){
    if(!empty($_POST['id_cargoa'])){
        $id= $_POST['id_cargoa'];
        $nombre= $_POST['nombrea'];
        
        $psentencia= "SELECT count(*) AS total FROM cargo WHERE nombre='$nombre' and id_cargo !=$id";
        $pconsulta= $conexPdo->prepare($psentencia);
        $pconsulta->execute();

        $dato= $pconsulta->fetch();

        if($dato['total'] > 0){

            echo "Este Cargo ya existe";
        }else{
            $sentencia="UPDATE cargo SET nombre='$nombre' WHERE id_cargo=$id";
            $consulta= $conexPdo->prepare($sentencia);
            $consulta->execute();

                if($consulta){
                    header('location:../../vista/cargo.php');
                }
        }
    }
}


?>