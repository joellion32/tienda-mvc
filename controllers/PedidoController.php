<?php
require_once 'models/Pedido.php';

class PedidoController{

public function addpedido(){
Utils::usuario();    
require_once 'views/pedidos/index.php';
}


public function savepedido(){
Utils::usuario();
$carrito = Utils::statuscarrito();
$usuario = $_SESSION['identificar']->id;
$pedido = new Pedido();
$pedido->setUsuario_id($usuario);
$pedido->setProvincia($_POST['provincia']);
$pedido->setLocalidad($_POST['localidad']);
$pedido->setDireccion($_POST['direccion']);
$pedido->setCoste($carrito['total']);
$pedido->setEstado("confirmado");
//guardar el pedido
$save = $pedido->save();
//guardar linea del pedido
$save_linea = $pedido->save_linea();

if($save && $save_linea){
$_SESSION['correcto'] = "El pedido se ha realizado correctamente";
}

else{
$_SESSION['error'] = "Error al solicitar el pedido";

}

header("location:".base_url."pedido/confirmado");
}//cierre de la funcion save


//sacar los pedidos del usuario
public function detallespedido(){
Utils::usuario();  
$usuario_id = $_SESSION['identificar']->id;
$pedido = new Pedido();
$pedido->setUsuario_id($usuario_id);
$pedidos = $pedido->usuariospedidos();
require_once 'views/pedidos/detallespedido.php';
}

public function gestionar(){
Utils::administador();  
$pedido = new Pedido();
$pedidos = $pedido->OrderBy();
require_once 'views/pedidos/gestion.php';
}


//para poner todos los datalles del pedido confirmado incluso cuenta a depositar
public function confirmado(){
if(isset($_SESSION['correcto'])){
$usuario_id = $_SESSION['identificar']->id;
$pedido = new Pedido();
$pedido->setUsuario_id($usuario_id);  
$pedidos = $pedido->FindUser();

require_once 'views/pedidos/confirmado.php';    
} 

}

}//cierre de la clase