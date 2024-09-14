<?php
   session_start();
   if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
       header('location:login/login.php');
   }
   $id= $_SESSION['id'];
?>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">
   <h4 class="text-center text-secondary">Perfil de Usuario</h4>
   
   <?php
      include'../modelo/conexion.php';
      include'../controlador/perfil/perfilUsuario.php';
   ?>

    <form action="../controlador/perfil/actualizarPerfil.php" method="POST">
        <?php foreach($datos as $dato):?>
            <input type="hidden" name="id_usuario" value="<?php echo $dato['id_usuario']; ?>" />
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
               <input type="text" name="nombre" placeholder="Nombre" class="input input__text" value="<?php echo $dato['nombre']; ?>"/>
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                <input type="text" name="apellido" placeholder="Apellido" class="input input__text" value="<?php echo $dato['apellido']; ?>"/>
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 ">
                <input type="text" name="usuario" placeholder="Usuario" class="input input__text" value="<?php echo $dato['usuario']; ?>"/>
            </div>
            <div class="text-right p-2">
                <button type="submit" name="actualizar" class="btn btn-primary btn-rounded" >Actualizar</button>
            </div>
        <?php endforeach ?>
    </form>

</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>