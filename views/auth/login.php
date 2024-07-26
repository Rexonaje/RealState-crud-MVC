
<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesion</h1>
    <div class="alerta exito">
        <?php //agregado solo a modo de prueba
         echo " entrar con correo@correo.com 123456";?> 
    </div>
    <form method="POST" class="formulario" action="/login">
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?> 
            </div>
        <?php endforeach;?> 
    <fieldset>
                <legend>Email y Password</legend>

                <label for="email">email</label>
                <input type="email" name="email" placeholder="Tu email" id="email">
                
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu Password" id="password">
                
           </fieldset>
           <input type="submit" value="iniciar sesion" class="boton boton-verde">
    </form>
</main>
