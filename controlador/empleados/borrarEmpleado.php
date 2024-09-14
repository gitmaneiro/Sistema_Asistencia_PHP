<?php 

include '../../modelo/conexion.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];
    
    $sentencia= "DELETE FROM empleado WHERE id_empleado=$id";
    $consulta= $conexPdo->prepare($sentencia);
    $consulta->execute();

    if($consulta){
        header('location:../../vista/empleados.php');
    }else{
        echo "Error al conectar..."; 
    }
}




?>