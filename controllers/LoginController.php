<?php
 namespace Controller;
 use MVC\Router;
 use Model\Admin;
class loginController
{
 public static function login(Router $router){
      $errores=[];
      if($_SERVER['REQUEST_METHOD']==='POST'){
        $auth=new Admin($_POST);
        $errores=$auth->validar();

        if(empty($errores)){
          //verificar si el user existe
          $resultado=$auth->existeUsuario();
          if(!$resultado){
            $errores=Admin::getErrores();
          }else{
            //si el user existe verifica el password
            $autenticado=$auth->comprobarPassword($resultado);
             if($autenticado){
               //auth user
               $auth->autenticarUsuario();
             }else{
              //si password es es incorrecto muestra error
              $errores=Admin::getErrores();
             }

          }

        }
      }
    $router->render('auth/login',[
      'errores'=>$errores
    ]);
 }
 public static function logout(){
    session_start();

    $_SESSION=[];//limpia los datos del arreglo para borrar al sesion
    header('location: /');
 }
} 