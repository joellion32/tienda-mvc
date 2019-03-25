
<h1>Categoria <?=$name->nombre_categoria?></h1>  


<?php if($categorias->num_rows == 0):?>
<h3>no hay productos que mostrar</h3>
<?php else:?>
<?php while($categoria = $categorias->fetch_object()):?>
<div class="product">   
<img src="<?=base_url?>uploads/images/<?=$categoria->imagen?>" alt="<?=$categoria->imagen?>">
<a href="<?=base_url?>producto/detalle&id=<?=$categoria->id?>"><h2><?=$categoria->nombre?></h2></a>
<p>RD$ <?=$categoria->precio?></p>
<a href="<?=base_url?>carrito/addcarrito&id=<?=$categoria->id?>" class="button">Comprar</a>
</div>
<?php endwhile;?>
<?php endif;?>
</div><!--Cierre del Central-->