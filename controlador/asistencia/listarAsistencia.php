<?php

$sentencia= "SELECT a.id_asistencia, 
                    a.id_empleado, 
                    a.entrada, 
                    a.salida, 
                    e.id_empleado, 
                    e.nombre as n_empleado, 
                    e.apellido, 
                    e.dni, 
                    e.cargo, 
                    c.id_cargo, 
                    c.nombre as n_cargo 
                    FROM asistencia AS a
                    INNER JOIN empleado AS e ON a.id_empleado=e.id_empleado
                    INNER JOIN cargo AS c ON e.cargo= c.id_cargo";

$consulta= $conexPdo->prepare($sentencia);
$consulta->execute();

$datos= $consulta->fetchAll();

//var_dump($datos);


?>