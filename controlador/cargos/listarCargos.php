<?php 

    $sentencia= "SELECT * FROM cargo";
    $consulta= $conexPdo->prepare($sentencia);
    $consulta->execute();

    $datos= $consulta->fetchAll();


?>