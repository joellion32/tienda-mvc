<h1><?=$producto->nombre?></h1>

<div id="detail-product">  
<div class="image">
<img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" alt="<?=$producto->imagen?>">
</div> 

<div class="data">
<a href="<?=base_url?>producto/detalle&id=<?=$producto->id?>"><h2><?=$producto->nombre?></h2></a>
<p class="price">RD$ <?=$producto->precio?></p>
<p class="description"><?=$producto->descripcion?></p>
<a href="<?=base_url?>carrito/addcarrito&id=<?=$producto->id?>" style="width: 150px !important; text-align:center;" class="button">Comprar</a>
</div>
</div>