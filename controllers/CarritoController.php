<?php
require_once 'models/Producto.php';

class CarritoController{

//mostrar articulos del carrito    
public function index(){
if(isset($_SESSION['carrito'])){
$carrito = $_SESSION['carrito']; 
require_once 'views/carrito/ver.php';
}
else{
echo "No Hay Productos que mostrar";
}
}//cierre de funcion



//agregar articulos al carrito
public function addcarrito(){
if(isset($_GET['id'])){
$producto_id = $_GET['id'];    
}

else{
header("location:" . base_url);    
}

if(isset($_SESSION['carrito'])){
$counter = 0;    
foreach ($_SESSION['carrito'] as $indice => $elemento) {
if($elemento['id_producto'] == $producto_id){
$_SESSION['carrito'][$indice]['unidades']++; 
$counter++;   
}
}

}

//condicion crear el producto si counter no existe
if(!isset($counter) || $counter == 0){
//Conseguir Producto    
$productos = new Producto();
$productos->setId($producto_id); 
$producto = $productos->Find();   

//comprobar si el producto es un objeto
if(is_object($producto)){
$_SESSION['carrito'][] = array(
'id_producto' => $producto->id,
'precio' => $producto->precio,
'unidades' => 1,
'producto' => $producto
);
}

}//cierre de la condicion

header("location:" .base_url."carrito/index");

}//cierre del metodo


//borrar un solo elemento del carrito
public function delete(){
if(isset($_GET['index'])){
$indice = $_GET['index'];
unset($_SESSION['carrito'][$indice]);    
}

header("location:" .base_url."carrito/index");
}


//borrar todos los objetos del carrito
public function delete_all(){
unset($_SESSION['carrito']);  
header("location:" .base_url."carrito/index");
}


//subir las unidades del carrito
public function up(){
 if(isset($_GET['index'])){
$indice = $_GET['index'];
$_SESSION['carrito'][$indice]['unidades']++;
}   
header("location:" .base_url."carrito/index");
}

public function down(){
 if(isset($_GET['index'])){
$indice = $_GET['index'];
$_SESSION['carrito'][$indice]['unidades']--;

if($_SESSION['carrito'][$indice]['unidades'] ==0){
unset($_SESSION['carrito']);  
}
}   
header("location:" .base_url."carrito/index");
}

}//cierre de la clase