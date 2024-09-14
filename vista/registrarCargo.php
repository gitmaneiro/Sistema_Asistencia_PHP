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
   <h4 class="text-center text-secondary">Registro de Cargos</h4>
  
    <div class="row">
        <form action="../controlador/cargos/registrarCargo.php" method="POST" >
            <div class="fl-flex-label mb-4 px-2 col-12">
                <input type="text" name="nombre" placeholder="Nombre cargo" class="input input__text"/>
            </div>
            <div class="text-right p-2">
                <a href="cargo.php" class="btn btn-secondary btn-rounded">Atras</a>
                <button type="submit" name="guardar" class="btn btn-primary btn-rounded">Guardar</button>
            </div>
        </form>
    </div>   


</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>