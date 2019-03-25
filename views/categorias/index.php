
<h1>Gestionar Categorias</h1>
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

<a href="<?=base_url?>categoria/crear" class="button button-small">Crear Categoria</a>

<table border="1">
<tr style="background-color:black; color:white;">
<td>Id</td>
<td>Nombre</td>
</tr>
<?php while($categoria = $categorias->fetch_object()):?>
<tr>
<td><?=$categoria->id?></td>
<td><?=$categoria->nombre_categoria?></td>
</tr>
<?php endwhile?>

</table>