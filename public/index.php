<?php
require_once __DIR__ . '../../includes/app.php';

use MVC\Router;
use Controller\PropiedadController;
use Controller\VendedoresController;
use Controller\PaginasController;


$router=new Router();
                //propiedades-zona publica
//-------get          //url y funcion
$router->get('/admin',[PropiedadController::class,'index']);
$router->get('/propiedades/crear',[PropiedadController::class,'crear']);
$router->get('/propiedades/actualizar',[PropiedadController::class,'actualizar']);

//-------post
$router->post('/propiedades/crear',[PropiedadController::class,'crear']);
$router->post('/propiedades/actualizar',[PropiedadController::class,'actualizar']);
$router->post('/propiedades/eliminar',[PropiedadController::class,'eliminar']);
       
                //vendedores-zona publica
//-------get          //url y funcion
$router->get('/vendedores/crear',[VendedoresController::class,'crear']);
$router->get('/vendedores/actualizar',[VendedoresController::class,'actualizar']);

//-------post
$router->post('/vendedores/crear',[VendedoresController::class,'crear']);
$router->post('/vendedores/actualizar',[VendedoresController::class,'actualizar']);
$router->post('/vendedores/eliminar',[VendedoresController::class,'eliminar']);
                //paginas-zona publica
$router->get('/',[PaginasController::class,'index']);
$router->get('/nosotros',[PaginasController::class,'nosotros']);
$router->get('/propiedades',[PaginasController::class,'propiedades']);
$router->get('/propiedad',[PaginasController::class,'propiedad']);
$router->get('/blog',[PaginasController::class,'blog']);
$router->get('/entrada',[PaginasController::class,'entrada']);
$router->get('/contacto',[PaginasController::class,'contacto']);
$router->post('/contacto',[PaginasController::class,'contacto']);

$router->comprobarRutas();