<?php 

    include '../../modelo/conexion.php';

    if(isset($_POST['actualizar'])){
        if(!empty($_POST['id_empresa'])){
                $id=$_POST['id_empresa'];
                $nombre=$_POST['nombre'];
                $telefono=$_POST['telefono'];
                $ubicacion=$_POST['ubicacion'];
                $ruc=$_POST['ruc'];

                $sentencia="UPDATE empresa SET nombre='$nombre', telefono=$telefono, ubicacion='$ubicacion', ruc=$ruc  WHERE id_empresa=$id";
                $consulta= $conexPdo->prepare($sentencia);
                $consulta->execute();
    
                    if($consulta){
                        header('location:../../vista/acerca.php');
                    }else{
                        echo "Error al conectar...";
                    }
        }
    }



?>