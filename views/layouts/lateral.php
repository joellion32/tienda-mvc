



<!--Barra Lateral-->
<aside id="lateral">   
<!--Carrito-->
<div id="carrito">
<?php $carrito = Utils::statuscarrito();?>    
<h3>Mi Carrito</h3>
<?php if(isset($_SESSION['carrito'])):?>
<ul>
<li><a href="<?=base_url?>carrito/index">Productos (<?=$carrito['count']?>)</a></li>  
<li><a href="<?=base_url?>carrito/index">Total (RD$<?=$carrito['total']?>)</a></li>    
<li><a href="<?=base_url?>carrito/index">Ver Carrito</a></li>    
</ul>
<?php else:?>
<ul>
<li><a href="<?=base_url?>carrito/index">Productos (0)</a></li>  
<li><a href="<?=base_url?>carrito/index">Total (0)</a></li>    
<li><a href="<?=base_url?>carrito/index">Ver Carrito</a></li>    
</ul>
<?php endif;?>
</div>

<!--Login-->
<div id="login" class="block_aside">
<?php if(!isset($_SESSION['identificar'])):?>
<h3 class="lateral">Entrar a la Web</h3> 

<!--Mandar el error-->
<?php if(isset($_SESSION['error'])):?>
<div style="background-color:red; color:white;"><?=$_SESSION['error']?></div>
<?php endif;?>

<?php Utils::deletesession('error');?>

<!--Formulario-->
<form action="<?= base_url?>usuario/login" method="POST">
<label for="email">Email</label>
<input type="email" name="email" id="email">

<label for="password">Password</label>
<input type="password" name="password" id="password">

<input type="submit" value="Enviar">
</form>
<?php else:?>
<h3>Bienvenido <?=$_SESSION['identificar']->nombre . " " . $_SESSION['identificar']->apellidos?></h3>
<?php endif;?>
<ul> 
<?php if(isset($_SESSION['admin'])):?>
<li><a href="<?=base_url?>categoria/index">Gestionar Categorias</a></li>
<li><a href="<?=base_url?>pedido/gestionar">Gestionar Pedidos</a></li>
<li><a href="<?=base_url?>producto/gestionar">Gestionar Productos</a></li>
<?php endif;?>

<?php if(isset($_SESSION['identificar'])):?>
<li><a href="<?=base_url?>pedido/detallespedido">Mis pedidos</a></li>
<li><a href="<?=base_url?>usuario/logout">Cerrar Sesion</a></li>
<?php else:?>
<li><a href="<?=base_url?>usuario/registro">Registrate</a></li>
<?php endif;?>
 </ul>
</div>
</aside> 

<!--Contenido Central-->
<div id="central">