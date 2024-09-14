<?php 

$sentencia= "SELECT * FROM usuario WHERE id_usuario=$id";
$consulta= $conexPdo->prepare($sentencia);
$consulta->execute();

$datos= $consulta->fetchAll();


?>