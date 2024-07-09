<main class="contenedor seccion">
        <h1>Registrar Vendedor/a</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error;?> 
            </div>
        <?php endforeach; ?>   
            
        <form action="" class="formulario" method="POST" action="/vendedores/crear" >
            <?php include __DIR__. '/formulario.php';?>
            <input type="submit" value="Registrar vendedor" class="boton boton-verde">
        </form>
</main>