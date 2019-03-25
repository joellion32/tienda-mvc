<?php


class Producto{

public $id;
public $categoria_id;
public $nombre;
public $descripcion;
public $precio;
public $stock;
public $oferta;
public $fecha;
public $imagen;
public $db;

public function __construct() {
$this->db = Database::conexion();
}

//METODOS GETTERS
public function getId(){
return $this->id;    
}

public function getCategoria_Id(){
return $this->categoria_id;    
}

public function getNombre(){
return $this->nombre;    
}

public function getDescripcion(){
return $this->descripcion;    
}

public function getPrecio(){
return $this->precio;    
}

public function getStock(){
return $this->stock;    
}

public function getOferta(){
return $this->oferta;    
}

public function getFecha(){
return $this->fecha;    
}

public function getImagen(){
return $this->imagen;    
}

//METODOS SETTERS
public function setId($id){
$this->id = $id;    
}
    
public function setCategoria_Id($categoria_id){
$this->categoria_id = $categoria_id;    
}
    
public function setNombre($nombre){
$this->nombre = $this->db->real_escape_string($nombre);    
}
    
public function setDescripcion($descripcion){
$this->descripcion = $this->db->real_escape_string($descripcion);    
}
    
public function setPrecio($precio){
$this->precio = $this->db->real_escape_string($precio);    
}

public function setStock($stock){
$this->stock = $this->db->real_escape_string($stock);    
}
    
public function setOferta($oferta){
$this->oferta = $oferta;    
}
    
public function setFecha($fecha){
$this->fecha = $fecha;    
}
    
public function setImagen($imagen){
$this->imagen = $imagen;    
}

//function para listar datos del modelo
public function OrderBy(){
$productos = $this->db->query("SELECT * FROM productos ORDER BY id ASC"); 
return $productos;   
}

//funcion para mostrar los productos por categorias
public function productocall(){
$sql = $this->db->query("SELECT productos.*, categorias.nombre_categoria 
FROM productos INNER JOIN categorias ON categorias.id = productos.categoria_id 
WHERE productos.categoria_id = {$this->getId()}");    

return $sql;
}


//function para listar datos por id
public function Find(){
$productos = $this->db->query("SELECT * FROM productos WHERE id={$this->getId()}"); 
return $productos->fetch_object();   
}

//metodo para guardar 
public function save(){
$result = false;    
$sql = "INSERT INTO productos VALUES(null,{$this->getCategoria_Id()} ,'{$this->getNombre()}','{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, null, CURDATE(), '{$this->getImagen()}')"; 
$save = $this->db->query($sql);

if($save){
$result = true;
}

return $result;


}

public function update(){
$result = false;
$sql = "UPDATE productos SET categoria_id ={$this->getCategoria_Id()}, nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', 
precio={$this->getPrecio()}, stock={$this->getStock()}, imagen='{$this->getImagen()}' WHERE id={$this->getId()}";
$actualizar = $this->db->query($sql);

if($actualizar){
$result = true;
}

return $result;
}

public function delete(){
$result = false;    
$sql = "DELETE FROM productos WHERE id={$this->id}";
$delete = $this->db->query($sql);

if($delete){
$result = true;
}

return $result;
}



}//cierre de la clase

