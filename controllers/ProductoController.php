<?php
require_once 'models/Producto.php';
require_once 'models/Categoria.php';

class ProductoController{

public function index(){
$producto = new Producto();
$productos = $producto->OrderBy();
include_once 'views/productos/index.php'; 
}
//listar productos por categorias
public function categoriaproducto(){
if(isset($_GET['id'])){
$id = $_GET['id'];
$nombrec = new Categoria();
$nombrec->setId($id);
$name = $nombrec->nameall();

$categoria = new Producto();
$categoria->setId($id);
$categorias = $categoria->productocall();
}
require_once 'views/categorias/listarproducto.php';
}

//ver detalle del producto
public function detalle(){
if(isset($_GET['id'])){
$productos = new Producto();    
$productos->setId($_GET['id']);
$producto = $productos->Find();
}
require_once 'views/productos/detalleproducto.php';
}


public function gestionar(){
Utils::administador();
$producto = new Producto();
$productos = $producto->OrderBy();
include_once 'views/productos/gestion.php'; 
}


public function crear(){
Utils::administador();    
include_once 'views/productos/crear.php'; 

}

public function editar(){
Utils::administador();
if(isset($_GET['id'])){   
$producto = new Producto();
$producto->setId($_GET['id']);
$productos = $producto->Find();    
include_once 'views/productos/editar.php'; 
}
else{
header("location:". base_url."producto/gestionar");
}
}

public function save(){
Utils::administador();  
if(isset($_POST)){
$producto = new Producto();
$producto->setNombre($_POST['nombre']);
$producto->setCategoria_Id($_POST['categoria']);
$producto->setDescripcion($_POST['descripcion']);
$producto->setPrecio($_POST['precio']);
$producto->setStock($_POST['stock']);

//guardar imagen
$file = $_FILES['imagen'];
$filename = $file['name'];
$tipo = $file['type'];

if($tipo == 'image/jpg' || $tipo == 'image/png' || $tipo == 'image/jpeg' || $tipo == 'image/gif'){
if(!is_dir('uploads/images')){
mkdir('uploads/images' , 0777, true);   
}
$producto->setImagen($filename);   
move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename); 
}

//guardar producto
$producto->save();
}
if($producto){
$_SESSION['guardar'] = "Producto Guardado Correctamente";    
}

else{
$_SESSION['error'] = "Error al Guardar Producto";    

}

header("location:".base_url."producto/gestionar");
}

public function actualizar(){
Utils::administador(); 

if(isset($_GET['id'])){ 
$producto = new Producto();
$producto->setId($_GET['id']);
$producto->setCategoria_Id($_POST['categoria']);
$producto->setNombre($_POST['nombre']);
$producto->setDescripcion($_POST['descripcion']);
$producto->setPrecio($_POST['precio']);
$producto->setStock($_POST['stock']);
$actualizar = $producto->update();


if($actualizar){
$_SESSION['guardar'] = "Producto Actualizado Correctamente";    
}

else{
$_SESSION['error'] = "Error al Actualizar Producto";    

}

}

header("location:" . base_url . "/producto/gestionar");
}//cierre de actualizar

public function eliminar(){
if(isset($_GET['id'])){
$id = $_GET['id'];
$producto = new Producto();
$producto->setId($id);
$borrar = $producto->delete();
}

if($borrar){
$_SESSION['guardar'] = "Producto Eliminado Correctamente";    
}

header("location:". base_url."producto/gestionar");
}

}//cierre de la clase