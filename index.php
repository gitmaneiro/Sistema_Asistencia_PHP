<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asistencia Demo</title>
    
    <link href="public/app/publico/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="public/app/publico/css/main.css" rel="stylesheet">
    <link href="public/app/publico/css/mis_estilos/estilos.css" rel="stylesheet">

    <link href="public/estilos/estilos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">


  </head>
  <body>

    <?php 
      include "modelo/conexion.php";
      include "controlador/registrarEntrada.php";
    ?>
    <?php 
      date_default_timezone_set("America/Caracas"); 
    ?>
    <h1>REGISTRA TU ASISTENCIA</h1>
    <h2 id="fecha"><?= date("d/m/Y, h:i:s"); ?></h2>
    <div class="container">
        <a class="btnlogin" href="vista/login/login.php">Login</a>
        <p>Ingrese su DNI</p>
        <form method="POST">
            <input type="number" placeholder="DNI Empleado" name="txtdni" id="txtdni"/>
            <div class="botones">
                <button type="submit" name="salida" id="salida" class="salida">Salida</button>
                <button type="submit" name="entrada" id="entrada" class="entrada">Entrada</button>
            </div>
        </form>
    </div>

    <script>
      setInterval(() => {
        let fecha= new Date();
        let fechaHora= fecha.toLocaleString();
 
        document.getElementById("fecha").textContent= fechaHora;
      }, 1000);
    </script>


    <script src="../public/bootstrap5/js/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous">
    </script>


    <script src="public/app/publico/js/lib/jquery/jquery.min.js">
    </script>
    <script src="public/app/publico/js/lib/tether/tether.min.js">
    </script>
    <script src="public/app/publico/js/lib/bootstrap/bootstrap.min.js">
    </script>
    <script src="public/app/publico/js/plugins.js">
    </script>
    <script>
      let dni= document.getElementById('txtdni');
        dni.addEventListener("input", function(){
           if(this.value.length > 8){
              this.value= this.value.slice(0,8);
           }
        });


        document.addEventListener("keyup", function(e){

            if(e.code=="ArrowRight"){
                    
              document.getElementById('entrada').click();
                      
            }


            if(e.code=="ArrowLeft"){
              
              document.getElementById('salida').click();
              
            }
            
        });
    </script>
  </body>
</html>
