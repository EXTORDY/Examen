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
                <!-- empezar a trabajar -->
                <form action="editar.php" method="post">
			Ingresar el Nombre del Autor del comentario para editar
			<input type="text" name="busqueda">
			<input type="submit" name="buscar" value="Buscar" class="btn btn-info">
		</form>
		</p>
		<p>
			<!-- condicion por si se aprieta el boton buscar -->
		<?php
			//var_dump($_REQUEST);
			//conexion a base de datos y query para poder buscar con la considencia
		if($_REQUEST[buscar])
			{?>
                <?php
                $user_vjv = "root";
                $passwor_vjv = "123456";
                $database_vjv = "blog";
				$host_vjv = "localhost";
				
                $conexion_vjv = mysqli_connect("$host_vjv", "$user_vjv", "$passwor_vjv", "$database_vjv") or
                    die("Problemas con la conexión");
				$registros_vjv = mysqli_query($conexion_vjv, "select * from comentarios where autor='$_REQUEST[busqueda]'") or 
					die("Problemas en el select" . mysqli_error($conexion_vjv));
				
				if($reg = mysqli_fetch_array($registros_vjv))
				{
					//guardae datos buscados
                    $id_vjv = $reg['id'];
					$autor_vjv = $reg['autor'];
					$titulo_vjv = $reg['titulo'];
					$contenido_vjv = $reg['contenido'];
					?>
					<div class="alert alert-success">
					Se encontro considencia
					</div>
					<?php
					?>
					<p><form action="editar.php" method="post">
					<p>
						<!-- mostrar formulario con datos para editar -->
					<input type="hidden" name="id" value=<?php echo '"' . $id_vjv . '"'; ?>>
                                    <h5>Autor
                                    <input type="text" name="nuevoautor" class="form-control"  required value=<?php echo '"' . $autor_vjv . '"'; ?> >
                                    </p>
                                    <p>
                                    Titulo
                                    <textarea class="form-control" name="nuevotitulo" rows="3" required ><?php echo $titulo_vjv ; ?></textarea>
                                    </h5>
                                    </p>
                                    <p>
                                    Contenido
                                    <textarea class="form-control" name="nuevocontenido" rows="3" required ><?php echo $contenido_vjv ; ?></textarea>
                                    </h5>
                                    </p>
                            <p>
                            <input type="submit" name="actualizar" value="Actualizar" class="btn btn-warning">&nbsp,&nbsp
							<input type="button" value="Cancelar" onclick="location.href='./index.php'" class="btn btn-outline-danger">		
                            </p>
						</form></p>
						<?php
				}
				else 
				{
					?>
					<div class="alert alert-danger">
					No se encontro considencia
					</div>
					<?php
				}
				
				mysqli_close($conexion_vjv);
			
				//
				//header ("Location: index.php");
				//echo 'existe';
		}
        ?>
		
		<?php
			//var_dump($_REQUEST);
			//condicion para actualizar con el query undate para actualizar los registros
		if($_REQUEST[actualizar]){
			
				
                $user_vjv = "root";
                $passwor_vjv = "123456";
                $database_vjv = "blog";
                $host_vjv = "localhost";
            
                $conexion_vjv = mysqli_connect("$host_vjv", "$user_vjv", "$passwor_vjv", "$database_vjv") or
					die("Problemas con la conexión");
					
				$registros_vjv = mysqli_query($conexion_vjv, "update comentarios set autor='$_REQUEST[nuevoautor]', titulo='$_REQUEST[nuevotitulo]', contenido='$_REQUEST[nuevocontenido]'where id=$_REQUEST[id]") or 
					die("Problemas en el update" . mysqli_error($conexion_vjv));
				
				if($registros_vjv)
				{
					echo "El registro fue actualizado con éxito.";
					header ("Location: index.php");
				}
				else 
				{
					echo "No se pudo actualizar el registro.";
				}
				
				mysqli_close($conexion_vjv);
			
				//
				//header ("Location: index.php");
				//echo 'existe';
            }
            ?>
                </div>
            </div>
    </article>
</section> 
<?php
require_once "pages/aside.html";
require_once "pages/footer.html";
?>