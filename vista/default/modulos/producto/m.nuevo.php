 <h3 style="text-align:center;">Producto</h3>
  <form class="form-horizontal centrar-form" action="index.php?action=producto" method="POST">
<div class="form-group">
    <label for="producto" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
      <input id="nombre" class="form-control"  name="nombre" type="text" required="required" />
    </div>
</div>
<div class="form-group">
    <label for="producto" class="col-sm-2 control-label">Codigo</label>
    <div class="col-sm-10">
    <input id="codigo" class="form-control"   name="codigo" type="text" required="required" />
</div>
</div >
<div class="form-group">
    <label for="producto" class="col-sm-2 control-label">Unidad Medida</label>
    <div class="col-sm-10">
<select class="form-control"  name="unidad" required="required">
 <option value="">Seleccione</option>
<option value="KG">KG</option>
<option value="UN">UN</option>
</select>
</div>
</div>

<div class="form-group">
    <label for="producto" class="col-sm-2 control-label">Cantidad</label>
    <div class="col-sm-10">
    <input id="cantidad" class="form-control" name="cantidad" type="text" required="required" />
</div>
</div >

<div class="form-group">
    <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
    <div class="col-sm-10">
   <textarea class="form-control" id="descripcion" name="descripcion" required="required"  rows="3"></textarea>
      
    </div>
</div>

<div class="form-group">
    <label for="observacion" class="col-sm-2 control-label">Observacion</label>
    <div class="col-sm-10">
   <textarea class="form-control" id="observacion" name="observacion" rows="3"></textarea>
</div>
</div >



  <button type="submit" class="btn btn-default" name="registar">
  	<span>Registar</span>
  </button>

  	
  	 <button type="reset" class="btn btn-defaults">
  	 	<span>Cancelar</span>
  	 </button>

</p>
<input id="id" name="id" type="hidden" value=""/>
</form>