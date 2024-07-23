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
        if($_SERVER['REQUEST_METHOD']==='POST'){
            //crear una instancia de phpmailer
            $mail=new PHPMailer();
            //Configurar smtp
            $mail->isSMTP();
            $mail->Host='smtp.mailtrap.io';
            $mail->SMTPAuth=true;
            $mail->Username='c20fc8989472f9';
            $mail->Password='07754e70f5d1b0';
            $mail->SMTPSecure='tls';//No encriptados pero por un canal seguro
            $mail->Port=2525;
            //configurar el contenido del mail
            $mail->setFrom('admin@bienesraices.com');// quien envia
            $mail->addAddress('admin@bienesraices.com','BienesRaices.com');//quien recibe
            $mail->Subject='Tienes un nuevo mensaje';

            //habilitar html
            $mail->isHTML(true);
            $mail->CharSet='UTF-8';
            //definir contenido
            $contenido='<html> <p> Tienes un nuevo mensaje </p> </html> ';
            $mail->Body=$contenido;
            $mail->AltBody='Tienes un nuevo mensaje';
            //enviar mail
            if($mail->send()){
                echo "Mensaje enviado correctamente";
            }
            else{
                echo "error al enviar mensaje";
            }
        }
        $router->render('paginas/contacto',[]);                             
        
    }
 }