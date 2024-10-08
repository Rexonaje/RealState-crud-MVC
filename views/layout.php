 
<?php 
if(!isset($_SESSION)){
    session_start();
}
    
    $auth=$_SESSION['login']??false;
   // var_dump($auth);
   if(!isset($inicio)){
    $inicio=false;
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes raices</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
   
<header class="header <?php echo $inicio ? 'inicio':''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/"><img src="../build/img/logo.svg" alt="Logotipo"></a>
                <div class="mobile-menu">
                    <img src="../build/img/barras.svg" alt="icono-menu-responsive">
                </div>
                <div class="derecha">
                    <img class="dark-mode-btn" src="../build/img/dark-mode.svg" alt="dark-mode-btn ">
                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if($auth):?>
                                <a href="/logout">Cerrar Sesion</a>
                                <a style="color: #E08709;" href="/admin">Admin</a>
                                
                        <?php endif; ?>
                        <?php
                        if(!$auth):?>
                                <a href="/login">Iniciar Sesion</a>
                        <?php endif; ?>
                        
                    </nav>
                </div>
                
            </div>
            <?php if($inicio){ ?>
                <h1  >Venta de Casas y Departamentos de lujo</h1>
            <?php }?>
        </div>
    </header>

    <?php echo $contenido; ?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>
        <p class="copyright">Todos los derechos reservados <?php $fecha=date('Y'); echo $fecha; ?> &copy;</p>
    </footer>
    <script src="../build/js/bundle.min.js"></script>
</body>
</html>