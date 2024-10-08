<?php
 define('TEMPLATES_URL',__DIR__ . '/templates');
 define('FUNCIONES_URL',__DIR__ . 'functiones.php');
 define( 'CARPETA_IMAGENES' ,$_SERVER['DOCUMENT_ROOT']. '/imagenes/');

function includirTemplate( string $nombre, bool $inicio=false){
    include  TEMPLATES_URL . "/$nombre.php";
    
} 
function estaAutenticado(){
    session_start();
    
    if(!$_SESSION['login']){
    
      header('location: /bienesraices/index.php');
    }
    
}

function debugear( $variable,$exit=true){
    echo '<pre>';
        var_dump($variable);
    echo '</pre>';
   if($exit){
        exit;     
    } 
}
//escapar el html
function sanitizar($html):string{
    $s=htmlspecialchars($html);
    return $s;
}
function validarTipoContenido($tipo){
    $tipos=['propiedad','vendedor'];

    return in_array($tipo,$tipos);
}
function mostrarNotificaciones($codigo){
    $mensaje="";
    switch($codigo){
        case 1:
            $mensaje="Creado Correctamente";
            break;
        case 2:
            $mensaje="Actualizar Correctamente";
            break;
        case 3:
            $mensaje="Eliminado Correctamente";
            break;    
        default:
            $mensaje=false;
            break;
    }
    return $mensaje;
}
function validarORedireccionar(string $url){
    //validar url id 
    $id=$_GET['id'];
    $id=filter_var($id,FILTER_VALIDATE_INT);//filtro para validar id sea entero
    if(!$id){
    header('location: '. $url);
    }
    return $id;
}