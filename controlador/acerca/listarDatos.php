<?php 

$sentencia ="SELECT * FROM empresa";
$consulta= $conexPdo->prepare($sentencia);
$consulta->execute();

$datos= $consulta->fetchAll();



?>