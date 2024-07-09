<?php
 namespace Controller;
 use MVC\Router;
 use Model\Propiedad;
 class PaginasController{
    public static function index(Router $router){
        $propiedades=Propiedad::get(3);
      $router->render('paginas/index',[
        'propiedades'=>$propiedades
      ]);
    }
    public static function nosotros(){
        echo "nosotros"; 
        
    }
    public static function propiedades(){
        echo "propiedades"; 
        
    }
    
    public static function propiedad(){
        echo "propiedad"; 
        
    }
    public static function blog(){
        
        echo "blog"; 
    }
    public static function entrada(){
        echo "entrada"; 
        
    }
    public static function contacto(){
        echo "contacto"; 
        
    }
 }