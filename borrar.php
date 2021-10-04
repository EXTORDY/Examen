<!--  llamar el header-->
<?php 
require_once "pages/header.html";
?>
<!-- creacion de la seccion -->
<section class="contenido">
    <article class="post">
        <h5><mark><script>
            document.write('Hoy '+retornarFecha());
            document.write('<br><br>');
            document.write('A las '+retornarHora());
        </script></mark></h5>
        <!-- crear el contenedor fluido -->
    <div class="container">
        <div class="row p-6">
            <div class="col-auto">
                <div class="card">
                    <div class="card-body">
                <!-- empezar a trabajar -->
                <!-- creacion de formulario -->
                <form action="borrar.php" method="post">
                            <p>
                            <h5><label for="bday">nombre del Autor del comentario a eliminar
                            <input type="text" name="borrar" class="form-control" placeholder="¿A quien eliminamos?" required>
                            </label></h5>
                            </p>
                            <p>
                            
                            <button class="btn btn-danger">Borrar</button>
                            </p>
                </form>
                <!-- conexion base de datos y la consulta para eliminar -->
                <?php
                if($_REQUEST[borrar]){
                                $user_vjv = "root";
                                $passwor_vjv = "123456";
                                $database_vjv = "blog";
                                $host_vjv = "localhost";
                            
                                $conexion_vjv = mysqli_connect("$host_vjv", "$user_vjv", "$passwor_vjv", "$database_vjv") or
                                    die("Problemas con la conexión");
				$registros_vjv = mysqli_query($conexion_vjv, "delete from comentarios where autor='$_REQUEST[borrar]'") or 
					die("Problemas en el select" . mysqli_error($conexion_vjv));
				
				if($registros_vjv)
				{
					echo "El registro fue borrado con éxito.";
					header ("Location: index.php");
				}
				else 
				{
					echo "No se pudo borrar el registro.";
				}
				
				mysqli_close($conexion_vjv);
                }
                ?>
                </div>
            </div>
    </article>
</section> 
<!-- llamar el aside y footer -->
<?php
require_once "pages/aside.html";
require_once "pages/footer.html";
?>