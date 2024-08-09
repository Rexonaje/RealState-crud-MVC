<?php
//APP.PHP MANEJA AHORA FUNCIONES, BASE DE DATOS Y CLASSES

use Dotenv\Dotenv;
use Model\ActiveRecord;
require __DIR__ . "/../vendor/autoload.php";//CLASES
$dotenv=Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();  

require 'funciones.php';//FUNCIONES
require 'config/database.php';//BD

$bd=conectarDB();

ActiveRecord::setDB($bd);
//$propiedad=new Propiedad;

//var_dump($propiedad);