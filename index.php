<?php 
require_once "pages/header.html";
?>

<section class="contenido">
    <article class="post">
    <div class="container">
        <div class="row p-6">
            <div class="col-auto">
                <div class="card">
                    <div class="card-body">
                        <!-- empesar a trabajar -->
                        <div class="alert alert-info"><p>Este es un blog creado para dilbulgar informacino sobre tegnologia ,no desesperes pronto actualizaremos para que tu tambien puedas publicar tus aportes </p>
                        </div>
                        <!-- insertar video -->
                    <div class="embed-responsive embed-responsive-16by9">  
                    <iframe class="embed-responsive-item" src="videos/1.mp4" allowfullscreen></iframe>
                    </div>
                    <p>BY <a href="https://www.youtube.com/watch?v=S5iKxqz1Pug">Nate Gentile</a></p>
                <h6>En este vídeo haremos Overclocking extremo con nitrógeno líquido al nuevo Intel i9 10900K, en el que llegaremos a altas frecuencias con temperaturas muy por debajo de 0 grados.<br>Hacer overclocking en su procesador Intel® Core™ desbloqueado, RAM y tarjeta madre es una manera de personalizar su computadora. Puedes ajustar la alimentación, el voltaje, los núcleos, los parámetros de memoria y otros valores clave del sistema para obtener un mayor desempeño. Te ayuda a acelerar tus componentes y tu experiencia de juego. También puede ayudar con tareas de uso intensivo del procesador como transcodificación y renderización de imágenes.</h6>
                <div class="alert alert-dark" role="alert"><p><center>Comentarios de lo publicado esta ocacion</center></p></div>
                <p>
                    <!-- conexion base de datos y consulta selec para mostrar datos -->
						<?php
							$user_vjv = "root";
                            $passwor_vjv = "123456";
                            $database_vjv = "blog";
                            $host_vjv = "localhost";
                        
                            $conexion_vjv = mysqli_connect("$host_vjv", "$user_vjv", "$passwor_vjv", "$database_vjv") or
                                die("Problemas con la conexión");
							$registros_vjv = mysqli_query($conexion_vjv, "select * from comentarios") or 
								die("Problemas en el select" . mysqli_error($conexion_vjv));
							
							while($reg = mysqli_fetch_array($registros_vjv)) 
							{
                                $autor_vjv = $reg['autor'];
                                $titulo_vjv = $reg['titulo'];
                                $contenido_vjv = $reg['contenido'];
                                
                                ?>
                                <!-- formulario con caracteristicas para mostrar la informacion obtenida y poder editar -->
                                <form >
                                    <p>
                                    <h5>Autor
                                    <input type="text" name="autor" class="form-control" placeholder="nombre del Autor de comentario" required value=<?php echo '"' . $autor_vjv . '"'; ?> readonly>
                                    </p>
                                    <p>
                                    Titulo
                                    <textarea class="form-control" name="titulo" rows="3" placeholder="¿Cual es el titulo?" required readonly><?php echo $titulo_vjv ; ?></textarea>
                                    </h5>
                                    </p>
                                    <p>
                                    Contenido
                                    <textarea class="form-control" name="contenido" rows="3" placeholder="¿Cual es el contenido del comentario?" required readonly><?php echo $contenido_vjv ; ?></textarea>
                                    </h5>
                                    </p>
                                </form>
                                <hr>
                                <?php
                                
							}
                            mysqli_close($conexion_vjv);
						?>
                    </p>    
                    <nav class="navbar navbar-expand-lg ">
                    <a href="insertar.php"><button type="submit" class="btn btn-outline-primary">Agregar comentario</button></a>&nbsp &nbsp
                    <a href="borrar.php"><button type="submit" class="btn btn-outline-danger">Borrar comentario</button></a>&nbsp &nbsp
                    <a href="editar.php"><button type="submit" class="btn btn-outline-warning">Editar comentario</button></a>&nbsp &nbsp
                    </nav>
            </div>
                </div>
            </div>
    </article>
</section> 
<?php
require_once "pages/aside.html";
require_once "pages/footer.html";
?>
