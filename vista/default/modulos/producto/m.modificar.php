 <h3 style="text-align:center;">Producto</h3>
  <form class="form-horizontal centrar-form" action="index.php?action=producto" method="POST">

<div class="form-group">
    <label for="producto" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
      <input id="nombre" class="form-control"  value="<?php echo $data['nombre']?>" name="nombre" type="text" required="required" />
    </div>
</div>
<div class="form-group">
    <label for="producto" class="col-sm-2 control-label">Codigo</label>
    <div class="col-sm-10">
    <input id="codigo" class="form-control"  value="<?php echo $data['codigo']?>" name="codigo" type="text" required="required" />
</div>
</div >

<div class="form-group">
    <label for="producto" class="col-sm-2 control-label">Unidad Medida</label>
    <div class="col-sm-10">
<select class="form-control"  name="unidad" required="required">
 <option value="">Seleccione</option>
<option value="KG" <?php if($data['unidad']=='KG') echo "selected";?>>KG</option> 
<option value="UN" <?php if($data['unidad']=='UN') echo "selected";?>>UN</option>
</select>
</div>
</div>
<div class="form-group">
    <label for="producto" class="col-sm-2 control-label">Cantidad</label>
    <div class="col-sm-10">
    <input id="cantidad" class="form-control"  value="<?php echo $data['cantidad']?>" name="cantidad" type="text" required="required" />
</div>
</div >

<div class="form-group">
    <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
    <div class="col-sm-10">
   <textarea class="form-control" id="descripcion"  name="descripcion" required="required"  rows="3"><?php echo $data['descripcion']?>
 </textarea>
      
    </div>
</div>

<div class="form-group">
    <label for="observacion" class="col-sm-2 control-label">Observacion</label>
    <div class="col-sm-10">
   <textarea class="form-control" id="observacion"  name="observacion" rows="3"><?php echo $data['observacion']?>
 </textarea>
</div>
</div >  

  	 <button type="submit" class="btn btn-default" name="modificar">
  	<span>Modificar</span>
  </button>

  	 <button type="submit" class="btn btn-default" name="eliminar">
  	 	<span>Eliminar</span>
  	 </button>
  	<button type="submit" class="btn btn-defaults">
      <span>Cancelar</span>
     </button>
</p>
<input id="id" name="id" type="hidden" value="<?php echo $data['id_producto']?>"/>
</form>