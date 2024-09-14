<?php

    $sentencia= "SELECT *, (SELECT nombre FROM cargo WHERE cargo.id_cargo=empleado.cargo limit 1) as cargo FROM empleado";
    $consulta= $conexPdo->prepare($sentencia);
    $consulta->execute();

    $datos= $consulta->fetchAll();

?>