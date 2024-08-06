<?php
namespace Model;
class Admin extends ActiveRecord{
    protected static $tabla = 'usuario';
    protected static $columnasDB=['id','password', 'email'];

    public  $id;
    public  $password;
    public  $email;

    public function __construct($args =[])
    {
        $this->id=$args['id']?? null;
        $this->password=$args['password']?? '';
        $this->email=$args['email']?? '';
    }

    public function validar()
    {
        if(!$this->password){
            self::$errores[]='password erroneo ';
        }
        if(!$this->email){
            self::$errores[]='email erroneo ';
        }
        return self::$errores;
    }
    public function existeUsuario(){
        //revisar si existe
        $query="SELECT * FROM " . self::$tabla . " WHERE email ='" . $this->email . "' LIMIT 1";
        $resultado=self::$db->query($query);
       if(!$resultado->num_rows){
        self::$errores[]='el usuario no existe';
        return;
       }
       return $resultado;
    }
    public function comprobarPassword($resultado){
        $usuario = $resultado->fetch_object();
        $autenticado=password_verify($this->password, $usuario->password);
        if(!$autenticado){
            self::$errores[]='password incorrecto';
        }
        return $autenticado;
    }
    public function autenticarUsuario(){
        session_start();//arreglo de sesion
        //llenar  arrelgo de sesion
        $_SESSION['usuario']=$this->email;
        $_SESSION['login']=true;
        header('location: /admin');
    }
}