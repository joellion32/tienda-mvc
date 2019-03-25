<h1>Hacer Pedido</h1>
<?php if(isset($_SESSION['no-indentificado'])):?>
<div style="width:96%; background-color:red; color:white;"><?=$_SESSION['error'];?></div>
<?php endif;?>

<?php Utils::deletesession('no-indentificado');?>
<a href="#">Ver Todos los pedidos</a>
<br>

<form action="<?=base_url?>pedido/savepedido" method="post">
<label for="provincia">Provincia</label>
<input type="text" name="provincia" required>

<label for="provincia">Ciudad</label>
<input type="text" name="localidad" required>

<label for="provincia">Direccion</label>
<input type="text" name="direccion" required>

<button type="submit">Enviar</button>
</form>