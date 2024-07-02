<?php 
namespace Controller;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;


class PropiedadController{
    public static function index(Router $router){
        $propiedades=Propiedad::all();//controlador guarda los datos en la variable
        $resultado=null;
        $router->render("propiedades/admin",[
            'propiedades'=>$propiedades,//se lo pasa a la vista
            'resultado'=>$resultado
        ]);
    }
    public static function crear(Router $router){
        $propiedad= new Propiedad();
        $vendedores= Vendedores::all();
        $router->render("propiedades/crear", [
            'propiedad'=> $propiedad,
            'vendedores'=> $vendedores
        ]);
    }    
    public static function actualizar(){
        echo "crear";
    }    
}