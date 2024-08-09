<?php
 namespace Controller;
 use MVC\Router;
 use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

 class PaginasController{
    public static function index(Router $router){
        $propiedades=Propiedad::get(3);
        $inicio=true;
      $router->render('paginas/index',[
        'propiedades'=>$propiedades,
        'inicio'=> $inicio
      ]);
    }
    public static function nosotros(Router $router){
                                
        $router->render('paginas/nosotros',[]);
        
    }
    public static function propiedades(Router $router){
        $propiedades=Propiedad::all();
        $router->render('paginas/propiedades',['propiedades'=>$propiedades ]);
        
    }
    
    public static function propiedad(Router $router){
        $id= validarORedireccionar('/propiedades');
        $propiedad=Propiedad::find($id);
        $router->render('paginas/propiedad',['propiedad'=>$propiedad ]);
        
    }
    public static function blog(Router $router){
        
        $router->render('paginas/blog',[]);
    }
    public static function entrada(Router $router){
        $router->render('paginas/entrada',[]);
        
    }
    public static function contacto(Router $router){
        $mensaje=null;
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $respuesta=$_POST['contacto'];
            
            //crear una instancia de phpmailer
            $mail=new PHPMailer();
            //Configurar smtp
            $mail->isSMTP();
            $mail->Host=$_ENV['EMAIL_HOST'];
            $mail->SMTPAuth=true;
            $mail->Username=$_ENV['EMAIL_USER'];
            $mail->Password=$_ENV['EMAIL_PASSWORD'];
            $mail->SMTPSecure='tls';//No encriptados pero por un canal seguro
            $mail->Port=$_ENV['EMAIL_PORT'];
            //configurar el contenido del mail
            if($respuesta['contacto']==='email'){//chequea si existe mail x parte de user
                $mail->setFrom($respuesta['email']);
            }else{
                $mail->setFrom('correo@correo.com');// quien envia
            }
            $mail->addAddress('admin@bienesraices.com','BienesRaices.com');//quien recibe
            $mail->Subject='Tienes un nuevo mensaje';
            
            //habilitar html
            $mail->isHTML(true);
            $mail->CharSet='UTF-8';
            //definir contenido
            $contenido='<html>';
            $contenido.= '<p> Tienes un nuevo mensaje </p>';
            $contenido.= '<p> De:'. $respuesta['nombre'].'</p>';
            $contenido.= '<p> vende o compra:'. $respuesta['tipo'].'</p>';
            $contenido.= '<p> presupuesto: $'. $respuesta['precio'].'</p>';
            $contenido.= '<p> forma de contacto preferida: '. $respuesta['contacto'].'</p>';
            if($respuesta['contacto']==='telefono'){
                $contenido.= '<p> telefono:'. $respuesta['telefono'].'</p>';
                $contenido.= '<p> fecha: '. $respuesta['fecha'].'</p>';
                $contenido.= '<p> hora: '. $respuesta['hora'].'</p>';     
            }else{
                $contenido.= '<p> Email:'. $respuesta['email'].'</p>';
            }
            $contenido.= '<p> mensaje:'. $respuesta['mensaje'].'</p>';
            $contenido.='</html> ';
            
            
            
            
            $mail->Body=$contenido;
            $mail->AltBody='Tienes un nuevo mensaje';
            //enviar mail
            //debugear($_POST);
            if($mail->send()){
                $mensaje= "Mensaje enviado correctamente";
            }
            else{
                $mensaje= "error al enviar mensaje";
            }
             
        }
        $router->render('paginas/contacto',[
            'mensaje'  =>$mensaje
        ]);                             
        
    }
 }