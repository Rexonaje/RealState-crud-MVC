
 
    <main class="contenedor seccion">
        <h1>Contacto</h1>
        <?php
        if($mensaje){
            echo '<p class="alerta exito">'. $mensaje.'</p>' ;

        }
        ?>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp" />
            <source srcset="build/img/destacada3.jpg" type="image/jpeg" />
            <img loading="lazy" src="build/img/destacada3.jpg" alt="anuncio" />
        </picture>

        <form class="formulario" method="POST">
           <fieldset>
                <legend>Informacion personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" require>

                
                <label for="Mensaje">Mensaje</label>
                <textarea id="Mensaje" name="contacto[mensaje]" require></textarea>
           </fieldset>
           <fieldset>
            <legend>Informacion de compra</legend>

            <label for="Opciones">Vende o compra:</label>
            <select   id="Opciones" name="contacto[tipo]" require>
                <option value="" disabled selected>--Seleccione</option>
                <option value="Compra">Compra</option>
                <option value="Venta">Venta</option>
            </select>

            <label for="Presupuesto">Precio o Presupuesto</label>
            <input type="number" placeholder="Tu Precio o Presupuesto" id="Presupuesto" name="contacto[precio]" require>
                
           </fieldset>

           <fieldset>
            <legend>Informacion de compra</legend>

            <P>Como desea ser contactado:</P>

            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input type="radio" value="telefono"  id="contactar-telefono" name="contacto[contacto]"  >
                <label for="contactar-Email">Email</label>
                <input type="radio" value="email"  id="contactar-Email" name="contacto[contacto]">
            </div>
            <div id="contacto"></div>
            
           </fieldset>
           <input type="submit" class="boton-verde">
        </form>
    </main>
     