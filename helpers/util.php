<?php

class Utils{

public static function deletesession($name){
if(isset($_SESSION[$name])){
$_SESSION[$name] = null;
}

return $name;
}

public static function usuario(){
if(!isset($_SESSION['identificar'])){
$_SESSION['no-indentificado'] = "no estas indentificado para hacer el pedido";
header("location:".base_url);    
}

else{
return true;    
}
}


public static function administador(){
if(!isset($_SESSION['admin'])){
header("location:".base_url);    
}

else{
return true;    
}
}

public static function showCategorias(){
require_once 'models/Categoria.php';
$categoria = new Categoria();
$categorias = $categoria->OrderBy();

return $categorias;
}

public static function statuscarrito(){
$status = array(
'count' => 0,
'stats' => 0,    
);

if(isset($_SESSION['carrito'])){
$status['count'] = count($_SESSION['carrito']);

foreach($_SESSION['carrito'] as $producto){
error_reporting(0);  
$status['total'] += $producto['precio'] * $producto['unidades'];
}
}

return $status;
}


}//cierre del utils