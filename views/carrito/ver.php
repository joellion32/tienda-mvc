<h1>Carrito de Compras</h1>


<table border="1">
<tr style="background-color:black; color:white;">
<td>Imagen</td>
<td>Nombre</td>
<td>Precio</td>
<td>Unidades</td>
<td>Eliminar</td>
</tr>
<?php foreach($carrito as $indice => $elemento):
$producto = $elemento['producto'];    
?>
<tr>
<td><img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" class="img_carrito" alt="imagen"></td>
<td><a href="<?=base_url?>producto/detalle&id=<?=$producto->id?>"><?=$producto->nombre?></a></td>
<td><?=$producto->precio?></td>
<!--Subir y Bajar unidades-->
<td>
<?=$elemento['unidades']?>
<div class="updown-unidades">
<a href="<?=base_url?>carrito/up&index=<?=$indice?>" class="button">+</a>
<a href="<?=base_url?>carrito/down&index=<?=$indice?>" class="button">-</a>
</div>
</td>
<td><a href="<?=base_url?>carrito/delete&index=<?=$indice?>" class="button button-carrito button-red">Quitar Producto</a></td>
</tr>
<?php endforeach;?>
</table>
<br>
<div class="delete-carrito">
<a href="<?=base_url?>carrito/delete_all" class="button button-delete button-red">Vaciar Carrito</a>
</div>

<div class="total-carrito">
<?php $status = Utils::statuscarrito();?>
<h3>Precio Total: <?=$status['total']?></h3>
<a href="<?=base_url?>pedido/addpedido" class="button button-pedido">Continuar con el pedido</a>
</div>