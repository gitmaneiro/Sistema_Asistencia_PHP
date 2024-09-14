<?php

    $servidor="localhost";
    $baseDeDatos="asistencia_php";
    $usuario="root";
    $passWord="";


    try {
        
        $conexPdo= new PDO("mysql:host=$servidor;dbname=$baseDeDatos", $usuario, $passWord);
        date_default_timezone_set("America/Caracas"); 
        

    } catch (PDOException $e) {
        
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }


    //if($conexPdo){
     //   echo "esta conectado a la baSE DEE DATOS";
   // }

?>