
<h1>Registrate</h1>
<?php if(isset($_SESSION['guardar'])):?>
<div style="width:96%; background-color:green; color:white;"><?php echo $_SESSION['guardar']?></div>
<?php endif;?>

<?php if(isset($_SESSION['error'])):?>
<div style="width:96%; background-color:red; color:white;"><?php echo $_SESSION['error']?></div>
<?php endif;?>

<?php Utils::deletesession('guardar');?>
<?php Utils::deletesession('error');?>
<?php Utils::deletesession('error_login');?>

<form action="<?=base_url?>usuario/save" method="post">
<label for="nombre">Nombre</label>
<input type="text" name="nombre" required>

<label for="apellidos">Apellidos</label>
<input type="text" name="apellidos" required>

<label for="email">Email</label>
<input type="email" name="email" required>

<label for="password">Password</label>
<input type="password" name="password" required>

<input type="submit" class="button" value="Enviar">

</form>
