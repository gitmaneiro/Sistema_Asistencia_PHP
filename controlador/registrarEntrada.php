<?php 

    if(isset($_POST['entrada'])){
       
        if(!empty($_POST['txtdni'])){
            $dni= $_POST['txtdni'];

            $psentencia= "SELECT count(*) as 'total' FROM empleado WHERE dni='$dni'";
            $pconsulta= $conexPdo->prepare($psentencia);
            $pconsulta->execute();
            $dato= $pconsulta->fetch();

            $idsentencia= "SELECT id_empleado FROM empleado WHERE dni='$dni'";
            $idconsulta= $conexPdo->prepare($idsentencia);
            $idconsulta->execute();
            $idd= $idconsulta->fetch();

           
            if($dato['total'] > 0){

                $fecha= date("Y-m-d h:i:s");
                $id= $idd['id_empleado'];

                $bdsentencia="SELECT entrada FROM asistencia WHERE id_empleado='$id' ORDER BY id_asistencia desc limit 1";
                $bdconsulta= $conexPdo->prepare($bdsentencia);
                $bdconsulta->execute();

                $fechabd= $bdconsulta->fetch();

                $ulFechaEntrada= $fechabd['entrada'];

                if(substr($ulFechaEntrada,0,10)==substr($fecha,0,10)){
                
                    echo "Ya esta registrada la entrada...";
                }else{
                    $sentencia= "INSERT INTO asistencia (id_empleado, entrada) VALUES ($id, '$fecha')";
                    $consulta= $conexPdo->prepare($sentencia);
                    $consulta->execute();
                    
                    header('location:index.php');
                }


            }else{
                echo '<div class="alert alert-danger text-center">debe ingresar un DNI existente</div>';
            }

        }else{
            echo '<div class="alert alert-danger text-center">Los campos estan vacios</div>';
        }
    }

?>

<?php 

    if(isset($_POST['salida'])){
       
        if(!empty($_POST['txtdni'])){
            $dni= $_POST['txtdni'];

            $psentencia= "SELECT count(*) as 'total' FROM empleado WHERE dni='$dni'";
            $pconsulta= $conexPdo->prepare($psentencia);
            $pconsulta->execute();
            $dato= $pconsulta->fetch();

            $idsentencia= "SELECT id_empleado FROM empleado WHERE dni='$dni'";
            $idconsulta= $conexPdo->prepare($idsentencia);
            $idconsulta->execute();
            $idd= $idconsulta->fetch();

           
            if($dato['total'] > 0){

                $fecha= date("Y-m-d h:i:s");
                $id= $idd['id_empleado'];

                $ultimaentrada= "SELECT id_asistencia, entrada FROM asistencia WHERE id_empleado=$id ORDER BY id_asistencia desc limit 1";
                $ultimaentradaconsul= $conexPdo->prepare($ultimaentrada);
                $ultimaentradaconsul->execute();

                $asistencia= $ultimaentradaconsul->fetch();
                $id_asistencia= $asistencia['id_asistencia'];
                $entrada= $asistencia['entrada'];


                if(substr($fecha,0,10)!=substr($entrada,0,10)){
                    echo "Primero debes registrar la entrada";
                }else{

                    $bdsentenciasalida="SELECT salida FROM asistencia WHERE id_empleado='$id' ORDER BY id_asistencia desc limit 1";
                    $bdconsultasalida= $conexPdo->prepare($bdsentenciasalida);
                    $bdconsultasalida->execute();
    
                    $fechabdsalida= $bdconsultasalida->fetch();
    
                    $ulFechaSalida= $fechabdsalida['salida'];
    
    
                    if(substr($ulFechaSalida,0,10)==substr($fecha,0,10)){
                        echo "Ya esta registrada la salida...";
                    }else{
    
                        $sentencia= "UPDATE asistencia SET salida='$fecha' WHERE id_asistencia=$id_asistencia";
                        $consulta= $conexPdo->prepare($sentencia);
                        $consulta->execute();
                        
                        header('location:index.php');
                    }
                }



            }else{
                echo '<div class="alert alert-danger text-center">debe ingresar un DNI existente</div>';
            }

        }else{
            echo '<div class="alert alert-danger text-center">Los campos estan vacios</div>';
        }
    }

?>