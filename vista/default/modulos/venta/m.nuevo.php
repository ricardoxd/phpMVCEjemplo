 <h3 style="text-align:center;">Egreso</h3>
  <form class="form-horizontal centrar-form" action="index.php?action=salida" method="POST">
<div class="form-group">
    <label for="producto" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
      
<select class="form-control"  name="id_producto" required="required">
 <option value="">Seleccione</option>
 <?php
foreach ($resultado as $valor) {
   echo '<option value="'.$valor['id_producto'].'">'.$valor['nombre'].'</option>';
}
?>

</select>

     
    </div>
</div>

<div class="form-group">
    <label for="producto" class="col-sm-2 control-label">Cantidad</label>
    <div class="col-sm-10">
    <input id="cantidad" class="form-control"  name="cantidad" type="text" required="required" />
</div>
</div >



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