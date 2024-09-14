<?php 

    include '../../modelo/conexion.php';

    if(isset($_POST['actualizar']) and isset($_POST['id_usuarioa'])){

        $nombrea= $_POST['nombrea'];
        $apellidoa= $_POST['apellidoa'];
        $usuarioa= $_POST['usuarioa'];
        $id= $_POST['id_usuarioa'];

        $psentencia= "SELECT count(*) AS total FROM usuario WHERE usuario='$usuarioa' and id_usuario !='$id'";
        $pconsulta= $conexPdo->prepare($psentencia);
        $pconsulta->execute();

        $dato= $pconsulta->fetch();

        if($dato['total'] > 0){
            echo "Este Usuario ya existe";
        }else{

            $sentencia="UPDATE usuario SET nombre='$nombrea', apellido='$apellidoa', usuario='$usuarioa'  WHERE id_usuario='$id'";
            $consulta= $conexPdo->prepare($sentencia);
            $consulta->execute();

                if($consulta){
                    header('location:../../vista/usuario.php');
                }
            
        }
       
    }

?>