<?php
   session_start();
   if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
       header('location:login/login.php');
   }

?>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">
   <h4 class="text-center text-secondary">Filtado de reportes</h4>
   
   <?php 
        include'../modelo/conexion.php';

        $sentencia= "SELECT * FROM empleado";
        $consulta= $conexPdo->prepare($sentencia);
        $consulta->execute();

        $datos= $consulta->fetchAll();
   
   ?>

   <form action="fpdf/reportePorFecha.php">
        <input required type="date" name="fechainicio" class="input input__text mb-2" />
        <input required type="date" name="fechafinal" class="input input__text mb-2" />
        <select required name="empleado" class="input input__select">
            <option value="todos">Todos los Empleados</option>
            <?php foreach($datos as $dato): ?>
                <option value="<?php echo $dato['id_empleado'] ?>"><?php echo $dato['nombre']." ".$dato['apellido']?></option>
            <?php endforeach?>
        </select>
        <button type="submit" name="generarreporte" class="btn btn-primary mt-3 w-100">generar reporte</button>
   </form>


</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>