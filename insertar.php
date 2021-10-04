<?php 
require_once "pages/header.html";
?>
<section class="contenido">
    <article class="post">
    <h5><mark><script>
        document.write('Hoy '+retornarFecha());
        document.write('<br><br>');
        document.write('A las '+retornarHora());
    </script></mark></h5>
    <div class="container">
        <div class="row p-6">
            <div class="col-auto">
                <div class="card">
                    <div class="card-body">
                        <!-- FORM TO ADD TASKS -->
                        <form action="insertar.php" method="post">
                            <p>
                            <h5>Autor
                            <input type="text" name="autor" class="form-control" placeholder="nombre del Autor de comentario" required>
                            </p>
                            <p>
                            Titulo
                            <textarea class="form-control" name="titulo" rows="3" placeholder="¿Cual es el titulo?" required></textarea>
                            </h5>
                            </p>
                            <p>
                            Contenido
                            <textarea class="form-control" name="contenido" rows="3" placeholder="¿Cual es el contenido del comentario?" required></textarea>
                            </h5>
                            </p>
                            <p>
                            <button class="btn btn-success" >Agregar</button>
                            </p>
                        </form>
                        <?php
                        
                            if($_REQUEST)
                            {
                                
                                $user_vjv = "root";
                                $passwor_vjv = "123456";
                                $database_vjv = "blog";
                                $host_vjv = "localhost";
                            
                                $conexion_vjv = mysqli_connect("$host_vjv", "$user_vjv", "$passwor_vjv", "$database_vjv") or
                                    die("Problemas con la conexión");
                                
                                mysqli_query($conexion_vjv, "insert into comentarios (autor,titulo,contenido) values ('$_REQUEST[autor]','$_REQUEST[titulo]','$_REQUEST[contenido]')") or 
                                    die("Problemas en el select" . mysqli_error($conexion_vjv));
                                
                                mysqli_close($conexion_vjv);
                                header ("Location: index.php" );
                            }
                            else 
                            {
                                //echo 'no existe';
                            }
                            //var_dump($_REQUEST);	
                        ?>	
                </div>
            </div>
    </article>
</section> 
<?php
require_once "pages/aside.html";
require_once "pages/footer.html";
?>