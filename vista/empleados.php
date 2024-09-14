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
   <h4 class="text-center text-secondary">Lista de Empleados</h4>
   
   <?php
      include'../modelo/conexion.php';
      include'../controlador/empleados/listarEmpleados.php';
      include'../controlador/empleados/selectCargoEmpleados.php';
   ?>

   <a href="registrarEmpleado.php" class="btn btn-primary btn-rounded"><i class="fas fa-plus"></i> Registrar</a>
   <div class="text-right mb-2">
      <a href="fpdf/reporteEmpleados.php" target="_blank" class="btn btn-success"><i class="far fa-file-pdf"></i> Renerar reporte</a>
   </div>
   <table class="table table-bordered table-hover table-striped" id="example">
      <thead>
         <tr>
            <th scope="col">ID</th>
            <th scope="col">nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">DNI</th>
            <th scope="col">Cargo</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach($datos as $dato):?>
            <tr>
               <td><?php echo $dato['id_empleado'] ?></td>
               <td><?php echo $dato['nombre'] ?></td>
               <td><?php echo $dato['apellido'] ?></td>
               <td><?php echo $dato['dni'] ?></td>
               <td><?php echo $dato['cargo'] ?></td>
               <td>
                  <a href="#" data-toggle="modal" data-target="#exampleModalCenter<?php echo $dato['id_empleado'] ?>" class="btn btn-warning mr-5"><i class="far fa-edit"></i></a>
                  <a href="../controlador/empleados/borrarEmpleado.php?id=<?php echo $dato['id_empleado'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
               </td>
            </tr>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter<?php echo $dato['id_empleado'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100" id="exampleModalLongTitle">Editar Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="../controlador/empleados/editarEmpleado.php" method="POST">
            <input type="hidden" name="id_empleadoa" value="<?php echo $dato['id_empleado']; ?>" />
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
               <input type="text" name="nombrea" class="input input__text" value="<?php echo $dato['nombre']; ?>" placeholder="Nombre"/>
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                <input type="text" name="apellidoa" class="input input__text" value="<?php echo $dato['apellido']; ?>" placeholder="Apellido"/>
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                <input type="text" name="dni" class="input input__text" value="<?php echo $dato['dni']; ?>" placeholder="DNI"/>
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
               <select name="cargoa" class="input input__select">
                     <option value="0">seleccionar</option>
                    <?php foreach($cargos as $cargo): ?>
                        <option <?php if($dato['cargo']==$cargo['nombre']){echo 'selected';} ?> value="<?php echo $cargo['id_cargo']?>"><?php echo $cargo['nombre'] ?></option>
                    <?php endforeach ?>
               </select>
            </div>
            <div class="text-right p-2">
               <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Cerrar</button>
               <button type="submit" name="actualizar" class="btn btn-primary btn-rounded" >Actualizar</button>
            </div>
       </form>
      </div>
    </div>
  </div>
</div>
         <?php endforeach ?>
      </tbody>
   </table>

</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>