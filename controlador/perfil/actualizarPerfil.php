<?php 

    include '../../modelo/conexion.php';

    if(isset($_POST['actualizar'])){
        if(!empty($_POST['nombre']) and !empty($_POST['apellido']) and !empty($_POST['usuario'])){
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $usuario=$_POST['usuario'];
            $id=$_POST['id_usuario'];

            $psentencia= "SELECT count(*) AS total FROM usuario WHERE usuario='$usuario' and id_usuario !=$id";
            $pconsulta= $conexPdo->prepare($psentencia);
            $pconsulta->execute();
    
            $dato= $pconsulta->fetch();

            if($dato['total'] > 0){
                echo "Este usuario ya existe";
            }else{
                $sentencia="UPDATE usuario SET nombre='$nombre', apellido='$apellido', usuario='$usuario'  WHERE id_usuario=$id";
                $consulta= $conexPdo->prepare($sentencia);
                $consulta->execute();
    
                    if($consulta){
                        header('location:../../vista/perfil.php');
                    }
            }

        }else{
            echo "Todos los campos son requeridos";
        }
    }


?>