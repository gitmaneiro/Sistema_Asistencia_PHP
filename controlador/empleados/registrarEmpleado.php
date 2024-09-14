<?php
    include '../../modelo/conexion.php';

    if(isset($_POST['guardar'])){

        if(!empty($_POST['nombre']) and !empty($_POST['apellido']) and !empty($_POST['dni']) and $_POST['cargo']!=0){
            $nombre= $_POST['nombre'];
            $apellido= $_POST['apellido'];
            $dni= $_POST['dni'];
            $cargo= $_POST['cargo'];

            $psentencia= "SELECT count(*) AS total FROM empleado WHERE dni=$dni";
            $pconsulta= $conexPdo->prepare($psentencia);
            $pconsulta->execute();
    
            $dato= $pconsulta->fetch();

            if($dato['total'] > 0){
                echo "Este DNI ya existe en la base de datos.";
            }else{
                
                $sentencia="INSERT INTO empleado (nombre, apellido, dni, cargo) VALUES ('$nombre', '$apellido', '$dni', '$cargo')";
                $consulta= $conexPdo->prepare($sentencia);
                $consulta->execute();
    
                if($consulta){
                    header('location:../../vista/empleados.php');
                }else{
                    echo "Error al conectar...";
                }

            }


        }else{
            echo "Debe llenar todos los campos";
        }
    }


?>