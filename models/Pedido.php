<?php


class Pedido{

public $id;
public $usuario_id;
public $provincia;
public $localidad;
public $direccion;
public $coste;
public $estado;
public $db;


public function __construct() {
$this->db = Database::conexion();
}

//METODOS GETTERS
public function getId(){
return $this->id;    
}

public function getUsuario_id(){
return $this->usuario_id;    
}

public function getProvincia(){
return $this->provincia;    
}

public function getLocalidad(){
return $this->localidad;    
}

public function getDireccion(){
return $this->direccion;    
}

public function getCoste(){
return $this->coste;    
}

public function getEstado(){
return $this->estado;    
}
//METODOS SETTERS
public function setId($id){
$this->id = $id;    
}

public function setUsuario_id($usuario_id){
$this->usuario_id = $usuario_id;    
}

public function setProvincia($provincia){
 $this->provincia = $provincia; 
}

public function setLocalidad($localidad){
$this->localidad = $localidad;    
}


public function setDireccion($direccion){
 $this->direccion = $direccion;    
}

public function setCoste($coste){
 $this->coste = $coste;    
}

public function setEstado($estado){
 $this->estado = $estado;    
}

//Metodos
//function para listar datos del modelo
public function OrderBy(){
$pedidos = $this->db->query("SELECT * FROM pedidos ORDER BY id ASC"); 
return $pedidos;   
}

//function para listar datos por id
public function Find(){
$pedidos = $this->db->query("SELECT * FROM pedidos WHERE id={$this->getId()}"); 
return $pedidos->fetch_object();   
}

public function FindUser(){
$pedidos = $this->db->query("SELECT * FROM pedidos 
INNER JOIN lineas_pedidos lp ON lp.pedido_id = pedidos.id 
WHERE pedidos.usuario_id={$this->getUsuario_id()}"); 
return $pedidos->fetch_object();   
}

//sacar los pedidos del usuario
public function usuariospedidos(){
$pedido = $this->db->query("SELECT * FROM pedidos WHERE usuario_id = {$this->getUsuario_id()}");
return $pedido;    
}

//metodo para guardar 
public function save(){
$result = false;    
$sql = "INSERT INTO pedidos VALUES(NULL,{$this->getUsuario_id()},'{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDireccion()}',{$this->getCoste()},'{$this->getEstado()}', CURDATE(), CURTIME())"; 
$save = $this->db->query($sql);
if($save){
$result = true;
}

return $result;

}


//metodo para guardar la linea de pedido solo ver administrador
public function save_linea(){
$result = false;    
$sql = "SELECT LAST_INSERT_ID() as 'pedido'";
$pedido_id = $this->db->query($sql)->fetch_object()->pedido;  

foreach($_SESSION['carrito'] as $elemento){
$producto = $elemento['producto'];  
$insert  = "INSERT INTO lineas_pedidos VALUES(null,{$pedido_id},{$producto->id},{$elemento['unidades']})";
$save_linea = $this->db->query($insert);

}//cierre del foreach

if($save_linea){
$result = true;
}

return $result;

}//cierre de la funcion sava linea

}//cierre de la clase

