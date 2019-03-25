<?php if(isset($_SESSION['mensaje'])):?>
<div style="width:96%; background-color:green; color:white;"><?=$_SESSION['mensaje']?></div>
<?php endif;?>

<?php if(isset($_SESSION['mensaje'])):?>
<div style="width:96%; background-color:error; color:white;"><?=$_SESSION['error']?></div>
<?php endif;?>

<?php Utils::deletesession('mensaje');?>
<?php Utils::deletesession('error');?>
<h1>Productos Destacados</h1>    
<?php while($producto = $productos->fetch_object()):?>
<div class="product">   
<img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" alt="<?=$producto->imagen?>">
<a href="<?=base_url?>producto/detalle&id=<?=$producto->id?>"><h2><?=$producto->nombre?></h2></a>
<p>RD$ <?=$producto->precio?></p>
<a href="<?=base_url?>carrito/addcarrito&id=<?=$producto->id?>" class="button">Comprar</a>
</div>
<?php endwhile;?>

</div><!--Cierre del Central-->