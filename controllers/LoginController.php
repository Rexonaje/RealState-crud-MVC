<?php
 namespace Controller;
 use MVC\Router;
 use Model\Admin;
class loginController
{
 public static function login(Router $router){
      $errores=[];
      if($_SERVER['REQUEST_METHOD']==='POST'){
        echo 'autenticado';
      }
    $router->render('auth/login',[
      'errores'=>$errores
    ]);
 }
 public static function logout(){
    echo "aqui logout";
 }
}