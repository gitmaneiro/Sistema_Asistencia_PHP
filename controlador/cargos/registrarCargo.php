<?php 
    
    include '../../modelo/conexion.php';

    if(isset($_POST['guardar'])){
        if(!empty($_POST['nombre'])){
            $cargo= $_POST['nombre'];

            $psentencia= "SELECT count(*) AS total FROM cargo WHERE nombre='$cargo'";
            $pconsulta= $conexPdo->prepare($psentencia);
            $pconsulta->execute();
    
            $dato= $pconsulta->fetch();

            if($dato['total'] >0){
                echo "Este cargo ya existe..";
            }else{
                $sentencia= "INSERT INTO cargo (nombre) VALUES ('$cargo')";
                $consulta= $conexPdo->prepare($sentencia);
                $consulta->execute();
    
                if($consulta){
                    header('location:../../vista/cargo.php');
                }else{
                    echo "Error al conectar..";
                }
            }

           
        }else{
            echo "Debe llenar todos los campos...";
        }
    }

?>