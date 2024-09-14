<?php


$sentencia="SELECT * FROM cargo";
$consulta= $conexPdo->prepare($sentencia);
$consulta->execute();

$cargos= $consulta->fetchAll();

?>