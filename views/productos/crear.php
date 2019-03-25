<h1>Crear Producto</h1>

<form action="<?=base_url?>producto/save" method="post" enctype="multipart/form-data">
<label for="nombre">Nombre</label>
<input type="text" name="nombre" required>


<label for="categoria">Categoria</label>
<?php $categorias = Utils::showCategorias()?>
<select style="cursor:pointer;" name="categoria" id="categoria">
<?php while($categoria = $categorias->fetch_object()):?>
<option value="<?=$categoria->id?>"><?=$categoria->nombre_categoria?></option>
<?php endwhile;?>
</select>

<label for="descripcion">Descripcion</label>
<textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>

<label for="precio">Precio</label>
<input type="text" name="precio" required>

<label for="stock">Stock</label>
<input type="number" name="stock" value="20" required>

<label for="stock">Imagen</label>
<input type="file" name="imagen">

<input type="submit" class="button" value="Enviar">

</form>

