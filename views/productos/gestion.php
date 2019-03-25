<h1>Gestionar Productos</h1>
<?php if(isset($_SESSION['guardar'])):?>
<div style="background-color:green; color:white;"><?=$_SESSION['guardar']?></div>
<?php endif;?>

<?php if(isset($_SESSION['error'])):?>
<div style="background-color:red; color:white;"><?=$_SESSION['error']?></div>
<?php endif;?>
<br><br>
<!--borrar sessiones-->
<?php Utils::deletesession('guardar');?>
<?php Utils::deletesession('error');?>

<a href="<?=base_url?>producto/crear" class="button button-small">Crear Producto</a>

<table border="1">
<tr style="background-color:black; color:white;">
<td>Id</td>
<td>Nombre</td>
<td>Precio</td>
<td>Stock</td>
<td></td>
<td></td>
</tr>
<?php while($producto = $productos->fetch_object()):?>
<tr>
<td><?=$producto->id?></td>
<td><?=$producto->nombre?></td>
<td><?=$producto->precio?></td>
<td><?=$producto->stock?></td>
<td><a class="button" style="background-color:blue;" href="<?=base_url?>producto/editar&id=<?=$producto->id?>">Editar</a></td>
<td><a class="button" style="background-color:red;" href="<?=base_url?>producto/eliminar&id=<?=$producto->id?>">eliminar</a></td>
</tr>
<?php endwhile?>

</table>