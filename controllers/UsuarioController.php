<?php
require_once 'models/Usuario.php';

class UsuarioController{

public function index(){
echo "controlador usuario";    
}

public function registro(){
include_once 'views/usuarios/create.php';    
}

public function save(){
if(isset($_POST)){
//iniciar la session
$usuario = new Usuario();
$usuario->setNombre($_POST['nombre']);
$usuario->setApellidos($_POST['apellidos']);
$usuario->setEmail($_POST['email']);
$usuario->setPassword($_POST['password']);
$guardar = $usuario->save();

if($guardar){
$_SESSION['guardar'] = "El usuario se ha registrado sastifastoriamente";

}

else{
$_SESSION['error'] = "Error al registrar usuario";    
}

}

header("location:" .base_url.'usuario/registro');



}//cierre del save



// funcion para loguear usuario

public function login(){
if(isset($_POST)){
$usuario = new Usuario();
$usuario->setEmail($_POST['email']);
$usuario->setPassword($_POST['password']);

//indentificar usuarios
$identificar = $usuario->login();
}

// para guardar los datos del usuario el una session
if($identificar && is_object($identificar)){
$_SESSION['identificar'] = $identificar;    
}

//para verificar si el usuario es administrador
if($identificar->rol == 'admin'){
$_SESSION['admin'] = true;
}

else{
$_SESSION['error'] = "error al iniciar sesion";    
}
header("location:" .base_url);
}


public function logout(){
if(isset($_SESSION['identificar'])){
unset($_SESSION['identificar']);
} 
if(isset($_SESSION['admin'])){
unset($_SESSION['admin']);
} 

header("location:" .base_url);
}


}//cierre de la clase