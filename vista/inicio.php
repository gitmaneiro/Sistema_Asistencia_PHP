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
   <h4 class="text-center text-secondary">Registro de asistencia</h4>
   
   <?php
      include'../modelo/conexion.php';
      include'../controlador/asistencia/listarAsistencia.php';
   ?>
   <div class="text-right mb-2">
      <a href="fpdf/pruebaH.php" target="_blank" class="btn btn-primary"><i class="far fa-file-pdf"></i> Renerar reporte</a>
   </div>
   <div class="text-right mb-2">
      <a href="reportesAsistencias.php" class="btn btn-success"><i class="fas fa-plus"></i> Mas reportes</a>
   </div>

   <table class="table table-bordered table-hover table-striped" id="example">
      <thead>
         <tr>
            <th scope="col">ID</th>
            <th scope="col">Empleado</th>
            <th scope="col">Cargo</th>
            <th scope="col">DNI</th>
            <th scope="col">Entrada</th>
            <th scope="col">Salida</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach($datos as $dato):?>
            <tr>
               <td><?php echo $dato['id_asistencia'] ?></td>
               <td><?php echo $dato['n_empleado']." ".$dato['apellido'] ?></td>
               <td><?php echo $dato['n_cargo'] ?></td>
               <td><?php echo $dato['dni'] ?></td>
               <td><?php echo $dato['entrada'] ?></td>
               <td><?php echo $dato['salida'] ?></td>
               <td>
                  <a href="../controlador/asistencia/borrarAsistencia.php?id=<?php echo $dato['id_asistencia'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
               </td>
            </tr>
         <?php endforeach ?>
      </tbody>
   </table>

</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>