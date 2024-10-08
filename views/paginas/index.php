<main class="contenedor seccion">
        <h1>Mas sobre nosotros</h1>

        <?php include 'iconos.php';?>
    </main>
        <section class="seccion contenedor">
            <h2>Casas y depas en venta</h2>

            <?php
                    $limite=3;
                    include 'listado.php';
            ?>
            <div class="ver-todas alinear-derecha">
                <a href="/propiedades" class="boton-verde">Ver todas</a>
            </div><!--ver-todas-->
        </section>
        
        <section class="imagen-contacto">
            <h2>Encuentra la casa de tus sueños</h2>
            <p>llena el formulario y un asesor se pondra en contacto a la brevedad</p>
            <a href="/contacto" class="boton-amarillo">Contactanos</a>
        </section><!--imagen-contacto-->
    
        <div class="contenedor section seccion-inferior">
            <section class="blog">
                <h3>Nuestro Blog</h3>

                <article class="entrada-blog">
                    <div class="imagen">
                        <picture>
                            <source srcset="build/img/blog1.webp" type="img/webp" >
                            <source srcset="build/img/blog1.jpg" type="img/jpeg" >
                            <img loading="lazy" src="build/img/blog1.jpg" alt="entrada blog">
                        </picture>
                    </div>
                    <div class="texto-entrada"> 
                        <a href="/entrada">
                            <h4>Terraza en el techo de tu casa</h4>
                            <p class="informacion-meta">Escrito en <span>20/10/2021</span> por: <span>Admin</span></p>

                            <p>
                                Consejos para construir tu casa con los mejores materiales y ahorrando dinero.
                            </p>
                        </a>
                    </div>
                </article><!--entrada-blog-->
                <article class="entrada-blog">
                    <div class="imagen">
                        <picture>
                            <source srcset="build/img/blog2.webp" type="img/webp" >
                            <source srcset="build/img/blog2.jpg" type="img/jpeg" >
                            <img loading="lazy" src="build/img/blog1.jpg" alt="entrada blog">
                        </picture>
                    </div>
                    <div class="texto-entrada"> 
                        <a href="/entrada">
                            <h4>Guia para la decoracion de tu hogar</h4>
                            <p class="informacion-meta">Escrito en <span>20/10/2021</span> por: <span>Admin</span></p>

                            <p>
                                Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio.
                            </p>
                        </a>
                    </div>
                </article><!--entrada-blog-->
            </section>

            <seccion class="testimoniales">
               <h3> Testimoniales</h3>
               <div class="testimonial">
                 <blockquote>
                    El personale se comportó de una exelente forma, muy buena atencion y la casa que me ofrecieron cumple con todas mis expectativas.
                 </blockquote>
                 <p>Carlos Nicolas Brambilla</p>
               </div>
            </seccion>
        </div>
