<?php


class Categoria{

    public $id;
    public $nombre_categoria;
    public $db;


public function __construct() {
$this->db = Database::conexion();
}

//METODOS GETTERS
public function getId(){
return $this->id;    
}

public function getNombre(){
return $this->nombre_categoria;    
}


//METODOS SETTERS
public function setId($id){
$this->id = $id;    
}
    
public function setNombre($nombre_categoria){
$this->nombre_categoria = $nombre_categoria;    
}

//metodos para listar categorias
public function OrderBy(){
$categorias = $this->db->query("SELECT * FROM categorias");    
return $categorias;
}

public function nameall(){
$categorias = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()}");    
return $categorias->fetch_object();
}

public function save(){

$sql = "INSERT INTO categorias VALUES(NULL,'{$this->getNombre()}');";
$save = $this->db->query($sql);
$result= false;

if($save){

$result= true;
}

return $result;
}

}