<?php 

include '../../modelo/conexion.php';

if(isset($_POST['actualizar'])){
    if(!empty($_POST['claveactual']) and !empty($_POST['clavenueva'])){

        $id= $_POST['id_usuario'];
        $claveactual= md5($_POST['claveactual']);
        $clavenueva = md5($_POST['clavenueva']);

       $psentencia = "SELECT password FROM usuario WHERE id_usuario=$id";
       $pconsulta= $conexPdo->prepare($psentencia);
       $pconsulta->execute();
       
       $clave= $pconsulta->fetch();

        if($clave['password']==$claveactual){

            $sentencia="UPDATE usuario SET password='$clavenueva' WHERE id_usuario=$id";
            $consulta=$conexPdo->prepare($sentencia);
            $consulta->execute();

            if($consulta){
                header('location:../../vista/usuario.php');
            }else{
                echo "error al conectar...";
            }

        }else{
            echo "Clave actual incorrecta.";
        }

    }else{
        echo "Los campos estan vacios.";
    }
}

?>