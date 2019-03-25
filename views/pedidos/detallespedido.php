<h1>Todos los pedidos</h1>


<table border="1">
<tr style="background-color:black; color:white;">
<td>No de Pedido</td>
<td>Direccion</td>
<td>Coste</td>
<td>Fecha</td>
</tr>
<?php while($pedido = $pedidos->fetch_object()):?>
<tr>
<td><?=$pedido->id?></td>
<td><?=$pedido->direccion?></td>
<td><?=$pedido->coste?></td>
<td><?=$pedido->fecha?></td>
</tr>
<?php endwhile?>
</table>