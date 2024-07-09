<?php 
namespace Controller;
use MVC\Router;
use Model\Vendedores;
//use Model\Propiedad;
//use Intervention\Image\ImageManager as Image;
//use Intervention\Image\Drivers\Gd\Driver;

class VendedoresController{
   public static function crear(Router $router){
    $vendedores= new Vendedores();
    $errores=Vendedores::getErrores();
    
    //Ejecuta el codigo despues que el usuario envie el formulario 
    if($_SERVER["REQUEST_METHOD"]==="POST"){
 
        //crea objeto vendedor una vez enviado el formulario, se le pasa el array dentro del post para llenar los parametros con datos
        $vendedores=new Vendedores($_POST['vendedor']); 
        //debugear($vendedor);
        //validacion retorna array de errores
        $errores=$vendedores->validar();
        //si no hay errores metodo guardar 
        if(empty($errores)){
            $vendedores->guardar();
        }
    }
        $router->render("vendedores/crear",[
            'vendedores'=> $vendedores,
            'errores'=>$errores
        ]);
   }
   public static function actualizar(Router $router){
    $id=validarORedireccionar('/admin');
    $vendedores=Vendedores::find($id);//encontrar propiedad con id proporcinado
    $errores=Vendedores::getErrores();

    if($_SERVER["REQUEST_METHOD"]==="POST"){
        //asignar valores    
        $args=$_POST['vendedor'];
        //sincronizar valores escritos con valores en obj en memoria
        $vendedores->sincronizar($args);
        //validar
        $errores=$vendedores->validar();
        if(empty($errores)){
            $vendedores->guardar();
        }    
     }
    $router->render("/vendedores/actualizar",[
        'vendedores'=>$vendedores,
        'errores'=>$errores
    ]); 

   }
   public static function eliminar(){
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        //validar id
        $_id= $_POST['id'];
        $_id=filter_var($_id, FILTER_VALIDATE_INT);
        if($_id){
            $tipo=$_POST['tipo'];
            if(validarTipoContenido($tipo)){
                    $vendedor=Vendedores::find($_id);
                    $vendedor->eliminar();
            }
        }
        
    }
   }

}