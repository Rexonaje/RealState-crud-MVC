

    <main class="contenedor seccion contenido-centrado">
      <h1><?php echo $propiedad->titulo; ?></h1>
      <picture>
        <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen;?>" alt="anuncio" />
      </picture>
      <div class="resumen-propiedad">
        <p class="precio">$3,000,000</p>
        <ul class="iconos-caracteristicas">
          <li>
            <img  class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="" />
            <p><?php echo $propiedad->wc; ?></p>
          </li>
          <li>
            <img
            class="icono"
              loading="lazy"
              src="build/img/icono_estacionamiento.svg"
              alt=""
            />
            <p><?php echo $propiedad->estacionamiento; ?></p>
          </li>
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="" />
            <p><?php echo $propiedad->habitaciones; ?></p>
          </li>
        </ul>

        <p>
        <?php echo $propiedad->descripcion; ?>
        </p>
      </div>
    </main>
    
