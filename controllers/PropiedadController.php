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
    public static function actualizar(Router $router){
        //consultar bd para obtener id 
        $id=validarORedireccionar('/admin');
        $propiedad=Propiedad::find($id);//encontrar propiedad con id proporcinado
        
        $errores=Propiedad::getErrores();
        $vendedores= Vendedores::all();

            //Method post para actualizar
        if($_SERVER["REQUEST_METHOD"]==="POST"){
        
                //asgnar atributos   
            $args=$_POST['propiedad'];
            $propiedad->sincronizar($args);
                //validar
            $errores=$propiedad->validar();
                //nombre de Imagen
            $nombreImagen=md5(uniqid(rand())) . ".jpg";
                //subir files
            if($_FILES['propiedad']['tmp_name']['imagen']){
                //setear la imagen y rezise
                $manager = new Image(Driver::class);
                $Image=$manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800,600);
                $propiedad->setImage($nombreImagen);
            }
            //si errores esta vacio ejecuta el codigo 
            if(empty($errores)){
                if($_FILES['propiedad']['tmp_name']['imagen']){
                    $Image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $propiedad->guardar();
            };
            
        }
        $router->render('/propiedades/actualizar',[//mostrar pagina de actualizar
            'propiedad'=>$propiedad,
            'errores'=>$errores,
            'vendedores'=>$vendedores
        ]);
    }    
    public static function eliminar(){
             //Method post para eliminar
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            //validar id
            $_id= $_POST['id'];
            $_id=filter_var($_id, FILTER_VALIDATE_INT);
            if($_id){
                $tipo=$_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $propiedad=Propiedad::find($_id);
                    $propiedad->eliminar();
                }
            }
        }
    }
}
