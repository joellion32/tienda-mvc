<h1>Gestionar Pedido</h1>

<table border="1">
<tr style="background-color:black; color:white;">
<td>No Pedido</td>
<td>Direccion</td>
<td>Coste</td>
<td>Estado</td>
<td>Fecha</td>
</tr>
<?php while($pedido = $pedidos->fetch_object()):?>
<tr>
<td><?=$pedido->id?></td>
<td><?=$pedido->direccion?></td>
<td><?=$pedido->coste?></td>
<td><?=$pedido->estado?></td>
<td><?=$pedido->fecha?></td>
</tr>
<?php endwhile;?>
</table>