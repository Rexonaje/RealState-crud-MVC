<?php 
namespace Controller;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;
use Intervention\Image\ImageManager as Image;
//use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

class PropiedadController{
    public static function index(Router $router){
        $propiedades=Propiedad::all();//controlador guarda los datos en la variable
        $resultado=$_GET['resultado']??null;   

        $router->render("propiedades/admin",[
            'propiedades'=>$propiedades,//se lo pasa a la vista
            'resultado'=>$resultado
        ]);
    }
    public static function crear(Router $router){
        $propiedad= new Propiedad();
        $vendedores= Vendedores::all();
        $errores=Propiedad::getErrores();//Arreglo con mensaje errores

        if($_SERVER['REQUEST_METHOD']==='POST'){
            
            $propiedad= new Propiedad($_POST['propiedad']);

            //subida de archivos
            $nombreImagen=md5(uniqid(rand())) . ".jpg"; //nombre de Imagen
            //debugear($nombreImagen);
            if($_FILES['propiedad']['tmp_name']['imagen']){
                //debugear($_FILES);
                $manager = new Image(Driver::class);
                $Image= $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800,600);//setear la imagen y rezise
                $propiedad->setImage($nombreImagen);
                 
            }
    
            $errores=$propiedad->validar();
            if(empty($errores)){    //si errores esta vacio ejecuta el codigo 
                
                //crear carpeta imagenes
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }
                
                $Image->save(CARPETA_IMAGENES . $nombreImagen);//guarda imagen en el servidor
                 
                //guarda imagen en bd;
                $propiedad->guardar();
            
            }; 
        }

        $router->render("propiedades/crear", [
            'propiedad'=> $propiedad,
            'vendedores'=> $vendedores,
            'errores'=>$errores
        ]);
    }    
    public static function actualizar(){
        echo "actualizar";
    }    
}