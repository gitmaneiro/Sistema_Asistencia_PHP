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
   <h4 class="text-center text-secondary">Registro de Empleado</h4>

   <?php include '../modelo/conexion.php'; ?>
  <?php include '../controlador/empleados/selectCargoEmpleados.php'; ?>

    <div class="row">
        <form action="../controlador/empleados/registrarEmpleado.php" method="POST" >
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                <input type="text" name="nombre" placeholder="Nombre" class="input input__text"/>
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                <input type="text" name="apellido" placeholder="Apellido" class="input input__text"/>
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                <input type="text" name="dni" placeholder="DNI" class="input input__text"/>
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                <select name="cargo" class="input input__select">
                    <option value="0">seleccionar</option>
                    <?php foreach($cargos as $cargo): ?>
                        <option value="<?php echo $cargo['id_cargo']?>"><?php echo $cargo['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="text-right p-2">
                <a href="empleados.php" class="btn btn-secondary btn-rounded">Atras</a>
                <button type="submit" name="guardar" class="btn btn-primary btn-rounded">Guardar</button>
            </div>
        </form>
    </div>   


</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>