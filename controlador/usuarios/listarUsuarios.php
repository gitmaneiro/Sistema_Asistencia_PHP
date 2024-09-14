<?php

    $sentencia="SELECT * FROM usuario";
    $consulta= $conexPdo->prepare($sentencia);
    $consulta->execute();

    $datos=$consulta->fetchAll();


?>