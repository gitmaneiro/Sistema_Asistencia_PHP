<?php

include '../../modelo/conexion.php';

if(isset($_POST['actualizar']) and isset($_POST['id_empleadoa'])){

    if(!empty($_POST['nombrea']) and !empty($_POST['apellidoa']) and !empty($_POST['dni']) and $_POST['cargoa']!=0){
        
        $nombrea= $_POST['nombrea'];
        $apellidoa= $_POST['apellidoa'];
        $dni= $_POST['dni'];
        $cargoa= $_POST['cargoa'];
        $id= $_POST['id_empleadoa'];

        $psentencia= "SELECT count(*) AS total FROM empleado WHERE dni=$dni and id_empleado !=$id";
        $pconsulta= $conexPdo->prepare($psentencia);
        $pconsulta->execute();

        $dato= $pconsulta->fetch();

        if($dato['total'] > 0){
            echo "Este DNI ya existe en la base de datos.";
        }else{
            $sentencia="UPDATE empleado SET nombre='$nombrea', apellido='$apellidoa', dni=$dni, cargo=$cargoa WHERE id_empleado=$id";
            $consulta= $conexPdo->prepare($sentencia);
            $consulta->execute();
        
                if($consulta){
                    header('location:../../vista/empleados.php');
                }else{
                    echo "Error al conectar con la base de datos";
                }
        }        

    }else{
        echo "Debe llenar todos los campos..";
    }

    

}



?>