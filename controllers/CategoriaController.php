<?php
require_once 'models/Categoria.php';

class CategoriaController{

public function index(){
// validar si el usuario es administrador    
Utils::administador();    

$categoria = new Categoria();
//listar todas las categorias
$categorias = $categoria->OrderBy();
require_once 'views/categorias/index.php';   
}

public function crear(){
Utils::administador();     
require_once 'views/categorias/crear.php';    
}

public function save(){
Utils::administador();  
// guardar categorias
$categorias = new Categoria();
$categorias->setNombre($_POST['nombre']);
$guardar = $categorias->save();

if(isset($guardar)){
$_SESSION['guardar'] = "Categoria creada Correctamente";    
}

else{
$_SESSION['error'] = "Error al crear Categoria";    

}

header("location:" .base_url."categoria/index");
}


}//cierre de la clase