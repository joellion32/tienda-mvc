<h1>Editar Producto</h1>

<form action="<?=base_url?>producto/actualizar&id=<?=$producto->id?>" method="post" enctype="multipart/form-data">
<label for="nombre">Nombre</label>
<input type="text" name="nombre" value="<?=$productos->nombre?>" required>


<label for="categoria">Categoria</label>
<?php $categorias = Utils::showCategorias()?>
<select style="cursor:pointer;" name="categoria" id="categoria">
<?php while($categoria = $categorias->fetch_object()):?>
<option value="<?=$categoria->id?> <?=$categoria->id == $productos->categoria_id ? 'selected' : '';?>"><?=$categoria->nombre_categoria?></option>
<?php endwhile;?>
</select>

<label for="descripcion">Descripcion</label>
<textarea name="descripcion" id="descripcion" cols="30" rows="10"><?=$productos->descripcion?></textarea>

<label for="precio">Precio</label>
<input type="text" name="precio" value="<?=$productos->precio?>" required>

<label for="stock">Stock</label>
<input type="number" name="stock" value="<?=$productos->stock?>" required>

<img style="width: 100px; height:100px;" src="<?=base_url?>uploads/images/<?=$productos->imagen?>" alt="imagen">

<label for="imagen">Imagen</label>
<input type="file" name="imagen" value="uploads/images/<?=$productos->imagen?>"> 

<input type="submit" class="button" value="Actualizar">

</form>
